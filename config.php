<?php
$dsn = 'mysql:host=localhost;port=3306;dbname=flight_booking';

try {
    $pdo = new PDO($dsn, 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    User::setPDO($pdo);
    Company::setPDO($pdo);
    Passenger::setPDO($pdo);
    Flight::setPDO($pdo);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    error_log($e->getMessage(), 3, 'C:/important files/logs/logfile.log');
}