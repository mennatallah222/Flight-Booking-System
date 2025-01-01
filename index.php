<?php


session_start();
require_once 'controllers/AuthController.php';
require_once 'controllers/CompanyController.php';
require_once 'controllers/FlightController.php';
require_once 'db.php';
require_once 'controllers/PassengerController.php';

if (!isset($pdo)) {
    die('Database connection not established.');
}

$action = $_GET['action'] ?? 'landingpage'; //default is 'home' page

$authController = new AuthController($pdo);
$companyController = new CompanyController($pdo);
$flightController = new FlightController($pdo);
$passengerController=new PassengerController($pdo);
switch ($action) {
    case 'register':
        $authController->registerInitial();
        break;
    case 'registerCompany':
        $authController->register();
        break;
    case 'registerPassenger':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'companyHome':
        $companyController->home();
        break;
    case'passengerHome':
        $passengerController->home();
        break;
    case'passengerProfile':
        $passengerController->profile();
        break;
    case 'edit-profile':
       $passengerController->updateProfile();
        break;
    case 'updatePassengerDetails':
        $passengerController->updatePassengerDetails();
        break;
    case 'Addflight':
        $passengerController->addflight();
        break;
    case 'search':
        include 'livesearch.php';
        break;
    case 'details':
        if (isset($_POST['FlightDetails'])) {
            $flight_id = $_POST['FlightDetails']; // This is the flight_id passed from the button
            //echo "Flight ID: " . $flight_id;
            $passengerController->details($flight_id);
        }
    break;
    case'payment': 
        $passengerController->payment(); 
    break;
    case 'sendmessage':
        $flightId = $_POST['flight_id'];
        $passengerController->sendmessage();
        break;

    case 'add_flight':
        $flightController->addFlight();
        break;
    case 'cancel_flight':
        $flight_id = $_GET['id']; //fetches the id from the url
        if ($flight_id)
            $flightController->cancelFlight($flight_id);
        break;
    case 'flight_details':
        $flight_id = $_GET['id'] ?? null;
        if ($flight_id) {
            $flightController->viewFlightDetails($flight_id);
        }
        break;
    case 'profile':
        $companyController->profile();
        break;
    case 'update-profile':
        $companyController->updateProfile();
        break;
    case 'landingpage':
        include 'landingpage.html';
        break;
    default:
        include 'landingpage.html';
}
