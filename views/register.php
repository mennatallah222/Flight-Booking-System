<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/Forms.css">
    <title>Register</title>
  </head>
  <style>
    /* Body: Center content both vertically and horizontally */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column; /* Stack header and form vertically */
      align-items: center; /* Center horizontally */
      height: 100vh;
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
    
    /* Form Container */
    .form-container {
      margin-top: 50px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Form Style */
    form {
      width: 500px; /* Full width of the container */
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      display: flex;
      flex-direction: column;
    }
    
    form div {
      margin-bottom: 15px;
    }
    
    /* Input and Select Styles */
    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="password"],
    input[type="tel"],
    textarea,
    select {
      width: 100%;
      padding: 12px;
      margin: 5px 0;
      border-radius: 5px;
      border: 1px solid #0000005f;
      font-size: 14px;
      box-sizing: border-box;
    }
    
    /* Style the input[type="image"] */
    input[type="file"] {
      width: 500px;
      height: 50;
      padding: 12px;
      margin: 5px 0;
      border-radius: 0px;
      border: none;
      font-size: 14px;
      box-sizing: border-box;
      cursor: pointer; /* Change cursor to indicate it's clickable */
      transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for effects */
    }
    
    /* Optional: Add focus styles (when the input is selected) */
    input:focus,
    textarea:focus {
      outline: none; /* Remove default outline */
      border: 2px solid lightblue; /* Add a custom border color */
      box-shadow: 0 0 10px rgba(114, 194, 221, 0.657); /* Custom shadow for focus */
    }
    
    /* Button Style */
    button {
      width: 100%;
      padding: 12px;
      background-color: rgb(120, 199, 225);
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    
    button:hover {
      background-color: rgb(61, 178, 217);
    }
  </style>
  <body>
    <!-- App Header -->
    <header class="app-header">
      <div class="logo-container">
        <img src="../views/public/assets/logo.png" alt="Website Logo" class="logo" />
        <h1 class="app-name">FlyMates</h1>
      </div>
    </header>

    <div class="form-container">
      <form name="reg1" method="post" action="index.php?action=register">
    <h1>Register a new user</h1>
    <div>
        <label>Name:</label>
        <input type="text" name="name" required />
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password" required />
    </div>
    <div>
        <label>Telephone Number:</label>
        <input type="tel" name="tel" required />
    </div>
    <div>
        <label>Type:</label>
        <select name="type" required>
            <option value="company">Company</option>
            <option value="passenger">Passenger</option>
        </select>
    </div>
    <button type="submit">Register</button>

        <p>Already a user? <a href="index.php?action=login">Login</a></p>
      </form>
    </div>
  </body>
</html>
