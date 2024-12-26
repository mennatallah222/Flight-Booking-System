<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=flight_booking",
        "root", "Menna@123#"
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    error_log($e->getMessage(), 3, '/path/to/logfile.log');
}
