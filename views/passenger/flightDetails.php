<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/public/assets/Passenger.css">
    <link rel="stylesheet" href="views/public/assets/FlightDetails.css">
    <title>Flight Dtails</title>
    <style>
      
   
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f9f9f9;
      color: #333;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .summary {
      font-size: 18px;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .flight-section {
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 15px;
      padding: 15px;
    }

    .flight-section h3 {
      font-size: 18px;
      margin: 0 0 10px;
      color: #444;
    }

    .flight-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 10px 0;
    }

    .flight-info .details {
      text-align: center;
    }

    .flight-info .details p {
      margin: 5px 0;
    }

    .flight-info .airline {
      text-align: right;
      font-size: 14px;
      color: #666;
    }

    .divider {
      text-align: center;
      margin: 10px 0;
      color: #999;
    }

    .connection {
      font-size: 14px;
      color: #666;
      margin-top: 5px;
    }

    .flight-details {
      font-weight: bold;
      font-size: 16px;
    }

    .airplane-icon {
      font-size: 15px;
      color: #999;

    }
    .airplane-icon .icon-image {
        width: 200px; 
        height: 30px; 
      
    }
    .logo-container {
        display: flex;
        align-items: center; 
    }

    .logo-image {
        width: 60px;  
        height: 60px; 
        border-radius: 50%;  
        object-fit: cover;  
        margin-right: 10px; 
    }

    .flight-number {
        font-size: 16px;
        line-height: 40px; 
    }
    @import url('https://fonts.googleapis.com/css?family=Lato:400,700');
body {
  display: grid;
  overflow: hidden;
  font-family: "Lato", sans-serif;
  text-transform: uppercase;
  text-align: center;
  min-height: 100vh;
  background-color: #f4f4f4;
}
.container {
  position: relative;
  margin: auto;
  overflow: hidden;
  width: 700px;
  height: 250px;
}

.green {
  color: lightblue;
}
.red {
  color: #e96075;
}
.alert {
  font-weight: 700;
  letter-spacing: 5px;
}

button, .dot {
  cursor: pointer;
}
.success-box {
  position: absolute;
  width: 35%;
  height: 70%;
  left: 50%;
  top:0%;
  background: linear-gradient(to bottom right, lightblue,40%,lightblue 100%);
  border-radius: 20px;
  box-shadow: 5px 5px 20px rgba(203, 205, 211, 10);
  perspective: 40px;
  transform: translate(-50%,-50%) scale(0.1);
  visibility: hidden;
  transition: transform 0.4s, top 0.4s;
  
}
.open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%,-50%) scale(1);
}

