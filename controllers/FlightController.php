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

        $company = Company::getByUserId($this->pdo, $company_id);

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

    public function cancelFlight($flight_id){
        $query=$this->pdo->prepare('select * from flights where id=?');
        $query->execute([$flight_id]);
        $flight=$query->fetch();
        if($flight){
            $updated_query=$this->pdo->prepare('update flights set is_cancelled=true where id=?');
            $updated_query->execute([$flight_id]);
            echo json_encode(['success'=>true, 'message'=>"fligh has been successfully cancelled!!"]);
        }
        else{
            echo json_encode(['success'=>false, 'message'=>"fligh isnt found!!"]);
        }
        exit;
    }
}
