<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Styles.css">
    <title>FlyMates - Best Flight Deals</title>
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

        .banner {
            background: url('../assets/banner.jpg') no-repeat center center/cover;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-shadow: 2px 2px 4px #000;
        }

        .banner-text {
            font-size: 36px;
            font-weight: bold;
        }

        .search-form {
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: #fff;
            margin-top: -50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .search-form input,
        .search-form select {
            padding: 10px;
            margin: 0 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-form button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        .popular-routes {
            padding: 20px;
            background-color: #f4f4f4;
        }

        .route {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .route img {
            max-width: 100%;
            border-radius: 5px;
        }

        .route h3 {
            margin-top: 10px;
        }

        .route p {
            color: #007bff;
            font-weight: bold;
        }

        .info-section {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #fff;
            margin-top: 20px;
            border-top: 1px solid #ddd;
        }

        .info-section div {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-right: 1px solid #ddd;
        }

        .info-section div:last-child {
            border-right: none;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">FlyMates</div>
        <nav class="nav-links">
            <a href="#">Help</a>
            <a href="index.php?action=home">Home</a>
            <a href="index.php?action=register">Register</a>
            <a href="index.php?action=login">Login</a>
        </nav>
    </header>

    <div class="banner">
        <div class="banner-text">Best deals are waiting for you</div>
    </div>

    <div class="search-form">
        <form>
            <input type="text" placeholder="Departure Airport" value="London Stansted">
            <input type="text" placeholder="Destination Airport" value="Stockholm">
            <input type="date" value="2023-10-06">
            <input type="date" value="2023-10-18">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="popular-routes">
        <h2>Popular Routes</h2>
        <div class="route">
            <img src="../assets/madrid.jpg" alt="Madrid">
            <h3>Madrid</h3>
            <p>From $50</p>
        </div>
        <div class="route">
            <img src="../assets/oslo.jpg" alt="Oslo">
            <h3>Oslo</h3>
            <p>From $60</p>
        </div>
        <div class="route">
            <img src="../assets/doha.jpg" alt="Doha">
            <h3>Doha</h3>
            <p>From $380</p>
        </div>
        <div class="route">
            <img src="../assets/nyc.jpg" alt="New York City">
            <h3>New York City</h3>
            <p>From $100</p>
        </div>
    </div>

    <div class="info-section">
        <div>
            <h3>Guarantee of the best price</h3>
            <p>We offer only the best deals, if you find the same flight cheaper elsewhere, contact us!</p>
        </div>
        <div>
            <h3>Refunds & cancellations</h3>
            <p>Your flight got canceled? We have you covered with our instant refund services.</p>
        </div>
        <div>
            <h3>Covid-19 information</h3>
            <p>Read about all the travel restrictions due to covid-19 that may affect your flight.</p>
        </div>
    </div>

    <footer class="footer">
        &copy; 2024 FlyMates. All Rights Reserved.
    </footer>
</body>
</html>
