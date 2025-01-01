<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $flight['name']; ?> - flight details</title>
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
            position: relative;
        }
        .container{
            width: 100%;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 5px 0px rgba(0, 0, 0, 0.1);
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
        .cancel-btn:hover {
            background-color: #c0392b;
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

        .itineraries-td:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">    
        <div class="sidebar">
            <img src="<?php echo $company['logo']; ?>" alt="company logo">
            <h2>Dashboard</h2>
            <a href="index.php?action=companyHome">Home</a>
            <a href="index.php?action=profile">Profile</a>
            <a href="index.php?action=add_flight">Add Flight</a>
        </div>

        <div class="content">

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
            <div class="flight-info">
                <h2>Flight info</h2>
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
                            <td><?php echo $flight['flight_uid']; ?></td>
                            <td><?php echo $flight['name']; ?></td>
                            <td class="itineraries-td" onclick='showItineraryDetails(<?php echo json_encode(Flight::getItinerariesByFlightID($flight['id'])); ?>)'>
                                
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
                            <td><?php echo ($flight['is_cancelled'] ? 'Cancelled' : 'Ongoing'); ?></td>
                            <td>
                                <?php if (!$flight['is_cancelled']): ?>
                                    <button class="cancel-btn" onclick="cancelFlight(<?php echo $flight['id']; ?>)">Cancel flight</button>
                                <?php else: ?>
                                    <button class="cancel-btn-disabled" disabled>cancelled</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="margin: 20px 0; display:flex; justify-self:center;background-color:#e5f8ff; background-image:url(../../views/public/assets/imgs/Map.svg); width: 100%;justify-content: space-evenly;background-repeat: no-repeat;background-size: cover;align-items:center; height: 200px;">
                <span class="itinerary-info-city"><?php echo isset($lastItinerary) ? $lastItinerary['to_city'] : 'not available'; ?></span>
                <span class="itinerary-info-city"><?php echo isset($firstItinerary) ? $firstItinerary['from_city'] : 'not available'; ?></span>
                <!-- <img src="../../views/public/assets/imgs/Map.svg"/> -->
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
                <div class="modal-content">
                    <h2>Itineraries schedule</h2>
                    <div id="itineraryDetails" class="timeline-container"></div>
                    <button class="close-btn" onclick="closeModal()">Close</button>
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
