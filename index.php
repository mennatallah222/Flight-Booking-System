<?php
session_start();
require_once 'controllers/AuthController.php';
require_once 'controllers/CompanyController.php';
require_once 'controllers/FlightController.php';
require_once 'db.php';

$action = $_GET['action'] ?? 'home'; //default is 'home' page

$authController = new AuthController($pdo);
$companyController = new CompanyController($pdo);
$flightController = new FlightController($pdo);

switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'companyHome':
        $companyController->home();
        break;
    // case 'profile':
    //     $companyController->profile();
    //     break;
    case 'add_flight':
        $flightController->addFlight();
        break;
    // case 'flightDetails':
    //     $flightId = $_GET['id'] ?? '';
    //     if ($flightId) {
    //         $companyController->flightDetails($flightId);
    //     }
    //     break;
    // case 'messages':
    //     $companyController->messages();
    //     break;
    case 'home':
    default:
        include './views/passenger/home.php';
}
