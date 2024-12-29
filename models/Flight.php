<?php

class Flight {
    protected static $pdo;

    public static function setPDO($pdo) {
        self::$pdo = $pdo;
    }
    
    public static function add($pdo, $flight_uid, $name, $fees, $passengers_count, $start_time, $end_time, $company_id) {
        $sql = "INSERT INTO flights (flight_uid, name, fees, passengers_count, start_time, end_time, company_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$flight_uid, $name, $fees, $passengers_count, $start_time, $end_time, $company_id]);
    }



    public static function getByCompanyId($companyId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM flights WHERE company_id = ?");
        $stmt->execute([$companyId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getItinerariesByFlightID($flight_id){
        global $pdo;
        $stmt=$pdo->prepare("select * from itineraries where flight_id=?");
        $stmt->execute([$flight_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
