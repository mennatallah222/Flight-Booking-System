<?php
require_once __DIR__ . '/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search</title>
    <style>
            html, body {
    height: 100%; /* Ensure the root and body take up the full viewport height */
    margin: 0;
    padding: 0;
    overflow: auto; /* Allow scrolling if content overflows */
  }
  
  body {
    font-family: "Lato", sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column; /* Stack header and content vertically */
    height: 100%;
    background-color: rgba(176, 196, 222, 0.399);
    overflow: auto; /* Allow scrolling if necessary */
  }
  
  /* App Header */
  .app-header {
    flex-shrink: 0;
    width: 100%; /* Ensure the header spans the full width */
    height: 50px;
    background-color: lightblue; /* Header background color */
    color: white; /* Text color */
    padding: 10px 20px; /* Spacing around the content */
    display: flex; /* Flexbox for alignment */
    align-items: center; /* Center vertically */
    justify-content: center; /* Center horizontally */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Shadow for depth */
  }

  .logo-container {
    display: flex;
    align-items: center;
}

.logo {
    width: 50px; /* Adjust size of the logo */
    height: 50px;
    margin-right: 15px; /* Space between logo and name */
}

.app-name {
    font-size: 24px; /* Adjust font size */
    font-weight: bold;
    margin: 0;
}

  
  /* Main Content Container */
  .main-content {
    display: flex;
    flex-grow: 1; /* Take up remaining vertical space */
    flex: 1;
    width: 100%; /* Full width below header */
    padding: 20px;
    box-sizing: border-box; /* Include padding in width calculations */
    gap: 20px; /* Space between child divs */
    overflow: auto; /* Allow overflow if content exceeds container */
  }
  
  /* ProfileDiv (left side) */
  .ProfileDiv {
    max-width: 250px;
    display: flex;
    align-items: center;
    flex-direction: column;
    flex: 1; /* Adjusts width dynamically */
    background-color: white;
    padding: 10px;
    padding-top: 50px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    height: auto; /* Ensure it doesn't take more than necessary space */
  }
  
  /* FlightDiv (right side, two stacked divs) */
  .right-container {
    display: flex;
    flex-direction: column; /* Stack FlightDivs vertically */
    flex: 2; /* Adjust width dynamically */
    gap: 20px; /* Space between stacked divs */
    height: auto; /* Allow to expand vertically based on content */
  }
  
  .top-right {
    overflow: auto;
    display: flex;
    flex-direction: column;
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    flex: 1;
  }
  
  .top-right-header {
    display: flex;
    align-items: center; /* Aligns items vertically */
    justify-content: space-between; /* Ensures spacing between header and button */
    gap: 10px;
  }
  
  .content {
    width: 95%;
    flex-shrink: 1;
    margin: 10px;
    min-height: 50px;
    min-width: fit-content;
    display: flex;
    background-color: white;
    padding: 10px;
    padding-top: 0px;
    border-radius: 10px;
    box-shadow: 4px 4px 8px rgba(176, 196, 222, 0.399),
                -4px -4px 8px rgba(176, 196, 222, 0.399); /* Shadow on all sides */
    flex: 1; /* Equal height for both divs */
    align-items: center; /* Aligns items horizontally in the center */
    justify-content: space-between; /* Align items towards the top of the container */
  }

  .search-content {
    width: 95%;
    flex-shrink: 1;
    margin: 10px;
    min-height: 50px;
    min-width: fit-content;
    display: flex;
    background-color: white;
    padding: 10px;
 
    border-radius: 10px;
    box-shadow: 4px 4px 8px rgba(176, 196, 222, 0.399),
                -4px -4px 8px rgba(176, 196, 222, 0.399); /* Shadow on all sides */
    flex: 1; /* Equal height for both divs */
    align-items: center; /* Aligns items horizontally in the center */
    justify-content: space-between; /* Align items towards the top of the container */
  }
  
  .content-container {
    overflow: auto;
  }
  
  .content-container::-webkit-scrollbar {
    display: none;
  }
  
  .bottom-right {
    overflow: auto;
    display: flex;
    flex-direction: column;
    background-color: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    flex: 1; /* Equal height for both divs */
  }

  .bottom-right-header {
    padding-left: 30px;

    display: flex;
    align-items: center; /* Aligns items vertically */
    justify-content: space-between; /* Ensures spacing between header and button */
    gap: 10px;
  }

  .bottom-right-container {
    overflow: auto;
  }
  
  .bottom-right-container::-webkit-scrollbar {
    display: none;
  }


  
  .Companylogo {
    width: 150px;
    height: 150px;
  }
  
  input[type="submit"],
  button {
    margin: 20px;
    height: fit-content;
    width: fit-content;
    padding: 10px;
    font-weight: bold;
    background-color: rgb(173, 216, 230);
    border: 2px solid lightblue;
    border-radius: 5px;
    color: white;
  }
  
  input[type="submit"]:focus,
  button:focus {
    outline: none; /* Remove default outline */
    border: 2px solid lightblue; /* Add a custom border color */
    box-shadow: 0 0 10px rgba(46, 172, 251, 0.659); /* Custom shadow for focus */
  }
  
  input[type="submit"]:hover,
  button:hover {
    cursor: pointer;
  }


  form.search-form {
    width: 100%; /* Full width of the container */
    padding: 0px;
    border: 0px solid #ccc;
    border-radius: 8px;

    background-color: #fff;
    display: flex;
    flex-direction: column;
}
.search-form div {
  display: flex;
  margin-left: 10px;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
}


