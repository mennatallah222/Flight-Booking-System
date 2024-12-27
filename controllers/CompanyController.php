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

}
?>
