<?php
$product_id = $_GET['product_id'];
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "SELECT * FROM `cart` WHERE `product_id` = $product_id AND `user_id` = $user_id");
    $row = mysqli_fetch_array($q);
    $user_id = $_SESSION["user_id"];
        //update quantity
        $q = mysqli_query($db, "UPDATE  `cart` SET quantity = quantity + 1
        WHERE product_id= $product_id AND user_id = $user_id");
        if ($q) {
            mysqli_close($db);
            header("Location: get_cart.php");
        } else {
            echo "Error: " . $q . "<br>" . mysqli_error($db);
        }
    
}