<?php
//go to profile
$_profile=$_REQUEST["Profile"];
//go to edit profile
$_EditProfile=$_REQUEST["EditProfile"];
//save changes in edit profile
$_SaveChanges=$_REQUEST["SaveChanges"];

//go to add flight 
$_AddFlight=$_REQUEST["AddFlight"];
//go to flight details
$FlightDetails=$_REQUEST["FlightDetails"];
//Cancel Flight (NOT FINISHED)
$_CancelFlight=$_REQUEST["Cancel Flight"];


if($_profile == "Profile")
    header("location: CompanyProfile.html");
elseif($_EditProfile == "Edit Profile")
    header("location: CompanyEditProfile.html");
    elseif($_AddFlight == "Add Flight")
    header("location: AddFlight.html");
    elseif($FlightDetails == "FlightDetails")
    header("location: FlightDetails.html");



?>