<?php
require_once __DIR__ . '/User.php';

class Passenger extends User {
    public $photo;
    public $passport_img;
    public $account;
    protected static $pdo;

    public static function setPDO($pdo) {
        self::$pdo = $pdo;
    }
    public static function createp($userId, $pfp,  $passport_img,  $account=10000) {
        if (!self::$pdo) {
            throw new Exception("PDO connection is not set");
        }
        $stmt = self::$pdo->prepare("INSERT INTO passengers (user_id, photo,passport_img,account) VALUES (?, ?, ?,? )");
        $stmt->execute([$userId, $pfp, $passport_img, $account]);
        return $userId;
    }

    public static function getById($passengerId) {
        if (!self::$pdo) {
            throw new Exception("PDO connection is not set");
        }
        $stmt = self::$pdo->prepare("SELECT * FROM passengers WHERE id = ?");
        $stmt->execute([$passengerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getByUserId($user_id) {
        if (!self::$pdo) {
            throw new Exception("PDO connection is not set.");
        }
        $stmt = self::$pdo->prepare("SELECT * FROM passengers WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
