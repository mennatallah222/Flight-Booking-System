<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f5f5f5;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
        .itiernaray-info{
            display: flex;
            justify-content: space-between;
            margin: 0 20px;
        }
        .itiernaray-info-city{
            font-weight: bold;
        }
        .separating-line-div{
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
        #itineraryModal{
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        #itineraryModal > div{
            background: white;
            margin: 10% auto;
            padding: 20px;
            width: 50%;
            position: relative;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar a.active, .sidebar a:hover{
            background-color: #007bff;
            color: #fff;
        }
        .cancel-btn {
            border-radius: 4px;
            padding: 7px;
            border: none;
            background-color: red;
        }
        .itineraries-td:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="index.php?action=companyHome" class="active">Overview</a>
        <a href="profile.php">Profile</a>
        <a href="messages.php">Messages</a>
        <a href="index.php?action=add_flight">Add flight</a>

    </div>

    <div class="content">
        <div class="dashboard-header">
            <h1>Welcome, <?php echo $user['name']; ?></h1>
            <img src="<?php echo $company['logo']; ?>" alt="Company Logo" style="height: 50px;">
        </div>

        <div class="stats-cards">
            <div class="card">
                <h3>total flights</h3>
                <p><?php echo count($flights); ?></p>
            </div>
            <div class="card">
                <h3>total passengers</h3>
                <p><?php echo $totalPassengers; ?></p>
            </div>
            <div class="card">
                <h3>cancelled flights</h3>
                <p><?php 
                    $cancelledCount=0;
                    foreach ($flights as $flight){
                        if ($flight['is_cancelled']==1){
                            $cancelledCount++;
                        }
                    }
                    echo $cancelledCount;
                ?></p>
            </div>

        </div>

        <h2>Recent flights</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Fees</th>
                    <th>Passengers</th>
                    <th>itineraries</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flights as $flight): ?>
                <tr>
                    <td><?php echo $flight['id']; ?></td>
                    <td><?php echo $flight['name']; ?></td>
                    <td>$<?php echo $flight['fees']; ?></td>
                    <td><?php echo $flight['registered_passengers']; ?></td>
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

                    <td><?php 
                            if($flight['is_cancelled']==1){
                              echo 'cancelled';  
                            }
                            elseif($flight['is_completed']==1){
                                echo 'completed';
                            }
                            else{
                                echo 'ongoing';
                            }
                        ?></td>
                    <td>
                        <?php
                            if($flight['is_cancelled']==1){
                                echo "<button class='cancel-btn' onclick='cancelFlight(". $flight['id'].")' disabled>Cancel Flight</button>";

                            }
                            else{
                                echo "<button class='cancel-btn' style='cursor: pointer;' onclick='cancelFlight(". $flight['id'].")'>Cancel Flight</button>";

                            }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>


    <div id="itineraryModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
        <div style="background: white; margin: 10% auto; padding: 20px; width: 50%; position: relative;">
            <h2>Itinerary details</h2>
            <div id="itineraryDetails"></div>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        function showItineraryDetails(itineraries) {
            const modal = document.getElementById('itineraryModal');
            const detailsContainer = document.getElementById('itineraryDetails');
            detailsContainer.innerHTML = '';
            itineraries.forEach(itinerary => {
                const div = document.createElement('div');
                div.innerHTML = `
                    <strong>${itinerary.city}</strong>: 
                    Arrival at ${itinerary.arrival_time}, 
                    Departure at ${itinerary.departure_time}
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