<?php
require_once __DIR__ . '/User.php';

class Company extends User {
    public $bio;
    public $address;
    public $location;
    public $logo;
    public $account;

    protected static $pdo;

    public static function setPDO($pdo) {
        self::$pdo = $pdo;
    }

    public static function create($userId, $bio = '', $address = '', $location = '', $logo = '', $account = 0) {
        if (!self::$pdo) {
            throw new Exception("PDO connection is not set");
        }
        $stmt = self::$pdo->prepare("INSERT INTO companies (user_id, bio, address, location, logo, account) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $bio, $address, $location, $logo, $account]);
        return $userId;
    }

    public static function getById($companyId) {
        if (!self::$pdo) {
            throw new Exception("PDO connection is not set");
        }
        $stmt = self::$pdo->prepare("SELECT * FROM companies WHERE id = ?");
        $stmt->execute([$companyId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByUserId($user_id) {
        if (!self::$pdo) {
            throw new Exception("PDO connection is not set.");
        }
        $stmt = self::$pdo->prepare("SELECT * FROM companies WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
