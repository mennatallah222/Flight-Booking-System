<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add flight</title>
    <link rel="stylesheet" href="../../views/assets/styles.css">
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="<?php echo $company['logo']; ?>" alt="Company Logo">
            <h1><?php echo $user['name']; ?></h1>
        </div>
        <div class="nav">
            <a href="profile.php">Profile</a>
            <a href="messages.php">Messages</a>
        </div>
    </div>

    <div class="container">
        <h2>Add Flight</h2>
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
                <label for="passengers_count">No. of Passengers:</label>
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
            <div class="form-group">
                <label for="itinerary">Itineraries:</label>
                <div id="itinerary-container">
                    <div class="itinerary-group">
                        <input type="text" name="cities[]" placeholder="City" required>
                        <input type="datetime-local" name="arrival_times[]" placeholder="Arrival Time" required>
                        <input type="datetime-local" name="departure_times[]" placeholder="Departure Time" required>
                    </div>
                </div>
                <button type="button" onclick="addItineraryField()">Add More Cities</button>
            </div>
            <button type="submit" class="submit-btn">Add Flight</button>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 <?php echo $company['name']; ?>. All rights reserved</p>
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
