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
        $company = Company::getByUserId($userId);
        $user = User::getByID($userId);

        if (!$company) {
            echo "Company data not found!";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $flight_uid = $_POST['flight_uid'] ?? '';
            $name = $_POST['name'] ?? '';
            $fees = $_POST['fees'] ?? 0;
            $passengers_count = $_POST['passengers_count'] ?? 0;
            $startTime = $_POST['start_time'] ?? '';
            $endTime = $_POST['end_time'] ?? '';      
            try{
                $query = Flight::add($this->pdo, $flight_uid, $name, $fees, $passengers_count, $startTime, $endTime, $company_id);
                if ($query) {
                    $flight_id = $this->pdo->lastInsertId();

                    $from_cities = $_POST['from_city'];
                    $to_cities = $_POST['to_city'];
                    $departure_times = $_POST['departure_time'];
                    $arrival_times = $_POST['arrival_time'];
                    for ($i = 0; $i < count($from_cities); $i++) {
                        $sql = "INSERT INTO itineraries (flight_id, from_city, to_city, departure_time, arrival_time) 
                                VALUES (?, ?, ?, ?, ?)";
                        $stmt = $this->pdo->prepare($sql);
                        $stmt->execute([
                            $flight_id, 
                            $from_cities[$i], 
                            $to_cities[$i], 
                            $departure_times[$i], 
                            $arrival_times[$i]
                        ]);

                    }
                    $first_from_city = $from_cities[0];
                    $last_to_city = $to_cities[count($to_cities) - 1]; 
                    $updateQuery = "UPDATE flights 
                            SET from_city = ?, to_city = ? 
                            WHERE id = ?";
            $stmt = $this->pdo->prepare($updateQuery);
            $stmt->execute([$first_from_city, $last_to_city, $flight_id]);

                    header('Location: index.php?action=companyHome');
                    exit;
                }
            }
            catch(Exception $e){
                    echo "Error: " . $e->getMessage();
            }
        }
        else {
            include __DIR__ . '/../views/company/add_flight.php';
        }
    }

   public function cancelFlight($flight_id) {
        header('Content-Type: application/json');

        $query = $this->pdo->prepare('SELECT * FROM flights WHERE id = ?');
        $query->execute([$flight_id]);
        $flight = $query->fetch();
        
        if (!$flight) {
            echo json_encode(['success' => false, 'message' => "Flight not found."]);
            exit;
        }
        
        if ($flight['is_cancelled']) {
            echo json_encode(['success' => false, 'message' => "Flight is already canceled!"]);
            exit;
        }

        $passengersStmt = $this->pdo->prepare(
            'SELECT passengers.id 
            FROM passengers 
            JOIN flight_passengers ON passengers.id = flight_passengers.passenger_id 
            WHERE flight_passengers.flight_id = ? AND flight_passengers.status = ?'
        );
        $passengersStmt->execute([$flight_id, 'Registered']);
        $passengers = $passengersStmt->fetchAll();

        if (!empty($passengers)) {
            $refundAmount = $flight['fees'] / count($passengers);

            $this->pdo->beginTransaction();
            try {
                foreach ($passengers as $passenger) {
                    $updateAccountQuery = $this->pdo->prepare('UPDATE passengers SET account = account + ? WHERE id = ?');
                    $updateAccountQuery->execute([$refundAmount, $passenger['id']]);
                }
                
                $updateFlight=$this->pdo->prepare('UPDATE flights SET is_cancelled = TRUE WHERE id = ?');
                $updateFlight->execute([$flight_id]);

                $this->pdo->commit();
                echo json_encode([
                    'success' => true,
                    'message' => "Flight has been successfully canceled and refunds processed.",
                    'refund_amount_per_passenger' => $refundAmount,
                ]);
            }
            catch (Exception $e) {
                $this->pdo->rollBack();
                echo json_encode(['success' => false, 'message' => "Error processing refunds: " . $e->getMessage()]);
            }
        }
        else {
            $updateFlight=$this->pdo->prepare('UPDATE flights SET is_cancelled = TRUE WHERE id = ?');
            $updateFlight->execute([$flight_id]);
            echo json_encode(['success' => true, 'message' => "Flight canceled. No registered passengers to refund."]);
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

        $registered_passengers_stmt = $pdo->prepare("
            SELECT p.*, u.name, u.email, u.tel
            FROM flight_passengers fp
            JOIN passengers p ON fp.passenger_id = p.id
            JOIN users u ON p.user_id = u.id
            WHERE fp.flight_id = :flight_id AND fp.status = 'Registered'
        ");
        $registered_passengers_stmt->execute(['flight_id' => $flight_id]);
        $registeredPassengers = $registered_passengers_stmt->fetchAll(PDO::FETCH_ASSOC);

        $pending_passengers_stmt = $pdo->prepare("
            SELECT p.*, u.name, u.email, u.tel
            FROM flight_passengers fp
            JOIN passengers p ON fp.passenger_id = p.id
            JOIN users u ON p.user_id = u.id
            WHERE fp.flight_id = :flight_id AND fp.status = 'Pending'
        ");
        $pending_passengers_stmt->execute(['flight_id' => $flight_id]);
        $pendingPassengers = $pending_passengers_stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($flight) {
            include './views/company/flight_details.php';
        }
        else {
            echo "Flight not found.";
        }
    }

}
