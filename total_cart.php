<?php

require 'config.php';

$response = array();
$userID = $_GET['userID'];

$query_select_cart = mysqli_query($connection, "SELECT COUNT(*) as tot FROM cart WHERE id_user = '$userID'");

while ($row = mysqli_fetch_array($query_select_cart)) {
    # code...

    $key['total'] = $row['total'];

    array_push($response, $key);
}

echo json_encode($response);
