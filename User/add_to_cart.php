<?php
$product_id = $_GET['product_id'];
session_start();

if (isset($_SESSION["user_id"]))
{
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
    $row = mysqli_fetch_array($q);
    $user_id = $_SESSION["user_id"];
    $result = mysqli_query($db,"SELECT `product_id` FROM `cart` WHERE `product_id` = $product_id AND `user_id` = $user_id");
    if(mysqli_num_rows($result) == 0) {
    $q = mysqli_query($db, "INSERT INTO `cart` (`user_id`, `product_id`, `cart_id`,`quantity`) VALUES ($user_id, $product_id, NULL, 1);");
        if ($q) {

            mysqli_close($db);
            header("Location: product.php?product_id=$product_id");
        }
        else{
            echo "Error: " . $q . "<br>" . mysqli_error($db);
        }

    }
    else {
    //remove the product from the cart
        $q = mysqli_query($db, "DELETE FROM `cart` WHERE `product_id` = $product_id AND `user_id` = $user_id;");

    if ($q) {
        mysqli_close($db);
        header("Location: product.php?product_id=$product_id");
    }
    else{
        echo "Error: " . $q . "<br>" . mysqli_error($db);
    }
   
    }
}
?>