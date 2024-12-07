<?php

require_once __DIR__ . '/../models/Company.php';
require_once __DIR__ . '/../models/Flight.php';

class CompanyController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function home() {
        $companyId = $_SESSION['company_id'];
        $userId = $_SESSION['user_id'];

        $company = Company::getByUserId($this->pdo, $userId);
        $user=User::getByID($userId);

        if (!$company) {
            echo "comapny" . $company;
            echo "comapny" . $companyId;
            echo "comapny" . $user;
            echo "comapny" . $userId;
            echo "Company data not found.";
            return;
        }

        // echo '<pre>';
        // print_r($company);
        // echo '</pre>';

        $flights = Flight::getByCompanyId($companyId);
        include __DIR__ . '/../views/company/home.php';
    }
}


?>