.dot {
  width: 8px;
  height: 8px;
  background: #fcfcfc;
  border-radius: 50%;
  position: absolute;
  top: 4%;
  right: 6%;
}
.dot:hover {
  background: #c9c9c9;
}
.two {
  right: 12%;
  opacity: 0.5;
}
.face {
  position: absolute;
  width: 22%;
  height: 22%;
  background: #fcfcfc;
  border-radius: 50%;
  border: 1px solid #777;
  top: 21%;
  left: 37.5%;
  z-index: 2;
  animation: bounce 1s ease-in infinite;
}
.face2 {
  position: absolute;
  width: 22%;
  height: 22%;
  background: #fcfcfc;
  border-radius: 50%;
  border: 1px solid #777;
  top: 21%;
  left: 37.5%;
  z-index: 2;
  animation: roll 3s ease-in-out infinite;
}
.eye {
  position: absolute;
  width: 5px;
  height: 5px;
  background: #777;
  border-radius: 50%;
  top: 40%;
  left: 20%;
}
.right {
  left: 68%;
}
.mouth {
  position: absolute;
  top: 43%;
  left: 41%;
  width: 7px;
  height: 7px;
  border-radius: 50%;
}
.happy {
  border: 2px solid;
  border-color: transparent #777 #777 transparent;
  transform: rotate(45deg);
}
.sad {
  top: 49%;
  border: 2px solid;
  border-color: #777 transparent transparent #777;
  transform: rotate(45deg);
}
.shadow {
  position: absolute;
  width: 21%;
  height: 3%;
  opacity: 0.5;
  background: #777;
  left: 40%;
  top: 43%;
  border-radius: 50%;
  z-index: 1;
}
.scale {
  animation: scale 1s ease-in infinite;
}
.move {
  animation: move 3s ease-in-out infinite;
}
.message {
  position: absolute;
  width: 100%;
  text-align: center;
  height: 40%;
  top: 47%;
}
.button-box {
  position: absolute;
  background: #fcfcfc;
  width: 50%;
  height: 15%;
  border-radius: 20px;
  top: 73%;
  left: 25%;
  outline: 0;
  border: none;
  box-shadow: 2px 2px 10px rgba(119, 119, 119, .5);
  transition: all 0.5s ease-in-out;
}
.button-box:hover {
  background: #efefef;
  transform: scale(1.05);
  transition: all 0.3s ease-in-out;
}
@keyframes bounce {
  50% {
    transform: translatey(-10px);
  }
}
@keyframes scale {
  50% {
    transform: scale(0.9);
  }
}
@keyframes roll {
  0% {
    transform: rotate(0deg);
    left: 25%;
  }
  50% {
    transform: rotate(168deg);
    left: 60%;
  }
  100% {
    transform: rotate(0deg);
    left: 25%;
  }
}
@keyframes move {
  0% {
    left: 25%;
  }
  50% {
    left: 60%;
  }
  100% {
    left: 25%;
  }
}
    
  </style>
    

    <link rel="stylesheet" href="../assets/CompanyHome.css">
    <link rel="stylesheet" href="../assets/FlightDetails.css">
    <title>Flight Dtails</title>
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
            <h3><!-- Placeholder -->
            <?php echo $user['name'];?> </h3>

            <button onclick="window.location.href='index.php?action=passengerHome';">Home</button>


           <button onclick="window.location.href='index.php?action=passengerProfile';">Profile</button>


           <button onclick="window.location.href='index.php?action=login';">Logout</button>
        
        </div>
       <?php
        $start = new DateTime($flight['start_time']);
        $end = new DateTime($flight['end_time']);
        $interval = $start->diff($end);
        $total_hours = ($interval->days * 24) + $interval->h; 
        $total_minutes = $interval->i; 
        ?>

        <div class="right-container">
            <div class="top-right">
                <div class="flight-header">
                   <center> <h2>Flight Details</h2></center>
                   <p class="summary">
      From <strong><?php echo $flight['from_city']?></strong> to <strong><?php echo $flight ['to_city']?></strong><br>
      Fees: $<strong><?php echo $flight['fees']?></strong>
    </p>
                </div>
                <div class="flights-container">
                <?php foreach($it as $i):?>
                    
                    <?php
        $start = new DateTime($i['departure_time']);
        $end = new DateTime($i['arrival_time']);
        $interval = $start->diff($end);
        $total_hours = ($interval->days * 24) + $interval->h; 
        $total_minutes = $interval->i; 
        ?>
                
                
        <div class="FlightDetails">
                    
      <div class="flight-info">
        <div class="details">
          <p class="flight-details"><?php echo $i['from_city']?></p>
          <p><?php echo $i['departure_time']?></p>
        </div>
        <div class="airplane-icon"><img src="views/public/assets/airplane2.png"class="icon-image" ></div>
        <div class="details">
          <p class="flight-details"><?php echo $i['to_city']?></p>
          <p><?php echo $i['arrival_time']?></p>
          
        </div>
      </div>
      <div class="divider">Non-stop • <strong><?php echo $total_hours; ?> hrs <?php echo $total_minutes; ?> mins</strong> </div>
      <div class="airline"><div class="logo-container">
        <img src="<?php echo $logo['logo']; ?>" alt="Company Logo" class="logo-image">
        <span class="flight-number">Flight number: <strong><?php echo $flight['flight_uid']; ?></strong></span>
    </div><br>
        Company:<strong><?php echo $company['name']?></strong>

      </div>

                    </div>
                    <?php endforeach;?>
                    
                    
                    
                    <button onclick="openpopup()">Message Company</button>
                    
                    <script>
                    function openpopup() {
                        var flightId = <?php echo $flight['id']; ?>; // Get the flight ID from PHP
                        var url = 'Message.php?flight_id=' + flightId;
                        window.open(url, 'popup', 'width=600,height=400');
                    }
                    </script>




                    <form id="paymentForm" method="POST">
                        <label>Payment:</label>
                        <select name="payment" required>
                          <option value="Cash">Cash</option>
                          <option value="From Account">From Account</option>
                        </select>
                        <input type="hidden" name="flight_id" value="<?php echo $flight['id']; ?>">
                        <button type="submit" name="TakeFlight" value="<?php echo $flight['id']?>">Take Flight</button>
                        
                            <div class="success-box" id="popup">
              <div class="dot"></div>
              <div class="dot two"></div>
              <div class="face">
                <div class="eye"></div>
                <div class="eye right"></div>
                <div class="mouth happy"></div>
              </div>
              <div class="shadow scale"></div>
              <div class="message">
                <h1 class="alert">Congratulations!</h1>
                <p>yay, Your flight has been successfully booked</p>
              </div>
              
              <button class="button-box" type="button"onclick= "closePopup()">
                <h1 class="green">continue</h1>
              </button>
              </a>
           
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    let popup=document.getElementById("popup");
    function openPopup(){
            popup.classList.add("open-popup");
    }
    function closePopup(){
            popup.classList.remove("open-popup");
    }
    document.getElementById("paymentForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let formData = new FormData(this); 
    for (let [key, value] of formData.entries()) {
            console.log(key, value);
            
        }
    // Make AJAX request to submit the form
    fetch("index.php?action=payment", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(text => {
        console.log('Response Text:', text); 

        if (text === "success") {
            
            openPopup();
        } else if (text === "already_booked") {
            alert("You have already booked this flight.");
        } else if (text === "insufficient_funds") {
            alert("Insufficient funds. Please check your account balance.");
        } else {
            alert("An unexpected error occurred: " + text);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
    });
});
    </script>
                <img src="../assets/DemoLogo.png" alt="Website Logo" class="Companylogo" />
            </div>
            <h3><!-- Placeholder -->
                Saudi Arabian Airlines</h3>

            <form action="process.php" method="POST">
                <input type="submit" name="Profile" value="Profile"></input>
            </form>
        </div>

        <div class="right-container">
            <div class="FlightsDiv" style="max-height: fit-content;">
                <div class="flight-header">
                    <h2>Flight Details</h2>
                    <form action="process.php" method="POST">
                        <input type="submit"class="Cancel" name="Cancel Flight" value="Cancel Flight"></input>
                    </form>
                </div>

                <!-- placeholders-->
                <div class="flights-container">
                    <div class="FlightDetails">
                        <h5 style="color: blue;margin: 2px">ID:</h5><br>
                        <h3 style="margin: 1px; margin: 0px;">Name:</h3>
                        <h3 style="margin: 1px;">Itenerary:</h3>


                    </div>



                </div>
            </div>

            <div class="messageDiv">
                <!--placeholders-->
                <h3> Passengers</h3>
                <div class="flight">
                    <h3>Name</h3>
                    <h3>Status</h3>
                </div>
                <div class="flight">
                    <h3>Name</h3>
                    <h3>Status</h3>
                </div>
                <div class="flight">
                    <h3>Name</h3>
                    <h3>Status</h3>
                </div>

                <div class="flight">
                    <h3>Name</h3>
                    <h3>Status</h3>
                </div>
                <div class="flight">
                    <h3>Name</h3>
                    <h3>Status</h3>
                </div>
                <div class="flight">
                    <h3>Name</h3>
                    <h3>Status</h3>
                </div>






            </div>
        </div>
    </div>
</body>

</html>