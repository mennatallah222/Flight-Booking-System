<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
</body><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Passenger.css">
    <title>Company Home</title>
</head>

<body>
    <header class="app-header">
        <div class="logo-container">
            <img src="../assets/logo.png" alt="Website Logo" class="logo" />
            <h1 class="app-name">FlyMates</h1>
        </div>
    </header>

    <div class="main-content">
        <div class="ProfileDiv">
            <div class="logo-container"> <!-- Placeholder -->
                <img src="../assets/Passenger.png" alt="Website Logo" class="Companylogo" />
            </div>
            <!-- Placeholder -->
            <h3>Abdelrhman Gamal</h3>



        </div>

        <div class="right-container">
            <div class="top-right">
                
                <div class="top-right-header">
                    <h2>Details</h2>
                    <form action="process.php" method="POST">
                        <input type="submit" name="EditProfile" value="Edit Profile"></input>
                    </form>
                </div>

                <!-- placeholders-->
                <div class="content-container" >
                    <div class="content">
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