<?php

require_once __DIR__ . '/../models/Company.php';
require_once __DIR__ . '/../models/Flight.php';

class CompanyController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        Company::setPDO($this->pdo);
    }

    public function home() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $companyId = $_SESSION['company_id'];
        $userId = $_SESSION['user_id'];
        $company = Company::getByUserId($userId);
        $user = User::getByID($userId);

        if (!$company) {
            echo "Company data not found!";
            return;
        }

        $flights = Flight::getByCompanyId($companyId);

        $stmt = $this->pdo->prepare(
            "SELECT cm.id, u.name AS sender, cm.message AS message, cm.created_at AS date 
            FROM company_messages cm
            JOIN passengers p ON cm.passenger_id = p.id
            JOIN users u ON p.user_id = u.id
            WHERE cm.company_id = ?"
        );
        $stmt->execute([$companyId]);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/company/home.php';
    }

    public function profile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $companyId = $_SESSION['company_id'];
        $userId = $_SESSION['user_id'];
        $company = Company::getByUserId($userId);
        $user = User::getByID($userId);

        if (!$company) {
            echo "Company data not found!";
            return;
        }

        $flights = Flight::getByCompanyId($companyId);
        include __DIR__ . '/../views/company/profile.php';
    }

    public function updateProfile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['user_id'];
        $companyId = $_SESSION['company_id'];
        //retrieving the updated profile data from POST request
        $name = $_POST['name'] ?? '';
        $bio = $_POST['bio'] ?? '';
        $address = $_POST['address'] ?? '';
        if (empty($name) || empty($bio) || empty($address)) {
            echo "All fields are required!";
            return;
        }

        //updates the 'User' table
        $stmt = $this->pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->execute([$name, $userId]);
        //updates the 'Company' table
        $stmt = $this->pdo->prepare("UPDATE companies SET bio = ?, address = ? WHERE user_id = ?");
        $stmt->execute([$bio, $address, $userId]);

        header("Location: index.php?action=profile");
    }

}
?>
