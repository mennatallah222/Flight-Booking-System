<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

<style>
button:hover {
    cursor: pointer;
  }
  
</style>
</head>
<body>
    
</body><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/public/assets/Passenger.css">
    <link rel="stylesheet" href="../assets/Passenger.css">
    <title>Company Home</title>
</head>

<body>
    <header class="app-header">
        <div class="logo-container">
        <img src="views/public/assets/logo.png" alt="Website Logo" class="logo" />

            <img src="../assets/logo.png" alt="Website Logo" class="logo" />
            <h1 class="app-name">FlyMates</h1>
        </div>
    </header>

    <div class="main-content">
        <div class="ProfileDiv">
            <div class="logo-container"> <!-- Placeholder -->
            <img src="<?php echo $passenger['photo']; ?>"alt="User Photo" style="width: 170px; height: 170px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd;" />
            </div>
            <!-- Placeholder -->
            <h3><?php echo $user['name'];?></h3>
            <button onclick="window.location.href='index.php?action=passengerHome';">Home</button>

<button onclick="window.location.href='index.php?action=passengerProfile';">Profile</button>

<button onclick="window.location.href='index.php?action=login';">Logout</button>
        
                <img src="../assets/Passenger.png" alt="Website Logo" class="Companylogo" />
            </div>
            <!-- Placeholder -->
            <h3>Abdelrhman Gamal</h3>



        </div>

        <div class="right-container">
            <div class="top-right">
                
                <div class="top-right-header">
                    <h2>Details</h2>
                    <a href="index.php?action=edit-profile"><button>Edit Profile</button></a>
                    <form action="process.php" method="POST">
                        <input type="submit" name="EditProfile" value="Edit Profile"></input>
                    </form>
                </div>

                <!-- placeholders-->
                <div class="content-container" >
                    <div class="content">
                        <h3 style="margin: 1px;">Email: <?php echo $user['email']; ?></h3>
                    </div>
                    <div class="content">
                        <h3 style="margin: 1px;">Phone: <?php echo $user['tel']; ?></h3>
                    </div>
                    <div class="content">
                        <h3 style="margin: 1px;">passport</h3><br>
                        <img src="<?php echo $passenger['passport_img']; ?>"style="max-height: 300px;">
                    </div>
                        <h3 style="margin: 1px;">Email: Agamal@email.com</h3>
                    </div>
                    <div class="content">
                        <h3 style="margin: 1px;">Tel: +20123456789</h3>
                    </div>
                    <div class="content">
                        <h3 style="margin: 1px;">Tel: +20123456789</h3>
                    </div>
                    <div class="content">
                        <h3 style="margin: 1px;">passport</h3><br>
                        <img src="../assets/passport.jpg" style="max-height: 300px;">
                    </div>


                </div>
            </div>

            <div class="bottom-right">
                <div class="bottom-right-header">
                    <h2>Completed Flights</h2>
                </div>

                <!-- placeholders-->
                <div class="bottom-right-container">
                <?php
                $userId = $_SESSION['user_id'];
                $passenger=Passenger::getByUserId($userId);
                global $pdo;
                $stmt=$pdo->prepare("SELECT *FROM flight_passengers WHERE passenger_id=? ");
                $stmt->execute([$passenger['id']]);
                $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($results as $row)
                { $stmt=$pdo->prepare("SELECT *FROM flights WHERE id=? AND is_completed=1");
                  $stmt->execute([$row['flight_id']]);
                  $flights=$stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach($flights as $flight)
                  {
                    echo'
                    
                    <div class="content">
                        
                        <h3 style="margin: 1px;">'.$flight['from_city'].'. . . . . '.$flight['to_city'].'</h3>
                      
                    </div>

               
                    ';
                  }
                  
                }
                
                ?>
                   
                    <div class="content">
                     
                        <h3 style="margin: 1px;">CAI . . . . . NYC</h3>
       
                        <form action="process.php" method="POST">
                            <button type="submit" name="FlightDetails" value="FlightDetails">Flight Details</button>
                        </form>
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>

</html>