<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company home</title>
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
        <div class="add-flight">
            <h2>Flights</h2>
            <button onclick="window.location.href='index.php?action=add_flight'">Add Flight</button>

        </div>

        <table class="flight-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Flight Name</th>
                    <th>fees</th>
                    <th>Itinerary</th>
                    <th>Pending Passengers</th>
                    <th>Registered Passengers</th>
                    <th>Is completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($flights as $flight): ?>
                <tr onclick="window.location.href='flight_details.php?id=<?php echo $flight['id']; ?>'">
                    <td><?php echo $flight['id']; ?></td>
                    <td><?php echo $flight['name']; ?></td>
                    <td><?php echo $flight['fees']; ?></td>
                    <td>
                        <?php
                            $itineraries=Flight::getItinerariesByFlightID($flight['id']);
                            foreach($itineraries as $itinerary):
                        ?>
                        <div>
                            <strong>
                                <?php echo $itinerary['city']; ?>
                            </strong>:
                            arrival at: <?php echo $itinerary['arrival_time']; ?>
                            departure at: <?php echo $itinerary['departure_time']; ?>
                        </div>
                        <?php endforeach;?>
                    </td>
                    <td><?php echo $flight['pending_passengers']; ?></td>
                    <td><?php echo $flight['registered_passengers']; ?></td>
                    <td><?php echo $flight['is_completed'] ? 'yes' : 'no'; ?></td>

                    <td>
                        <button onclick="cancelFlight(<?php echo $flight['id']; ?>)">Cancel Flight</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2024 <?php echo $company['name']; ?>. All rights reserved</p>
    </div>

    <script>
        function cancelFlight(flightId) {
            if (confirm('Are you sure you want to cancel this flight?')) {
                window.location.href = 'cancel_flight.php?id=' + flightId;
            }
        }
    </script>
</body>
</html>
