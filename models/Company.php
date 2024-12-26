<?php
require_once 'User.php';

class Company extends User {
    public $bio;
    public $address;
    public $location;
    public $logo;
    public $account;


    public static function create($userId, $bio = '', $address = '', $location = '', $logo = '', $account = 0) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO companies (user_id, bio, address, location, logo, account) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $bio, $address, $location, $logo, $account]);
        return $userId;
    }



    public static function getById($companyId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM companies WHERE id = ?");
        $stmt->execute([$companyId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByUserId($pdo, $user_id) {
        $sql = "SELECT * FROM companies WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
