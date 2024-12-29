<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add flight</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f1f1;
            color: #333;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #1e1e1e;
            color: #fff;
            height: 100vh;
            padding: 40px 20px;
            position: fixed;
            top: 0;
            /* left: 0; */
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            min-height: 100vh;
            border-radius: 20px;
        }

        .sidebar img {
            height: 150px;
            margin-bottom: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 50%
        }

        .sidebar h2 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 10px;
            font-size: 16px;
            transition: background 0.3s, transform 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #3498db;
            transform: translateX(10px);
        }

        .content {
            margin: 0 10px 0 300px;
            padding: 40px;
            width: calc(100% - 350px);
            background-color: #fff;
            min-height: calc(100vh - 40px);
            border-radius: 20px;
            background-image: url(../../views/public/assets/imgs/World\ Map.svg);
            background-repeat: no-repeat;
        }

        .container {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .add-flight-form-first {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .itinerary-form-group {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .itinerary-group {
            display: flex;
            flex-direction: row;
            gap: 20px;
            margin-bottom: 15px;
            background-color: #dce7f54f;
            padding: 10px;
        }

        .itinerary-group input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        .itinerary-group button {
            background-color: red;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 24px;
        }

        .itinerary-group button:hover {
            background-color: #ac1010;
        }

        .add-flight-form button {
            margin-top: 20px;
            padding: 12px;
            font-size: 16px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .add-flight-form button:hover {
            background-color: #34495e;
        }

        button[type="button"] {
            margin-top: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            width: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button[type="button"]:hover {
            background-color: #2980b9;
        }

        @media screen and (max-width: 768px) {
            .add-flight-form-first {
                grid-template-columns: 1fr;
            }

            .itinerary-group {
                flex-direction: column;
            }

            .content {
                margin-left: 0;
            }
        }
        .container{
            width: 100%;
            padding: 20px;
        }
        #itinerary-container{
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="<?php echo $company['logo']; ?>" alt="company logo">
            <a href="index.php?action=companyHome">Home</a>
            <a href="index.php?action=profile">Profile</a>
            <a href="index.php?action=add_flight" class="active">Add Flight</a>
        </div>

        <div class="content">
            <main class="container">
                <form action="index.php?action=add_flight" method="POST" class="add-flight-form">
                    <div class="add-flight-form-first">
                        <div class="form-group">
                            <label for="flight_uid">Flight UID: <span style="color: red;">*</span></label>
                            <input type="text" id="flight_uid" name="flight_uid" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Flight name: <span style="color: red;">*</span></label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="fees">Fees: <span style="color: red;">*</span></label>
                            <input type="number" id="fees" name="fees" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="passengers_count"># of passengers: <span style="color: red;">*</span></label>
                            <input type="number" id="passengers_count" name="passengers_count" required>
                        </div>
                        <div class="form-group">
                            <label for="start_time">Start time: <span style="color: red;">*</span></label>
                            <input type="datetime-local" id="start_time" name="start_time" required>
                        </div>
                        <div class="form-group">
                            <label for="end_time">End time: <span style="color: red;">*</span></label>
                            <input type="datetime-local" id="end_time" name="end_time" required>
                        </div>
                    </div>

                    <div class="itinerary-form-group">
                        <label for="itinerary">Itineraries:</label>
                        <div id="itinerary-container">
                            <div class="itinerary-group">
                                <div>
                                    <label for="from_city[]">From city:</label>
                                    <input type="text" name="from_city[]" placeholder="Enter departure city" required>

                                    <label for="departure_time[]">Departure time:</label>
                                    <input type="datetime-local" name="departure_time[]" required>
                                </div>

                                <div>
                                    <label for="to_city[]">To city:</label>
                                    <input type="text" name="to_city[]" placeholder="Enter destination city" required>

                                    <label for="arrival_time[]">Arrival time:</label>
                                    <input type="datetime-local" name="arrival_time[]" required>
                                </div>

                                <button type="button" class="delete-itinerary-btn" onclick="deleteItinerary(this)">x</button>
                            </div>
                        </div>
                        <button type="button" onclick="addItineraryField()">+</button>
                    </div>

                    <button type="submit" class="submit-btn">Add Flight</button>
                </form>
            </main>
        </div>
    </div>
    <script>
        function addItineraryField() {
            var container = document.getElementById('itinerary-container');
            var div = document.createElement('div');
            div.className = 'itinerary-group';
            div.innerHTML = `
                <div>
                    <label for="from_city[]">From City:</label>
                    <input type="text" name="from_city[]" placeholder="Enter departure city" required>

                    <label for="departure_time[]">Departure Time:</label>
                    <input type="datetime-local" name="departure_time[]" required>
                </div>
                <div>
                    <label for="to_city[]">To City:</label>
                    <input type="text" name="to_city[]" placeholder="Enter destination city" required>

                    <label for="arrival_time[]">Arrival Time:</label>
                    <input type="datetime-local" name="arrival_time[]" required>
                </div>
                <button type="button" class="delete-itinerary-btn" onclick="deleteItinerary(this)">x</button>
            `;
            container.appendChild(div);
        }

        function deleteItinerary(button) {
            var itineraryGroup = button.closest('.itinerary-group');
            itineraryGroup.remove();
        }
    </script>
</body>
</html>
