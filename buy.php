<?php 
//get products from cart table 
session_start();
if (isset($_SESSION["user_id"])) {
    $count = 0;
    $total = 0;
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "SELECT * FROM `cart` WHERE `user_id` = $user_id");
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        $count++;
        $q2 = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
        $row2 = mysqli_fetch_array($q2);
        $market_id = mysqli_query($db, "SELECT * FROM `market` WHERE `market_id` = '$market_id'");
        $product_name = $row2['product_name'];
        $product_price = $row2['product_price'];
        $product_image = $row2['product_image'];
        $product_quantity = $row['quantity'];
        $product_total = $product_price * $product_quantity;
        $total += $product_total;
    }
}
?>