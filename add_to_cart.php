<?php
$product_id = $_GET['product_id'];
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
    $row = mysqli_fetch_array($q);
    $user_id = $_SESSION["user_id"];

    $result = mysqli_query($db,"SELECT `product_id` FROM `cart` WHERE `product_id` = '$product_id'");
    if(mysqli_num_rows($result) == 0) {
    $q = mysqli_query($db, "INSERT INTO
    `cart` (`user_id`, `product_id`, `cart_id`,`quantity`) VALUES ('$user_id', '$product_id', NULL, '1');");
    }
    else {
    $q = mysqli_query($db, "UPDATE  `cart` SET quantity = quantity + 1
    WHERE product_id= '$product_id'");
    mysqli_close($db);
    header("Location: get_cart.php");
    }
}
?>