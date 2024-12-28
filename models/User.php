<?php
class User {
    protected static $pdo;
    public $id;
    public $email;
    public $password;
    public $name;
    public $tel;
    public $role;

    public static function setPDO($pdo) {
        self::$pdo = $pdo;
    }

    public static function getByEmail($email) {
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function getByID($id) {
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($email, $password, $name, $tel, $role, $account) {
        $stmt = self::$pdo->prepare("INSERT INTO users (email, password, name, tel, role, account) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$email, $password, $name, $tel, $role, $account]);
        return self::$pdo->lastInsertId();
    }
}

?>
