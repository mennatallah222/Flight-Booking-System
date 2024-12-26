<?php
require_once 'User.php';

class Passenger extends User {
    public $photo;
    public $passport_img;
    public $account;

    public static function create($email, $password, $name, $tel, $role, $photo = '', $passportImg = '', $account = 0) {
        $userId = parent::create($email, $password, $name, $tel, $role);
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO passengers (user_id, photo, passport_img, account) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $photo, $passportImg, $account]);
        return $userId;
    }

    public static function getByUserId($userId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM passengers WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
