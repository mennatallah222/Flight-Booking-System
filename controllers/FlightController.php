<?php

require_once __DIR__ . '/../models/Flight.php';

class FlightController {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function addFlight(){
        $company_id = $_SESSION['company_id'];
        $userId = $_SESSION['user_id'];
        $user=User::getByID($userId);
        $company = Company::getByUserId($company_id);
        if (!$company_id) {
            echo "Please log in again";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $fees = $_POST['fees'] ?? 0;
            $passengers_count = $_POST['passengers_count'] ?? 0;
            $startTime = $_POST['start_time'] ?? '';
            $endTime = $_POST['end_time'] ?? '';

            $result = Flight::add($this->pdo, $name, $fees, $passengers_count, $startTime, $endTime, $company_id);
            if ($result) {
                $flight_id = $this->pdo->lastInsertId('flights_id_seq');
                $cities = $_POST['cities'];
                $arrival_times = $_POST['arrival_times'];
                $departure_times = $_POST['departure_times'];
                for($i=0; $i<count($cities); $i++){
                    $sql="INSERT INTO itineraries (flight_id, city, arrival_time, departure_time) VALUES (?, ?, ?, ?)";
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->execute([$flight_id, $cities[$i], $arrival_times[$i], $departure_times[$i]]);
                }

                header('Location: index.php?action=companyHome');
                exit;
            }
            else{
                echo "failed to add the flight";
            }
        }
        else{
            include __DIR__ . '/../views/company/add_flight.php';
        }
    }

   public function cancelFlight($flight_id) {
    header('Content-Type: application/json');

    $query = $this->pdo->prepare('select * from flights where id = ?');
    $query->execute([$flight_id]);
    $flight = $query->fetch();
    if ($flight) {
        if ($flight['is_cancelled']) {
            echo json_encode(['success' => false, 'message' => "flight is already canceled!"]);
            exit;
        }

        $passengers = $this->pdo->prepare('select passengers.id, passengers.account from passengers 
            join flight_passengers ON passengers.id=flight_passengers.passenger_id 
            where flight_passengers.flight_id=? and flight_passengers.status=?
        ');
        $passengers->execute([$flight_id, 'confirmed']);
        $passengers = $passengers->fetchAll();
        if (!empty($passengers)){
            $refundAmount = $flight['fees']/count($passengers);
            $this->pdo->beginTransaction();
            try{
                foreach ($passengers as $passenger){
                    $updateAccountQuery = $this->pdo->prepare('update passengers set account=account + ? where id=?');
                    $updateAccountQuery->execute([$refundAmount, $passenger['id']]);
                }
                $updateFlightQuery = $this->pdo->prepare('update flights set is_cancelled=true where id=?');
                $updateFlightQuery->execute([$flight_id]);
                $this->pdo->commit();
                echo json_encode(['success'=>true, 'message'=>"flight has been successfully canceled & refunds have been processed"]);
            }
            catch(Exception $e){
                $this->pdo->rollBack();
                echo json_encode(['success'=>false, 'message'=>"error occurred while processing the refund: " . $e->getMessage()]);
            }
        }
        else{
            $updateFlightQuery=$this->pdo->prepare('update flights set is_cancelled=true where id=?');
            $updateFlightQuery->execute([$flight_id]);
            echo json_encode(['success' => true, 'message' => "flight has been successfully canceled & no passengers to refund for this flight"]);
        }
    }
    else{
        echo json_encode(['success'=>false, 'message' => "flight is not found"]);
    }

    exit;
}

public function viewFlightDetails($flight_id) {
        global $pdo;        
        $stmt = $pdo->prepare("SELECT * FROM flights WHERE id = :id");
        $stmt->execute(['id' => $flight_id]);
        $flight = $stmt->fetch(PDO::FETCH_ASSOC);
        $userId = $_SESSION['user_id'];
        $company = Company::getByUserId($userId);
        if ($flight) {
            include './views/company/flight_details.php';
        } else {
            echo "Flight not found.";
        }
    }

}
