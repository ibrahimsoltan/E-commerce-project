<?php 
session_start();
if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $order_no = 1;
    echo "<h2>Orders History</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Product Price</th>";
    echo "<th>Product Quantity</th>";
    echo "<th>Total Product Price</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $q = mysqli_query($db, "SELECT * FROM `purchased_products` WHERE `user_id` = $user_id");
    while($row = mysqli_fetch_array($q)){
        $purchase_id = $row['purchase_id'];
        $order_no++;
        $q2 = mysqli_query($db, "SELECT * FROM `purchased_products` WHERE `purchase_id` = $purchase_id");
        while($row2 = mysqli_fetch_array($q2)){
            $product_id = $row2['product_id'];
            $q3 = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = $product_id");
            $row3 = mysqli_fetch_array($q3);
            $total_price_of_product = $row2['quantity'] * $row3['product_price'];
            echo "<tr>";
            echo "<td>" . $row3['product_name'] . "</td>";
            echo "<td>" . $row3['product_price'] . "</td>";
            echo "<td>" . $row2['quantity'] . "</td>";
            echo "<td>" . $total_price_of_product . "</td>";
            echo "</tr>";
            
        }
    }
    echo "</tbody>";
    echo "</table>";

    
}
?>