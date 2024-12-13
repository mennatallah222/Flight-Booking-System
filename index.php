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
    case 'add_flight':
        $flightController->addFlight();
        break;
    case 'cancel_flight':
        $flight_id=$_GET['id'];//fetches the id from the url
        if($flight_id)
            $flightController->cancelFlight($flight_id);
        break;
    case 'home':
    default:
        include './views/passenger/home.php';
}
