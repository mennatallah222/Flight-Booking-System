<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Company.php';
require_once __DIR__ . '/../models/Passenger.php';
require_once __DIR__ . '/../db.php';

class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            try{
                $this->pdo->beginTransaction();
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $password = $_POST['password'];
                $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
                $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

                if(!$email || !$name || !$password || !$tel || !$role){
                    throw new Exception("Please fill all the fields correctly");
                }
                $user = User::getByEmail($email);
                if ($user){
                    echo "This email already exists";
                    return;
                }
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $userId = User::create($email, $hashedPassword, $name, $tel, $role);

                if ($role === 'company') {
                    $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING) ?? '';
                    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING) ?? '';
                    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING) ?? '';
                    $logoUrl = $this->handleLogoUpload();

                    Company::create($userId, $bio, $address, $location, $logoUrl, 0);
                }
                elseif($role==='passenger'){
                    Passenger::create($email, $password, $name, $tel, $role, '', '', 0);
                }

                $this->pdo->commit();
                echo "Registration successeeded!";
                header('Refresh: 2; URL=index.php?action=login');
            }
            catch(Exception $e){
                $this->pdo->rollBack();
                echo "Error: " . $e->getMessage();
            }
        }
        else{
            include __DIR__ . '/../views/register.php';
        }
    }

    private function handleLogoUpload(){
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $logoTmpPath = $_FILES['logo']['tmp_name'];
            $logoName = basename($_FILES['logo']['name']);
            $uploadDir = __DIR__ . '/../uploads/logos/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $logoPath = $uploadDir . uniqid() . "_" . $logoName;
            if(move_uploaded_file($logoTmpPath, $logoPath)) {
                return 'uploads/logos/' . basename($logoPath);
            }
            else{
                throw new Exception("Error uploading the logo");
            }
        }
        return '';
    }



    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            var_dump($email);
            var_dump($password);
            $user = User::getByEmail($email);
            var_dump($user);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'company') {
                    $company = Company::getByUserId($this->pdo, $user['id']);
                    var_dump($company);

                    if ($company) {
                        $_SESSION['company_id'] = $company['id'];
                        var_dump($_SESSION['company_id']);

                        header('Location: index.php?action=companyHome');
                    }
                    else{
                        echo "Company not found!!";
                    }
                }
                else{
                    header('Location: index.php?action=passengerHome');
                }
            }
            else{
                echo "Invalid email or password.";
            }
        }
        else{
            include __DIR__ . '/../views/login.php';
        }
    }


}
