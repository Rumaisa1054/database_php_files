<?php

require 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the request method is POST
    $response = array(); // Initialize an array to store the response
    $id_user = $_POST['id_user']; // Get user ID from the POST request
    $id_product = $_POST['id_product']; // Get product ID from the POST request

    // Check if the product is already in the cart
    $checkCart = mysqli_query($connection, "SELECT * FROM cart WHERE id_device= '$id_user' AND id_product = '$id_product'");
    $resultCekCart = mysqli_fetch_array($checkCart);

    if ($resultCekCart) { // If the product is already in the cart
        $response['value'] = 2;
        $response['message'] = "Sorry, this product is already in the cart";
        echo json_encode($response); // Return JSON response
    } else { // If the product is not in the cart
        // Fetch product details from the database
        $checkProduct = mysqli_query($connection, "SELECT * FROM product WHERE id_product = '$id_product'");
        $fetchProduct = mysqli_fetch_array($checkProduct);
        $fetchPrice = $fetchProduct['price']; // Get product price

        // Insert the product into the cart
        $insertToCart = "INSERT INTO cart VALUES (NULL, '$id_user', '$id_product', 1, '$fetchPrice', NOW())";

        if (mysqli_query($connection, $insertToCart)) { // If insertion is successful
            $response['value'] = 1;
            $response['message'] = "Yay! Product successfully added to the cart";
            echo json_encode($response);
        } else { // If insertion fails
            $response['value'] = 0;
            $response['message'] = "Sorry, failed to add the product";
            echo json_encode($response);
        }
    }
}
