<?php

require_once __DIR__ . '/../models/Passenger.php';

class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        User::setPDO($this->pdo);
        Company::setPDO($this->pdo);
        Passenger::setPDO($this->pdo);
    }

    public function registerInitial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['register_data'] = $_POST;
            $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
            if ($type === 'company') {
            include __DIR__ . '/../views/registerCompany.php';
                exit();
            }
            elseif ($type === 'passenger') {
                include __DIR__ . '/../views/registerPassenger.php';
                exit();
            }
            else {
                header('Location: register.php');
                exit();
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
                $role = filter_var($postData['type'], FILTER_SANITIZE_STRING);
                $account = filter_input(INPUT_POST, 'Account', FILTER_SANITIZE_STRING) ?? '';
                if (!$email || !$name || !$password || !$tel || !$role) {
                    throw new Exception("Please fill all the fields correctly");
                }
                $user = User::getByEmail($email);
                if ($user) {
                    echo "This email already exists";
                    return;
                }
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $userId = User::create($email, $hashedPassword, $name, $tel, $role, $account);
                if ($role === 'company') {
                    $bio = filter_input(INPUT_POST, 'Bio', FILTER_SANITIZE_STRING) ?? '';
                    $address = filter_input(INPUT_POST, 'Address', FILTER_SANITIZE_STRING) ?? '';
                    $location = filter_input(INPUT_POST, 'Location', FILTER_SANITIZE_STRING) ?? '';
                    $logoUrl = $this->handleLogoUpload();
                    Company::create($userId, $bio, $address, $location, $logoUrl, $account);
                } 
                elseif ($role === 'passenger') {
                    $account=10000;
                    $personalPhoto=$this->handlePfpUploads();
                    $passportPhoto=$this->handlePassportUploads();
                    Passenger::createp($userId, $personalPhoto, $passportPhoto, $account);
                   
                    //LOGIC TO BE ADDED
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
        } else {
            include __DIR__ . '/../views/register.php';
        }
    }
    private function handlePfpUploads()
    {
        if(isset($_FILES['personalimg']) && $_FILES['personalimg']['error'] === UPLOAD_ERR_OK)
        {
            $personalTmpPath = $_FILES['personalimg']['tmp_name'];
            $personalName = basename($_FILES['personalimg']['name']);
            $uploadDir = __DIR__ . '/../PassengerUploads/info/';
            if(!is_dir($uploadDir))
            {
                mkdir($uploadDir, 0777, true);
            }
            $personalPath = $uploadDir . uniqid() . "_" . $personalName;
            if(move_uploaded_file($personalTmpPath, $personalPath))
            {
                return 'PassengerUploads/info/' . basename($personalPath);
            }
            
            else
            {
                throw new Exception("Error uploading the personal image");
            }
        }
        else
        {
            echo "No file uploaded or error occurred: " . $_FILES['personalimg']['error'];
        }
        
    }
    private function handlePassportUploads()
    {
        if(isset($_FILES['passportimg']) && $_FILES['passportimg']['error'] === UPLOAD_ERR_OK)
        {
            $personalTmpPath = $_FILES['passportimg']['tmp_name'];
            $personalName = basename($_FILES['passportimg']['name']);
            $uploadDir = __DIR__ . '/../PassengerUploads/info/';
            if(!is_dir($uploadDir))
            {
                mkdir($uploadDir, 0777, true);
            }
            $personalPath = $uploadDir . uniqid() . "_" . $personalName;
            if(move_uploaded_file($personalTmpPath, $personalPath))
            {
                return 'PassengerUploads/info/' . basename($personalPath);
            }
            else
            {
                throw new Exception("Error uploading the passport image");
            }
        }
        else
        {
            echo "No file uploaded or error occurred: " . $_FILES['passportimg']['error'];
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
        } else {
            throw new Exception("Error uploading the logo");
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
        } else {
            throw new Exception("Error uploading the logo");
        }
    }
    else{
        echo "No file uploaded or error occurred: " . $_FILES['logo']['error'];
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
                    }
                    else {
                        echo "Company not found!";
                    }
                }
                else if ($user['role'] == 'passenger') {
                    $passenger=Passenger::getByUserId($user['id']);
                    if($passenger){
                        $_SESSION['passenger_id']=$passenger['id'];
                        header('Location: index.php?action=passengerHome');
                    }
                    else{
                        echo "Passenger not found!";
                    }
                    
                }
                }
                else {
                    header('Location: index.php?action=passengerHome');
                }
            }
            else {
                echo "Invalid email or password.";
            }
        }
        else {
            include __DIR__ . '/../views/login.php';
        }
    }
}
