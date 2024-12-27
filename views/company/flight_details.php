<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight details</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            display: flex;
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

        .content {
            margin-left: 20%;
            padding: 20px;
            width: 80%;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stats-cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            text-align: center;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            margin: 0;
        }
        .card p {
            margin: 10px 0 0;
        }

        .flight-info, .passenger-info {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .flight-info h2, .passenger-info h2 {
            margin-bottom: 20px;
        }

        .flight-details-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
        }

        .flight-details-table th, .flight-details-table td {
            padding: 10px;
            text-align: left;
        }

        .flight-details-table th {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
        }

        .cancel-btn, .refund-btn {
            border-radius: 4px;
            padding: 7px;
            border: none;
            font-weight: bold;
            color: white;
        }

        .cancel-btn {
            background-color: red;
        }

        .refund-btn {
            background-color: green;
            margin-left: 10px;
        }

        .tablesdiv {
            overflow: auto;
            max-height: 250px;
        }

        .pending-passengers, .registered-passengers {
            margin-top: 20px;
        }

        .itiernaray-info {
            display: flex;
            justify-content: space-between;
            margin: 0 20px;
        }

        .itiernaray-info-city {
            font-weight: bold;
        }

        .separating-line-div {
            display: flex;
            align-items: center;
        }

        .separating-line {
            display: inline-block;
            width: 60px;
            height: 2px;
            background-color: #343a40;
            margin: 0 2px;
        }

        #itineraryModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        #itineraryModal > div {
            background: white;
            margin: 10% auto;
            padding: 20px;
            width: 50%;
            position: relative;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .itineraries-td:hover {
            cursor: pointer;
        }
        .timeline-container {
            position: relative;
            margin: 20px 0;
            padding-left: 20px;
            border-left: 3px solid #007bff;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 5px;
            left: -8px;
            width: 15px;
            height: 15px;
            background-color: #007bff;
            border-radius: 50%;
        }
        .timeline-city {
            font-weight: bold;
            color: #343a40;
        }
        .timeline-time {
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="<?php echo $company['logo']; ?>" alt="Company Logo" style="height: 150px;display: grid;justify-self: center; margin-bottom:70px">
        <a href="index.php?action=companyHome">Home</a>
        <a href="profile.php">Profile</a>
        <a href="index.php?action=add_flight">Add flight</a>
    </div>

    <div class="content">
        <div class="flight-info">
            <h2>Flight Information</h2>
            <table class="flight-details-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Itinerary</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $flight['id']; ?></td>
                        <td><?php echo $flight['name']; ?></td>
                        <td class="itineraries-td" onclick='showItineraryDetails(<?php echo json_encode(Flight::getItinerariesByFlightID($flight['id'])); ?>)'>
                            <?php
                                $itineraries = Flight::getItinerariesByFlightID($flight['id']);
                                $firstItinerary = reset($itineraries);
                                $lastItinerary = end($itineraries);
                            ?>

                            <div class="itiernaray-info">
                                <span><?php echo substr($firstItinerary['departure_time'], 11, 5); ?></span>
                                <?php
                                    $departureTime = new DateTime($firstItinerary['departure_time']);
                                    $arrivalTime = new DateTime($lastItinerary['departure_time']);
                                    $interval = $departureTime->diff($arrivalTime);
                                    $totalFlightTime = $interval->format('%a days %h hours %i minutes');
                                ?>
                                <span><?php echo $totalFlightTime; ?></span>
                                <span><?php echo substr($lastItinerary['departure_time'], 11, 5); ?></span>
                            </div>

                            <div class="itiernaray-info">
                                <span class="itiernaray-info-city"><?php echo $firstItinerary['city']; ?></span>
                                <div class="separating-line-div">
                                    <span>✈︎</span>
                                    <span class="separating-line"></span>
                                </div>
                                <span class="itiernaray-info-city"><?php echo $lastItinerary['city']; ?></span>
                            </div>
                        </td>
                        <td><?php echo ($flight['is_cancelled'] ? 'Cancelled' : 'Ongoing'); ?></td>
                        <td>
                            <?php if (!$flight['is_cancelled']): ?>
                                <button class="cancel-btn" onclick="cancelFlight(<?php echo $flight['id']; ?>)">Cancel Flight</button>
                            <?php else: ?>
                                <button class="cancel-btn" disabled>Flight Cancelled</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="passenger-info pending-passengers">
            <h3>Pending Passengers</h3>
            <table class="tablesdiv">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pendingPassengers as $passenger): ?>
                    <tr>
                        <td><?php echo $passenger['name']; ?></td>
                        <td><?php echo $passenger['email']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div id="itineraryModal">
            <div>
                <h2>Itinerary Timeline</h2>
                <div id="itineraryDetails" class="timeline-container"></div>
                <button onclick="closeModal()">Close</button>
            </div>
        </div>

        <div class="passenger-info registered-passengers">
            <h3>Registered Passengers</h3>
            <table class="tablesdiv">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registeredPassengers as $passenger): ?>
                    <tr>
                        <td><?php echo $passenger['name']; ?></td>
                        <td><?php echo $passenger['email']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function showItineraryDetails(itineraries) {
            const modal = document.getElementById('itineraryModal');
            const detailsContainer = document.getElementById('itineraryDetails');
            detailsContainer.innerHTML='';
            itineraries.forEach((itinerary, index) => {
                const div = document.createElement('div');
                div.className = 'timeline-item';
                div.innerHTML = `
                    <div class="timeline-city">${index + 1}. ${itinerary.city}</div>
                    <div class="timeline-time">
                        Arrival: ${itinerary.arrival_time} | Departure: ${itinerary.departure_time}
                    </div>
                `;
                detailsContainer.appendChild(div);
            });

            modal.style.display = 'block';
        }


        function closeModal() {
            const modal = document.getElementById('itineraryModal');
            modal.style.display = 'none';
        }

        function cancelFlight(flightId) {
            if (confirm('Are you sure you want to cancel this flight?')){
                fetch(`index.php?action=cancel_flight&id=${flightId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('flight cancelled successfully!');
                            location.reload();
                        }
                        else{
                            alert('failed to cancel the flight: '+data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
</body>
</html>
