
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
 body {
    font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column; /* Stack header and form vertically */
      align-items: center; /* Center horizontally */
      height: 100vh;
      background-image: url(../views/public/assets/imgs/66f64c79c822b34ebf52fc0b1d67d805\ \(1\).png);
      background-repeat: no-repeat;
      background-position:center;
    }
.app-header {
      flex-shrink: 0;
      width: 97%;
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
    
.form-container {
  margin-top: 50px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-container {
   margin-top: 50px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
}

form {
    width: 500px;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    display: flex;
    flex-direction: column;
    position: absolute;
    right: 100px;
}

form div {
    margin-bottom: 15px;
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
    margin: 5px 0;
    border-radius: 5px;
    border: 1px solid #0000005f;
    font-size: 14px;
    box-sizing: border-box;
}

input[type="file"] {
    width: 500px;
    height: 50;
    padding: 12px;
    margin: 5px 0;
    border-radius: 0px;
    border: none;
    font-size: 14px;
    box-sizing: border-box;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
input:focus,
textarea:focus {
    outline: none;
    border: 2px solid lightblue;
    box-shadow: 0 0 10px rgba(114, 194, 221, 0.657);
}

button {
    width: 100%;
    padding: 12px;
    background-color: #3498db;
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
    <header class="app-header">
        <div class="logo-container">
        <img src="views/public/assets/logo.png" alt="Website Logo" class="logo" />
          <h1 class="app-name">FlyMates</h1>
        </div>
      </header>
   

    <div class="form-container">
        <form action="index.php?action=login" method="POST">
            <h1>Login</h1>
            <div>
                <label>Email:</label>
                <input type="email" name="email" placeholder="Email" required />
            </div>

            <div>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Password" required />
            </div>

            <button type="submit">Login</button>
            <p>Don't have an account? <a href="index.php?action=register">Register</a></p>
        </form>
    </div>
</body>
</html>