<?php 
$product_id = $_GET['product_id'];
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
    $row = mysqli_fetch_array($q);
    $product_id = $row['product_id'];
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "INSERT INTO `favorite_products` (`user_id`, `product_id`, `favorite_products_id`) VALUES ('$user_id', '$product_id', NULL);");
    mysqli_close($db);
    header("Location: get_favorite_products.php");
}