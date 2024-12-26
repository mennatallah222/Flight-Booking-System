<?php
//go to profile
$_profile=$_REQUEST["Profile"];
//Search for a flight to add
$_AddFlight=$_REQUEST["AddFlight"];
//go to flight details
$FlightDetails=$_REQUEST["FlightDetails"];
//go to edit profile
$_EditProfile=$_REQUEST["EditProfile"];



if($_profile == "Profile")
    header("location: PassengerProfile.html");
    elseif(isset($_AddFlight))
    header("location: FlightSearch.html");
    elseif($FlightDetails == "FlightDetails")
    header("location: FlightDetails.html");
    elseif($_EditProfile == "Edit Profile")
    header("location: EditProfile.html");


?>