.search-form input[type="text"] {
  width: 500px;
  padding: 12px;
  margin: 0px 0;
  border-radius: 5px;
  border: 1px solid #0000005f;
  font-size: 14px;
  box-sizing: border-box;
}



input[type="text"],
input[type="number"],
input[type="email"],
input[type="password"],
input[type="tel"],
textarea,
select {
    width: 100%;
    padding: 12px;
    margin: 0px 0;
    border-radius: 5px;
    border: 1px solid #0000005f;
    font-size: 14px;
    box-sizing: border-box;
    
}

input:focus,
textarea:focus {
    outline: none; /* Remove default outline */
    border: 2px solid lightblue; /* Add a custom border color */
    box-shadow: 0 0 10px rgba(114, 194, 221, 0.657); /* Custom shadow for focus */
}
  
    </style>
</head>
<body>

        <?php
        if (isset($_POST['input'])&& isset($_POST['input2'])) {
            $input = $_POST['input'];
            $input2 = $_POST['input2'];
            $query = "SELECT * FROM itineraries WHERE LOWER(from_city) LIKE LOWER(:input) AND LOWER(to_city) LIKE LOWER(:input2)";
            $stmt = $pdo->prepare($query); // Use prepared statements for security
            $stmt->execute([':input' => $input . '%',':input2' => $input2 . '%']);  
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt=$pdo->prepare("SELECT * FROM flights WHERE LOWER(from_city) LIKE LOWER(:input) AND LOWER(to_city) LIKE LOWER(:input2)");
            $stmt->execute([':input' => $input . '%',':input2' => $input2 . '%']);
            $flights=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($flights)>0)
            {
                foreach($flights as $flight)
                {
                    $itineraries=Flight::getItinerariesByFlightID($flight['id']);
                    if(count($itineraries)>1)
                    {
                        $from= reset(array: $itineraries);
                        $to = end($itineraries);
                        $departureTime = new DateTime($from['departure_time']);
                        $arrivalTime = new DateTime($to['arrival_time']);
                        if($flight['is_cancelled']===0&&$flight['is_completed']===0)
                        {
                            
                            echo '<div class="search-content">
                            <h5 style="color: blue;">' . $departureTime->format('Y-m-d H:i') . ' - ' . $arrivalTime->format('Y-m-d H:i') . '</h5>
                            <h3 style="margin: 1px;">' . $from['from_city'] . ' . . . . .
              <img src="https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/2708.svg" style="width: 20px; height: 20px; vertical-align: middle; margin: 0 5px;">
            . . . . . ' . $to['to_city'] . '</h3>
                            <form action="index.php?action=details" method="POST">
                                <button type="submit" name="FlightDetails" value="' . $flight['id']. '">Flight Details</button>
                            </form>
                          </div>';
                        
                    }



                    }
                }

            }
            
            if (count($result) > 0) {
                foreach ($result as $row) {
                    
                    $from = $row['from_city'];
                    $to = $row['to_city'];
                    $departure_time = $row['departure_time'];
                    $arrival_time = $row['arrival_time'];
                    $flight_id=$row['flight_id'];
                    $stmt = $pdo->prepare("SELECT * FROM flights WHERE id = :id");
                              $stmt->execute(['id' => $flight_id]);
                              $fligh = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($fligh['is_cancelled']===0&&$fligh['is_completed']===0){
                    echo '<div class="search-content">
                            <h5 style="color: blue;">' . $departure_time . ' - ' . $arrival_time . '</h5>
                            <h3 style="margin: 1px;">' . $from . ' . . . . .
            <img src="https://images.emojiterra.com/google/noto-emoji/unicode-16.0/color/svg/2708.svg" style="width: 20px; height: 20px; vertical-align: middle; margin: 0 5px;">
            . . . . . ' . $to . '</h3>
                            <form action="index.php?action=details" method="POST">
                                <button type="submit" name="FlightDetails" value="' . $row['flight_id'] . '">Flight Details</button>
                            </form>
                          </div>'; } 
            }
            } 
        }

        ?>
    </div>
</body>
</html>
