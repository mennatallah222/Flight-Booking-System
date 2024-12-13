<?php
$dsn = 'pgsql:host=localhost;dbname=flight_booking';

require_once __DIR__ . '/models/Flight.php';

try {
    //user_pass is to be changed according to each of our passwords :)
    $pdo = new PDO($dsn, 'postgres', 'Menna@123#', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    User::setPDO($pdo);
    Company::setPDO($pdo);
    Passenger::setPDO($pdo);
    Flight::setPDO($pdo);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
