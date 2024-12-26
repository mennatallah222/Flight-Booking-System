<?php
$_type=$_REQUEST["type"];
$_final=$_REQUEST["finalReg"];

if($_type == "Passenger")
    header("location: PassengerReg.html");
    else if($_type == "Company")
        header("location: CompanyReg.html");
        else if(isset($_final) )
            header("location: ../Login/Login.html");



?>