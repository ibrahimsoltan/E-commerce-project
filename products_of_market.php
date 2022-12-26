<?php
$market_id = $_GET['market_id'];
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["market_id"];
    echo "<h1>Market Products</h1>";
    $q = mysqli_query($db, "SELECT p.* FROM market_products fp JOIN product p ON p.product_id = fp.product_id WHERE fp.market_id =$market_id ;");
    echo "<table border = 2 width = 100% >";
    echo "<tr><th>product_name</th><th>product_price</th><th>product_brief</th>
    <th>product_description</th><th>product_photo</th>
    <th>Navigate to the product</th></tr>";
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
    echo '<p><a href="logout.php" class="bar-item button">log out</a></p>';
    mysqli_close($db);

?>