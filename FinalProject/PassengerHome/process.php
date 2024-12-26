<?php
//go to profile
$_profile=$_REQUEST["Profile"];
//Search for a flight to add
$_AddFlight=$_REQUEST["AddFlight"];
//go to flight details
$FlightDetails=$_REQUEST["FlightDetails"];
//go to edit profile
$_EditProfile=$_REQUEST["EditProfile"];
//The search button in the flight search page
$_Search=$_REQUEST["Search"];
//save changes in edit profile
$_SaveChanges=$_REQUEST["SaveChanges"];

//User Pressed to take the flight
$_TakeFlight=$_REQUEST["TakeFlight"];
//User Pressed to send message
$_SendMessage=$_REQUEST["SendMessage"];



if($_profile == "Profile")
    header("location: PassengerProfile.html");
    elseif(isset($_AddFlight))
    header("location: FlightSearch.html");
    elseif($FlightDetails == "FlightDetails")
    header("location: FlightDetails.html");
    elseif($_EditProfile == "Edit Profile")
    header("location: EditProfile.html");


?>