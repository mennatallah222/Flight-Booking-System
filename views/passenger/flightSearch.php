<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <title>Search</title>
</head>

<body>
    <header class="app-header">
        <div class="logo-container">
            <img src="views/public/assets/logo.png" alt="Website Logo" class="logo" />
            <h1 class="app-name">FlyMates</h1>
        </div>
    </header>

    <div class="main-content">
        <div class="ProfileDiv">
            <div class="logo-container"> <!-- Placeholder -->
            <img src="<?php echo $passenger['photo']; ?>"alt="User Photo" style="width: 170px; height: 170px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd;" />
            </div>
            <!-- Placeholder -->
            <h3><?php echo $user['name']; ?></h3>
            <h5 style="margin: 0px;"><?php echo $user['email']; ?></h5>
            <h5 style="margin: 3px;"><?php echo $user['tel']; ?></h5>
            <!-- Home Button -->
<button onclick="window.location.href='index.php?action=passengerHome';">Home</button>

<!-- Profile Button -->
<button onclick="window.location.href='index.php?action=passengerProfile';">Profile</button>

<!-- Logout Button -->
<button onclick="window.location.href='index.php?action=login';">Logout</button>
        </div>

        <div class="right-container">

            <div class="bottom-right">
                <div class="bottom-right-header">
                    <h2>Search</h2>
                </div>
                <div style="display: flex; flex-direction: column;">

                    <form name="search" method="get" action="process.php" class="search-form">
                        
                        <div>
                            <div>
                                <label>From:</label>
                                <input type="text" name="from" class="form-control" id="live_search" autocomplete="off" />
                            </div>
                            <div>
                                <label>To:</label>
                                <input type="text" name="to" class="form-control" id="live_search2" autocomplete="off" />
                            </div>
                            <div>
                                <br /><br />
                                <input type="submit" name="Search" value="Search" />
                            </div>
                        </div> <!-- Added missing closing tag for this <div> -->
                            
                        </form> <!-- Properly closed this <form> tag -->
                        <head>

</head>
                </div>
        
                    
                    <!-- placeholders-->
                    <div class="bottom-right-container" id="searchresult"> 
            </div>
        </div>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search, #live_search2").keyup(function(){
            var input=$("#live_search").val();
            var input2 = $("#live_search2").val();
            //alert(input);
            if(input != "" || input2 !== ""){
               $.ajax({
                url:"index.php?action=search",
                method:"POST",
                data:{input:input,input2: input2},
                success:function(data){
                    $("#searchresult").html(data);
                    $("#searchresult").css("display","block");
                }

               });
            }else{
                $("#searchresult").css("display","none");
            }

        });

    });


</script>
</body>

</html>

</html>