<?php
require_once __DIR__ . '/../models/Passenger.php';

class PassengerController
{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        Passenger::setPDO($this->pdo);
    }
    public function home() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $passengerId = $_SESSION['passenger_id'];
        $userId = $_SESSION['user_id'];
        $passenger = Passenger::getByUserId($userId);
        $user = User::getByID($userId);

        if (!$passenger) {
            echo "passenger data not found!";
            return;
        }

        //$flights = Flight::getByCompanyId($companyId);
        include __DIR__ . '/../views/passenger/home.php';
    }
    public function profile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $passengerId = $_SESSION['passenger_id'];
        $userId = $_SESSION['user_id'];
        $passenger = Passenger::getByUserId($userId);
        $user = User::getByID($userId);

        if (!$passenger) {
            echo "passenger data not found!";
            return;
        }

        //$flights = Flight::getByCompanyId($companyId);
        include __DIR__ . '/../views/passenger/profile.php';
    }

    public function updateProfile() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
            $passengerId = $_SESSION['passenger_id'];
            $userId = $_SESSION['user_id'];
            $passenger = Passenger::getByUserId($userId);
            $user = User::getByID($userId);

            if (!$passenger) {
                echo "passenger data not found!";
                return;
            }
        

        include __DIR__ . '/../views/passenger/editprofile.php';

    }
    public function updatePassengerDetails()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['user_id'];
        $passengerId = $_SESSION['passenger_id'];
        $name=$_POST['name'] ?? '';
        $phone=$_POST['phone'] ?? '';
        $email=$_POST['email'] ?? '';
        $currentEmail = User::getById($userId)['email']; 
        $user = User::getByEmail($email);
        $passenger=Passenger::getByUserId($userId);
        $currentpfp=$passenger['photo'];
        $currentpassport=$passenger['passport_img'];
        if ($email !== $currentEmail) {
            
            if ($user) {
                echo "This email already exists";
                return;
            }
        }
            
        $stmt = $this->pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->execute([$name, $userId]);
        
        $stmt = $this->pdo->prepare("UPDATE users SET tel = ?, email = ? WHERE id = ?");
        $stmt->execute([$phone, $email, $userId]);
        $user = User::getByEmail($email);
        $pfp=$this->handlePfpUploads();
        if (!$pfp) {
            $pfp = $currentpfp;
        }
        $passport=$this->handlePassportUploads();
        if (!$passport) {
            $passport = $currentpassport;
        }
        $stmt = $this->pdo->prepare("UPDATE passengers SET photo = ?, passport_img = ? WHERE user_id = ?");
        $stmt->execute([$pfp,$passport,$userId]);
        $passenger=Passenger::getByUserId($user['id']);
        include __DIR__ . '/../views/passenger/profile.php';
    }

    private function handlePfpUploads()
    {
        if(isset($_FILES['personalimg']) && $_FILES['personalimg']['error'] === UPLOAD_ERR_OK)
        {
            $personalTmpPath = $_FILES['personalimg']['tmp_name'];
            $personalName = basename($_FILES['personalimg']['name']);
            $uploadDir = __DIR__ . '/../PassengerUploads/info/';
            if(!is_dir($uploadDir))
            {
                mkdir($uploadDir, 0777, true);
            }
            $personalPath = $uploadDir . uniqid() . "_" . $personalName;
            if(move_uploaded_file($personalTmpPath, $personalPath))
            {
                return 'PassengerUploads/info/' . basename($personalPath);
            }
            
            else
            {
                throw new Exception("Error uploading the personal image");
            }
        }
        else
        {
        return false;
        }
        
    }
    private function handlePassportUploads()
    {
        if(isset($_FILES['passportimg']) && $_FILES['passportimg']['error'] === UPLOAD_ERR_OK)
        {
            $personalTmpPath = $_FILES['passportimg']['tmp_name'];
            $personalName = basename($_FILES['passportimg']['name']);
            $uploadDir = __DIR__ . '/../PassengerUploads/info/';
            if(!is_dir($uploadDir))
            {
                mkdir($uploadDir, 0777, true);
            }
            $personalPath = $uploadDir . uniqid() . "_" . $personalName;
            if(move_uploaded_file($personalTmpPath, $personalPath))
            {
                return 'PassengerUploads/info/' . basename($personalPath);
            }
            else
            {
                throw new Exception("Error uploading the passport image");
            }
        }
        else
        {
            return false;
        }
    }

    public function addflight()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['user_id'];
        $passengerId = $_SESSION['passenger_id'];
        $passenger=Passenger::getByUserId($userId);
        $user = User::getByID($userId);
        include __DIR__ . '/../views/passenger/flightSearch.php';
    }
    public function details($flight_id)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION['user_id'];
        $passengerId = $_SESSION['passenger_id'];
        $passenger=Passenger::getByUserId($userId);
        $user = User::getByID($userId);
        
        global $pdo;        
            $stmt = $pdo->prepare("SELECT * FROM flights WHERE id = :id");
            $stmt->execute(['id' => $flight_id]);
            $flight = $stmt->fetch(PDO::FETCH_ASSOC);
            $company=Company::getById($flight['company_id']);
            $company=Company::getByUserId($company['user_id']);
            $company=User::getByID($company['user_id']);
            $logo=Company::getById($flight['company_id']);
            $it=Flight::getItinerariesByFlightID($flight_id);



        include __DIR__ . '/../views/passenger/flightDetails.php';

    }
    public function payment (){
        header('Content-Type: application/json');
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $flight_id = $_POST['flight_id'];
        $userId = $_SESSION['user_id'];
        $passengerId = $_SESSION['passenger_id'];
        $passenger=Passenger::getByUserId($userId);
        $user = User::getByID($userId);
        $payment=$_POST['payment'];
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM flights WHERE id = :id");
        $stmt->execute(['id' => $flight_id]);
        $flight = $stmt->fetch(PDO::FETCH_ASSOC);
        $fees=$flight['fees'];
        $accountBalance=$passenger['account'];
        $stmt = $pdo->prepare("SELECT * FROM flight_passengers WHERE flight_id = :flight_id AND passenger_id = :passenger_id");
        $stmt->execute(['flight_id' => $flight_id, 'passenger_id' => $passengerId]);
        $existingBooking = $stmt->fetch(PDO::FETCH_ASSOC);
        $company=Company::getById($flight['company_id']);
        if ($existingBooking) {
            echo "already_booked";
            return;
        }
        if ($payment === 'From Account' && $accountBalance < $fees) {
            echo "insufficient_funds";
            return;
        }
        if($payment==='From Account')
        {
            $newBalance = $accountBalance - $fees;
            $stmt = $pdo->prepare("UPDATE passengers SET account = :new_balance WHERE user_id = :passenger_id");
            $stmt->execute(['new_balance' => $newBalance, 'passenger_id' => $userId]);
        }
        $status = ($payment === 'Cash') ? 'Pending' : 'Registered';

        $stmt=$pdo->prepare("INSERT INTO flight_passengers (flight_id,passenger_id,status,payment, company_id) VALUES(?,?,?,?,?)");
        $stmt->execute([$flight_id, $passengerId, $status, $payment,$company['id']]);
        echo "success";
    }

    public function sendmessage(){
        global $pdo;
        $flightId = $_POST['flight_id'];
        $userId = $_SESSION['user_id'];
        $passengerId = $_SESSION['passenger_id'];
        $passenger=Passenger::getByUserId($userId);
        $user = User::getByID($userId);
        $stmt = $pdo->prepare("SELECT * FROM flights WHERE id = :id");
        $stmt->execute(['id' => $flightId]);
        $flight = $stmt->fetch(PDO::FETCH_ASSOC);
        $company=Company::getById($flight['company_id']);
        $companyId=$company['id'];
        $passengerId=$passenger['id'];
        $companyasuser=User::getByID($company['user_id']);
        $passengerasuser=User::getByID($passenger['user_id']);
        $message = $_POST['message'];
        $stmt=$pdo->prepare("INSERT INTO company_messages (company_id,passenger_id,company_email	,passenger_email, message) VALUES(?,?,?,?,?)");
        $stmt->execute([$companyId, $passengerId, $companyasuser['email'], $passengerasuser['email'],$message]);
        echo"sent successflly";
    }
    

}


?>
