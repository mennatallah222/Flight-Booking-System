<?php
session_start();
require_once 'controllers/AuthController.php';
require_once 'controllers/CompanyController.php';
require_once 'controllers/FlightController.php';
require_once 'db.php';  // Ensure db.php is correctly included and $pdo is set up before use

// Check if $pdo is properly set after db.php is included
if (!isset($pdo)) {
    die('Database connection not established.');
}

$action = $_GET['action'] ?? 'home'; //default is 'home' page

// Pass $pdo to the controller constructors
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
        $flight_id = $_GET['id']; //fetches the id from the url
        if ($flight_id)
            $flightController->cancelFlight($flight_id);
        break;
    case 'home':
    default:
        include './views/passenger/home.php';
}
