<?php

$host = "database-fyp.cr4e86o88i1g.eu-north-1.rds.amazonaws.com";
$port = 3306;
$username = "root";
$password = "0XA4MpW6LQo8kEvqKCyH"; 
$db_name = "database-fyp";

// Corrected connection with port
$connection = mysqli_connect($host, $username, $password, $db_name, $port);

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    echo "Connected Successfully!";
}
?>
