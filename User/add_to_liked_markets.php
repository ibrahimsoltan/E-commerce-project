<?php 
$market_id = $_GET['market_id'];
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, "SELECT * FROM `market` WHERE `market_id` = '$market_id'");
    $row = mysqli_fetch_array($q);
    $market_id = $row['market_id'];
    $user_id = $_SESSION["user_id"];
    //checkif the market is already liked
    $q = mysqli_query($db, "SELECT * FROM `liked_markets` WHERE `market_id` = '$market_id' AND `user_id` = '$user_id'");
    if(mysqli_num_rows($q) > 0){
        //if the market is already liked, delete it from the liked markets
        $q = mysqli_query($db, "DELETE FROM `liked_markets` WHERE `market_id` = '$market_id' AND `user_id` = '$user_id'");
        mysqli_close($db);
        header("Location: view_all_markets.php");
    } else {
        $q = mysqli_query($db, "INSERT INTO `liked_markets`
    (`user_id`, `market_id`, `liked_markets_id`) VALUES ('$user_id', '$market_id', NULL);");
        mysqli_close($db);
        header("Location: view_all_markets.php");
    }
}