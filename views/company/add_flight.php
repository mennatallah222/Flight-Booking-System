<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Flight</title>
</head>
<body>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        header .logo h1 {
            font-size: 24px;
            margin: 0;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 16px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-left: 20%;
            padding: 20px;
        }

        .add-flight-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .add-flight-form .form-group {
            display: flex;
            flex-direction: column;
        }

        .add-flight-form label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .add-flight-form input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .itinerary-form-group{
            display: flex;
            flex-direction: column;
        }
        .itinerary-group{
            display: flex;
            flex-direction: row;
            gap: 10px;
        }
        .itinerary-group [input]{
            padding: 10px;
        }
        .add-flight-form button {
            grid-column: span 2;
            padding: 12px;
            font-size: 16px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-flight-form button:hover {
            background-color: #34495e;
        }

        button[type="button"] {
            margin-top: 10px;
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
        }

        button[type="button"]:hover {
            background-color: #3498db;
        }

        @media screen and (max-width: 768px) {
            .add-flight-form {
                grid-template-columns: 1fr;
            }
        }

        .sidebar {
            width: 15%;
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            padding: 20px;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }
        #itinerary-container div{
            padding: 10px;
        }
        .sidebar a.active, .sidebar a:hover{
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <div class="sidebar">
        <a href="index.php?action=companyHome">Overview</a>
        <a href="profile.php">Profile</a>
        <a href="messages.php">Messages</a>
        <a href="index.php?action=add_flight" class="active">Add Flight</a>

    </div>

    <div class="content">
    
        <main class="container">
            <form action="index.php?action=add_flight" method="POST" class="add-flight-form">
                <div class="form-group">
                    <label for="name">Flight name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="id">Flight ID:</label>
                    <input type="text" id="id" name="id" required>
                </div>
                <div class="form-group">
                    <label for="fees">Fees:</label>
                    <input type="number" id="fees" name="fees" required>
                </div>
                <div class="form-group">
                    <label for="passengers_count">No. of passengers:</label>
                    <input type="number" id="passengers_count" name="passengers_count" required>
                </div>
                <div class="form-group">
                    <label for="start_time">Start time:</label>
                    <input type="datetime-local" id="start_time" name="start_time" required>
                </div>
                <div class="form-group">
                    <label for="end_time">End time:</label>
                    <input type="datetime-local" id="end_time" name="end_time" required>
                </div>
                <div class="itinerary-form-group">
                    <label for="itinerary">Itineraries:</label>
                    <div id="itinerary-container">
                        <div class="itinerary-group">
                            <input type="text" name="cities[]" placeholder="City" required>
                            <input type="datetime-local" name="arrival_times[]" placeholder="Arrival Time" required>
                            <input type="datetime-local" name="departure_times[]" placeholder="Departure Time" required>
                        </div>
                    </div>
                    <button type="button" onclick="addItineraryField()">Add more cities</button>
                </div>
                <button type="submit" class="submit-btn">Add Flight</button>
            </form>
        </main>
    </div>
    

    <script>
        function addItineraryField() {
            var container = document.getElementById('itinerary-container');
            var div = document.createElement('div');
            div.className = 'itinerary-group';
            div.innerHTML = `
                <input type="text" name="cities[]" placeholder="City" required>
                <input type="datetime-local" name="arrival_times[]" placeholder="Arrival Time" required>
                <input type="datetime-local" name="departure_times[]" placeholder="Departure Time" required>
            `;
            container.appendChild(div);
        }
    </script>

</body>
</html>
