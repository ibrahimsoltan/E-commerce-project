<?php 

session_start();
if (isset($_SESSION["user_id"])) {
    $count = 0;
    
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "SELECT * FROM `cart` WHERE `user_id` = $user_id");
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        $count++;
        
        $q2 = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
        $row2 = mysqli_fetch_array($q2);
        $product_name = $row2['product_name'];
        $product_price = $row2['product_price'];
        $product_image = $row2['product_image'];
        $product_count  = $row2['product_count'];
        $product_quantity = $row['quantity'];
        $product_total = $product_price * $product_quantity;
        //get the market of the product using the product_id from market_products table
        $q3 = mysqli_query($db, "SELECT * FROM `market_products` WHERE `product_id` = $product_id");
        $row3 = mysqli_fetch_array($q3);
        $market_id = $row3['market_id'];
        $market_id_q = mysqli_query($db, "SELECT * FROM `market` WHERE `market_id` = '$market_id'");
        $market_id_row = mysqli_fetch_array($market_id_q);
        $market_balance = $market_id_row['market_balance'];
        //update market balance after buying product
        $market_balance = $market_balance + $product_total;
        $q4 = mysqli_query($db, "UPDATE `market` SET `market_balance` = '$market_balance' WHERE `market_id` = '$market_id'");
        //update product count after buying product
        $product_count = $product_count - $product_quantity;
        $q5 = mysqli_query($db, "UPDATE `product` SET `product_count` = '$product_count' WHERE `product_id` = '$product_id'");
        //delete from cart
    $cart_id = $row['cart_id'];
    $q6 = mysqli_query($db, "DELETE FROM `cart` WHERE `cart`.`cart_id` = '$cart_id'");   
        $q7 = mysqli_query($db, "INSERT INTO `purchased_products` (`product_id`, `quantity`, `user_id`, `purchase_id`, `total_price`) VALUES ($product_id, $product_quantity, $user_id, NULL, $product_total);");
}
    
    if ($q6) {
        mysqli_close($db);
        header("Location: User/profile.php");
    } else {
        echo "Error: " . $q6 . "<br>" . mysqli_error($db);
    }
}
?>