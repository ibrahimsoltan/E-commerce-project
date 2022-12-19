<?php
$product_id = $_GET['product_id'];
session_start();
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `product` WHERE product_id = $product_id");
echo "<table border = 2 width = 100% >";
echo "<tr><th>product_name</th><th>product_price</th><th>product_brief</th>
<th>product_description</th><th>product_photo</th><th>Add to favorites</th></tr>";
while ($row = mysqli_fetch_array($q)) {
    $product_id = $row['product_id'];
    echo "<tr>";
    echo "<td>" . $row['product_name'];
    echo "<td>" . $row['product_price'];
    echo "<td>" . $row['product_brief'];
    echo "<td>" . $row['product_description'];
    echo "<td><img src='images/" . $row['product_photo'] . "' width='100' height='100'>";
    if (isset($_SESSION["user_id"])) {
        echo "<td><a href='add_to_favorites.php?product_id=$product_id'>Add to favorites</a>";

    } else {
        echo "<td><a href='login.php'>Login to add to favorites</a>";
    }    
}
echo "</table>";
echo '<p><a href="index.php" class="bar-item button">back</a></p>';
mysqli_close($db);
?>

