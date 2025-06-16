<?php

$host = "localhost";
$port = 3306;
$username = "myuser";
$password = "mypassword"; 
$db_name = "ecom";

// Corrected connection with port
$connection = mysqli_connect($host, $username, $password, $db_name, $port);

?>
