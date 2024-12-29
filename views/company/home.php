<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['name']?> - home</title>
    
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f9f9f9;
            color: #333;
        }

        table td {
            color: #555;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .itinerary-info {
            display: flex;
            justify-content: space-between;
        }

        .itinerary-info-city {
            font-weight: 600;
            color: #333;
        }

        .itinerary-info span {
            color: #777;
        }

        .cancel-btn {
            padding: 8px 15px;
            background-color: #e74c3c;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            border: none;
        }

        .cancel-btn:hover {
            background-color: #c0392b;
        }
        .cancel-btn-disabled{
            padding: 8px 15px;
            background-color:rgb(183, 183, 183);
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor:not-allowed;
            transition: background-color 0.3s;
            border: none;
        }
        .details-btn {
            padding: 8px 15px;
            background-color: #2ecc71;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            border: none;
        }

        .details-btn:hover {
            background-color: #27ae60;
        }

        .tablesdiv {
            overflow: auto;
            max-height: 350px;
        }
        .itineraries-td:hover {
            cursor: pointer;
        }

        .timeline-container {
            position: relative;
            margin: 20px 0;
            padding-left: 20px;
            border-left: 3px solid #007bff;
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
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
        .tablesdiv{
          overflow: auto;
          max-height: 250px;
        }
        #itineraryModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
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
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .timeline-item {
            padding: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .timeline-header {
            font-weight: bold;
        }

        .timeline-body {
            margin-top: 5px;
            color: #555;
        }

        .close-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #d32f2f;
        }
        *{
            text-decoration: none;
        }
        .container{
            width: 100%;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="sidebar">
            <img src="<?php echo $company['logo']; ?>" alt="company logo">
            <a href="index.php?action=companyHome" class="active">Home</a>
            <a href="index.php?action=profile">Profile</a>
            <a href="index.php?action=add_flight">Add Flight</a>
        </div>

        <div class="content">
            <div class="dashboard-header">
                <h1>Welcome, <?php echo $user['name']; ?></h1>
            </div>

            <div class="stats-cards">
                <div class="card">
                    <h3>Total Flights</h3>
                    <p><?php echo count($flights); ?></p>
                </div>
                <div class="card">
                    <h3>Total Passengers</h3>
                    <p><?php echo isset($totalPassengers) ? $totalPassengers : '0'; ?></p>
                </div>
                <div class="card">
                    <h3>Cancelled Flights</h3>
                    <p><?php 
                        $cancelledCount=0;
                        foreach ($flights as $flight) {
                            if ($flight['is_cancelled'] == 1) {
                                $cancelledCount++;
                            }
                        }
                        echo $cancelledCount;
                    ?></p>
                </div>
            </div>

            <h2 style="margin-top: 20px;">Flights</h2>
            <div class="tablesdiv">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Fees</th>
                            <th>Itineraries</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($flights) && is_array($flights) && count($flights) > 0): ?> 
                            <?php foreach ($flights as $flight): ?>
                                <tr>
                                    <td><?php echo $flight['flight_uid']; ?></td>
                                    <td><?php echo $flight['name']; ?></td>
                                    <td>$<?php echo $flight['fees']; ?></td>
                                    <td class="itineraries-td" onclick='showItineraryDetails(<?php echo json_encode(Flight::getItinerariesByFlightID($flight['id'])); ?>)'>
                                        <?php
                                            $itineraries = Flight::getItinerariesByFlightID($flight['id']);
                                            if (count($itineraries) > 0) {
                                                $firstItinerary = reset($itineraries);
                                                $lastItinerary = end($itineraries);

                                                $departureTime = new DateTime($firstItinerary['departure_time']);
                                                $arrivalTime = new DateTime($lastItinerary['arrival_time']);
                                                $interval = $departureTime->diff($arrivalTime);
                                                $totalFlightTime = $interval->format('%a days %h hours %i minutes');
                                            }
                                        ?>
                                        <div class="itinerary-info">
                                            <span><?php echo isset($firstItinerary) ? substr($firstItinerary['departure_time'], 11, 5) : '-'; ?></span>
                                            <?php if (isset($totalFlightTime)): ?>
                                                <span><?php echo $totalFlightTime; ?></span>
                                            <?php endif; ?>
                                            <span><?php echo isset($lastItinerary) ? substr($lastItinerary['arrival_time'], 11, 5) : '-'; ?></span>
                                        </div>
                                        <div class="itinerary-info">
                                            <span class="itinerary-info-city"><?php echo isset($firstItinerary) ? $firstItinerary['from_city'] : '-'; ?></span>
                                            <div class="separating-line-div">
                                                <span>✈︎</span>
                                                <span class="separating-line"></span>
                                            </div>
                                            <span class="itinerary-info-city"><?php echo isset($lastItinerary) ? $lastItinerary['to_city'] : '-'; ?></span>
                                        </div>
                                    </td>
                                    <td><?php 
                                        if ($flight['is_cancelled'] == 1) {
                                            echo 'Cancelled';  
                                        }
                                        elseif ($flight['is_completed'] == 1) {
                                            echo 'Completed';
                                        }
                                        else {
                                            echo 'Ongoing';
                                        }
                                    ?></td>
                                    <td>
                                        <?php
                                            if ($flight['is_cancelled'] == 1) {
                                                echo "<button class='cancel-btn-disabled' disabled>cancelled</button>";
                                            }
                                            else {
                                                echo "<button class='cancel-btn' style='cursor: pointer;' onclick='cancelFlight(". $flight['id'] .")'>Cancel Flight</button>";
                                            }
                                            echo "<a href='index.php?action=flight_details&id=" . $flight['id'] . "'>
                                                    <button class='details-btn' style='cursor: pointer;'>View details</button>
                                                </a>";
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?> 
                            <tr> 
                                <td colspan="6">You haven't added any flights</td> 
                            </tr> 
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div id="itineraryModal">
                <div class="modal-content">
                    <h2>Itineraries schedule</h2>
                    <div id="itineraryDetails" class="timeline-container"></div>
                    <button class="close-btn" onclick="closeModal()">Close</button>
                </div>
            </div>


            <h2>Messages</h2>
            <div class="tablesdiv">
                <table>
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($messages) && is_array($messages)): ?> 
                            <?php foreach ($messages as $message): ?> 
                                <tr> 
                                    <td><?php echo $message['sender']; ?></td> 
                                    <td><?php echo $message['message']; ?></td> 
                                    <td><?php echo $message['date']; ?></td> 
                                </tr> <?php endforeach; ?>
                                <?php else: ?> 
                                    <tr> 
                                        <td colspan="3">No messages yet</td> 
                                    </tr> 
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    <script>
        function showItineraryDetails(itineraries) {
            const itineraryContainer = document.getElementById('itineraryDetails');
            itineraryContainer.innerHTML = '';
            itineraries.forEach(function(itinerary) {
                const timelineItem = document.createElement('div');
                timelineItem.classList.add('timeline-item');
                
                const city = document.createElement('div');
                city.classList.add('timeline-city');
                city.textContent = itinerary.from_city + ' to ' + itinerary.to_city;

                const time = document.createElement('div');
                time.classList.add('timeline-time');
                time.textContent = 'Departure: ' + itinerary.departure_time + ' | Arrival: ' + itinerary.arrival_time;

                timelineItem.appendChild(city);
                timelineItem.appendChild(time);
                itineraryContainer.appendChild(timelineItem);
            });

            document.getElementById('itineraryModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('itineraryModal').style.display = 'none';
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