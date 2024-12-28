<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
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
  
</style>
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
            <a href="index.php?action=home">Home</a>
            <a href="index.php?action=register">Register</a>
            <a href="index.php?action=login">Login</a>
        </div>
    </header>

    <div class="main-content">
        <div class="ProfileDiv">
            <div class="logo-container"> <!-- Placeholder -->
                <img src="../assets/Passenger.png" alt="Website Logo" class="Companylogo" />
            </div>
            <!-- Placeholder -->
            <h3>Abdelrhman Gamal</h3>
            <h5 style="margin: 0px;">Agamal@email.com</h5>
            <h5 style="margin: 3px;">+20123456789</h5>

            <form action="process.php" method="POST">
                <input type="submit" name="Profile" value="Profile"></input>
            </form>
        </div>

        <div class="right-container">
            <div class="top-right">
                
                <div class="top-right-header">
                    <h2>Current Flights</h2>
                    <form action="process.php" method="POST">
                        <input type="submit" name="AddFlight" value="&#x1F50E;&#xFE0E; Add Flight" ></input>
                    </form>
                </div>

                <!-- placeholders-->
                <div class="content-container">
                    <div class="content">
                        <h5 style="color: blue;">8:30-11:00</h5>
                        <h3 style="margin: 1px;">CAI . . . . . NYC</h3>
                        <h3 style="margin: 1px;">$200</h3>
                        <form action="process.php" method="POST">
                            <button type="submit" name="FlightDetails" value="FlightDetails">Flight Details</button>
                        </form>
                    </div>
                    <div class="content">
                        <h5 style="color: blue;">8:30-11:00</h5>
                        <h3 style="margin: 1px;">CAI . . . . . NYC</h3>
                        <h3 style="margin: 1px;">$300</h3>
                        <form action="process.php" method="POST">
                            <button type="submit" name="FlightDetails" value="FlightDetails">Flight Details</button>
                        </form>
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
                        <h5 style="color: blue;">8:30-11:00</h5>
                        <h3 style="margin: 1px;">CAI . . . . . NYC</h3>
                        <h3 style="margin: 1px;">$300</h3>
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