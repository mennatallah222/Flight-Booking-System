<?php
try {
    $pdo = new PDO(
        "pgsql:host=localhost;port=5432;dbname=flight_booking",
        "postgres"
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
