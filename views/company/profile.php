<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user['name'];?> - profile</title>
    
    <style>
        *{
            text-decoration: none;
        }
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

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-header h1 {
            margin: 0;
        }

        .profile-header p {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }

        .edit-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .edit-btn:hover {
            background-color: #2980b9;
        }

        .bio, .address {
            margin-top: 20px;
        }

        .bio h2, .address h2 {
            font-size: 20px;
            color: #343a40;
        }

        .bio p, .address p {
            font-size: 16px;
            color: #666;
        }

        .edit-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .edit-section input, .edit-section textarea {
            width: 97%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .edit-section button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s;
        }

        .edit-section button:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f5f5f5;
                        border: 1px solid #ddd;

        }
        table tr{
            height: 70px;
        }
        table tr:hover {
            background-color: #f1f1f1;
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

        .sidebar a.active, .sidebar a:hover {
            background-color: #3498db;
            color: #fff;
        }
        .cancel-btn {
            border-radius: 4px;
            padding: 7px;
            border: none;
            background-color: red;
            color: white;
            font-weight: bold;
        }
        .details-btn{
            margin-left: 10px;
            border-radius: 4px;
            padding: 7px;
            border: none;
            background-color: green;
            color: white;
            font-weight: bold;
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
        .tablesdiv{
          overflow: auto;
          max-height: 250px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="<?php echo $company['logo']; ?>" alt="company logo" style="height: 150px;display: grid;justify-self: center; margin-bottom:70px">
        <a href="index.php?action=companyHome">Home</a>
        <a href="index.php?action=profile" class="active">Profile</a>
        <a href="index.php?action=add_flight">Add flight</a>
    </div>

    <div class="content">
        <div class="profile-header">
            <img src="<?php echo $company['logo']; ?>" alt="Profile Picture">
            
        </div>

        <div class="bio">
            <h2>Bio</h2>
            <p><?php echo $company['bio']; ?></p>
        </div>

        <div class="address">
            <h2>Address</h2>
            <p><?php echo $company['address']; ?></p>
        </div>

        <?php

        if ($company) {
            $companyName = isset($user['name']) ? $user['name'] : 'N/A';
            $companyBio = isset($user['bio']) ? $user['bio'] : 'No bio provided';
            $companyAddress = isset($user['address']) ? $user['address'] : 'No address provided';
        }
        else {
            $companyName = 'Company data not found';
            $companyBio = 'No bio available';
            $companyAddress = 'No address available';
        }
        ?>

        <div class="edit-section">
            <h2>Edit your profile</h2>
            <form action="index.php?action=update-profile" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($companyName); ?>">

                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" rows="4"><?php echo htmlspecialchars($companyBio); ?></textarea>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($companyAddress); ?>">

                <button type="submit">Save Changes</button>
            </form>
        </div>



        <!-- flights list -->
         <h2>Your flights</h2>
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
                    <?php foreach ($flights as $flight): ?>
                    <tr>
                        <td><?php echo $flight['id']; ?></td>
                        <td><?php echo $flight['name']; ?></td>
                        <td>$<?php echo $flight['fees']; ?></td>
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
                            if ($flight['is_cancelled'] == 1) {
                                echo 'Cancelled';  
                            } elseif ($flight['is_completed'] == 1) {
                                echo 'Completed';
                            } else {
                                echo 'Ongoing';
                            }
                        ?></td>
                        <td>
                            <?php
                                if ($flight['is_cancelled'] == 1) {
                                    echo "<button class='cancel-btn' onclick='cancelFlight(". $flight['id'] .")' disabled>Cancel Flight</button>";
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
                </tbody>
            </table>
        </div>


    </div>

    <div id="itineraryModal">
        <div>
            <h2>Itinerary Timeline</h2>
            <div id="itineraryDetails" class="timeline-container"></div>
            <button onclick="closeModal()">Close</button>
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
