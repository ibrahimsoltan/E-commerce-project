<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, 'SELECT * FROM `product`');
    echo "<table border = 2 width = 100% >";
    echo "<tr><th>product_name</th><th>product_price</th><th>product_brief</th>
    <th>product_description</th><th>product_photo</th>
    <th>Navigate to the product</th></tr>";
    //add the product to naviagte to the product page
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        echo "<tr>";
        echo "<td>" . $row['product_name'];
        echo "<td>" . $row['product_price'];
        echo "<td>" . $row['product_brief'];
        echo "<td>" . $row['product_description'];
        echo "<td><img src='images/" . $row['product_photo'] . "' width='100' height='100'>";
        echo "<td><a href='product.php?product_id=$product_id'>View</a>";
    }
    echo "</table>";
    echo '<p><a href="index.php" class="bar-item button">back</a></p>';
    mysqli_close($db);
}

else {
    echo "You are not logged in";
}

?>