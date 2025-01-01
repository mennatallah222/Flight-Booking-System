<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/public/assets/Forms.css">
    <link rel="stylesheet" href="views/public/assets/Passenger.css">
    <title>Edit Profile</title>
    <style>
button:hover {
    cursor: pointer;
  }
  .nav-buttons {
    display: flex;
    gap: 20px;
    margin-left: auto;
   
}
   
.btn {
    background-color: white;
    color: lightblue;
    border: 1px solid lightblue;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    font-family: 'Arial', sans-serif;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.btn:hover {
    background-color: #f4f4f4;
    
}
</style>
</head>

<body>
    <header class="app-header">
        <div class="logo-container">
        <img src="views/public/assets/logo.png" alt="Website Logo" class="logo" />
            <h1 class="app-name">FlyMates</h1>
        </div>
        
    </header>

    <div class="main-content" style="flex-direction: unset;">
        <div class="ProfileDiv" style="max-width: 250px;">
            <div class="logo-container">
                 <!-- Placeholder -->
            <img src="<?php echo $passenger['photo']; ?>"alt="User Photo" style="width: 170px; height: 170px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd;" />
            </div>
            <h3><!-- Placeholder -->
            <?php echo $user['name'];?></h3>
            <button onclick="window.location.href='index.php?action=passengerHome';">Home</button>


           <button onclick="window.location.href='index.php?action=passengerProfile';">Profile</button>


           <button onclick="window.location.href='index.php?action=login';">Logout</button>
        
        </div>

        <div class="right-container"  >
            <div class="bottom-right" >
                <form name="reg3" method="post" action="index.php?action=updatePassengerDetails" style="border: 0px;"enctype="multipart/form-data">
                    <h1>Edit Profile</h1>

                    <div style="display: flex; gap: 10px;">
                        <div>
                            <label>Name:</label>
                            <input type="text" name="name" value="<?php echo $user['name'];?>"/>
                        </div>
                        <div>
                            <label>Password:</label>
                            <input type="password" name="password" />
                        </div>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <div>
                            <label>Telephone Number:</label>
                            <input type="tel" name="phone"value="<?php echo $user['tel'];?>" />
                        </div>
                        <div>
                            <label>Email:</label>
                            <input type="email" name="email"value="<?php echo $user['email'];?>"  />
                        </div>
                    </div>

                    <div>
                        <label>Profile Picture:</label><br>
                        <input type="file" name="personalimg" accept="image/*" value="<?php echo $passenger['photo']; ?>"/>
                        
                        <label>Passport:</label><br>
                        <input type="file" name="passportimg" accept="image/*" value="<?php echo $passenger['passport_img']; ?>"/>
                    
                    </div>

                    <input type="submit" name="SaveChanges" value="Save Changes"></input>

                </form>
            </div>

        </div>
    </div>








</body>

</html>