<?php

class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        User::setPDO($this->pdo);
        Company::setPDO($this->pdo);
    }

    public function registerInitial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['register_data'] = $_POST;
            $role = filter_input(INPUT_GET, 'role', FILTER_SANITIZE_STRING);

            if ($role === 'company') {
                header('Location: CompanyRegistration.html');
            }
            else {
                $this->register();
            }
        }
        else {
            include __DIR__ . '/../views/register.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $postData = $_SESSION['register_data'] ?? $_POST;
            try {
                $this->pdo->beginTransaction();
                $email = filter_var($postData['email'], FILTER_VALIDATE_EMAIL);
                $name = filter_var($postData['name'], FILTER_SANITIZE_STRING);
                $password = $postData['password'];
                $tel = filter_var($postData['tel'], FILTER_SANITIZE_STRING);
                $role = filter_var($postData['role'], FILTER_SANITIZE_STRING);

                if (!$email || !$name || !$password || !$tel || !$role) {
                    throw new Exception("Please fill all the fields correctly");
                }

                $user = User::getByEmail($email);
                if ($user) {
                    echo "This email already exists";
                    return;
                }

                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $userId = User::create($email, $hashedPassword, $name, $tel, $role);

                if ($role === 'company') {
                    $bio = filter_input(INPUT_POST, 'Bio', FILTER_SANITIZE_STRING) ?? '';
                    $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING) ?? '';
                    $location = filter_input(INPUT_POST, 'Location', FILTER_SANITIZE_STRING) ?? '';
                    $logoUrl = $this->handleLogoUpload();

                    Company::create($userId, $bio, $address, $location, $logoUrl, 0);
                }
                elseif ($role === 'passenger') {
                    Passenger::create($email, $password, $name, $tel, $role, '', '', 0);
                }

                $this->pdo->commit();
                echo "Registration succeeded!";
                header('Refresh: 2; URL=index.php?action=login');
            }
            catch (Exception $e) {
                $this->pdo->rollBack();
                echo "Error: " . $e->getMessage();
            }
        }
        else {
            include __DIR__ . '/../views/register.php';
        }
    }

    private function handleLogoUpload() {
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $logoTmpPath = $_FILES['logo']['tmp_name'];
            $logoName = basename($_FILES['logo']['name']);
            $uploadDir = __DIR__ . '/../uploads/logos/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $logoPath = $uploadDir . uniqid() . "_" . $logoName;
            if (move_uploaded_file($logoTmpPath, $logoPath)) {
                return 'uploads/logos/' . basename($logoPath);
            }
            else {
                throw new Exception("Error uploading the logo");
            }
        }
        return '';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $user = User::getByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'company') {
                    $company = Company::getByUserId($user['id']);
                    if ($company) {
                        $_SESSION['company_id'] = $company['id'];
                        header('Location: index.php?action=companyHome');
                    } else {
                        echo "Company not found!";
                    }
                } else {
                    header('Location: index.php?action=passengerHome');
                }
            } else {
                echo "Invalid email or password.";
            }
        } else {
            include __DIR__ . '/../views/login.php';
        }
    }
}
