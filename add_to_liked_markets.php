<?php 
$product_id = $_GET['product_id'];
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, "SELECT * FROM `market` WHERE `market_id` = '$market_id'");
    $row = mysqli_fetch_array($q);
    $market_id = $row['market_id'];
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db,"INSERT INTO `liked_markets`
    (`user_id`, `market_id`, `liked_markets_id`) VALUES ('$user_id', '$market_id', NULL);");
    mysqli_close($db);
    header("Location: get_liked_markets.php");
}