<!DOCTYPE html>
<html>
<head>
    <title>Company profile</title>
</head>
<body>
    <h1>Profile</h1>
    <img src="<?php echo $company['logo']; ?>" alt="Company Logo" />
    <p>Name: <?php echo $company['name']; ?></p>
    <p>Bio: <?php echo $company['bio']; ?></p>
    <p>Address: <?php echo $company['address']; ?></p>
    <h2>Flights</h2>
    <ul>
        <?php foreach ($flights as $flight): ?>
            <li><?php echo $flight['name']; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=editProfile">Edit profile</a>
</body>
</html>
