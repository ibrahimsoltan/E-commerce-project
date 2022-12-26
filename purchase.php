<?php 
//get products from cart table 
session_start();
if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");

}