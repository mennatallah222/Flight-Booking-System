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
        margin: 0;
        background-color: #f4f4f4;
    }
.header {
            background-color: #007bff;
            padding: 20px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #f4f4f4;
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
    <header class="header">
        <div class="logo">FlyMates</div>
        <nav class="nav-links">
            <a href="#">Help</a>
            <a href="index.php?action=home">Home</a>
            
        </nav>
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
            <p>Don't have an account? <a href="../Register/RegisterForm.html">Register</a></p>
        </form>
    </div>
</body>
</html>
