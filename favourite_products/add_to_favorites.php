<?php 
$product_id = $_GET['product_id'];
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
    $row = mysqli_fetch_array($q);
    $product_id = $row['product_id'];
    $user_id = $_SESSION["user_id"];
    ///check if the product is already in the favorite products
    $result = mysqli_query($db,"SELECT `product_id` FROM `favorite_products` WHERE `product_id` = $product_id AND `user_id` = $user_id");
    if(mysqli_num_rows($result) == 0) {
    $q = mysqli_query($db, "INSERT INTO `favorite_products` (`user_id`, `product_id`, `favorite_products_id`) VALUES ('$user_id', '$product_id', NULL);");
        if ($q) {

            mysqli_close($db);
            header("Location: ../User/product.php?product_id=$product_id");
        }
        else{
            echo "Error: " . $q . "<br>" . mysqli_error($db);
        }

    }
    else {
    //remove the product from the favorite products
        $q = mysqli_query($db, "DELETE FROM `favorite_products` WHERE `product_id` = $product_id AND `user_id` = $user_id;");
    if ($q) {
        mysqli_close($db);
        header("Location: ../User/product.php?product_id=$product_id");
    }
    else{
        echo "Error: " . $q . "<br>" . mysqli_error($db);
    }
    
    }
    
}