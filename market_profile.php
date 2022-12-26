<?php
session_start(); 

if (isset($_SESSION["market_id"]))
{ 
$Session=$_SESSION["market_id"];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `market` WHERE market_id= '$Session'");

echo "<table border = 2 width = 100% >";
echo "<tr><th>market_email</th><th>market_password</th><th>market_name</th>
<th>market_address</th><th>market_location</th><th>market_phone</th><th>market_balance</th><th>market_balance_no</th><th>market_photo</th>

</tr>";
while ($row=mysqli_fetch_array($q )) {
    $user_id =$row['market_id'];
    echo "<tr>";
    echo "<td>".$row['market_email'];
    echo "<td>".$row['market_password'];
    echo "<td>".$row['market_name'];
    echo "<td>".$row['market_address'];
    echo "<td>".$row['market_location'];
    echo "<td>".$row['market_phone'];
    echo "<td>".$row['market_balance'];
    echo "<td>".$row['market_balance_no'];
    echo "<td><img src='images/".$row['market_photo']."' width='100' height='100'>";
}
echo "</table>";

    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["market_id"];
    echo "<h1>Market Products</h1>";
    $q = mysqli_query($db, "SELECT p.* FROM market_products fp JOIN product p ON p.product_id = fp.product_id WHERE fp.market_id =$user_id ;");
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

echo '<p><a href="edit_profile.php">edit</a></p>';
echo '<p><a href="view_all_users.php" class="bar-item button">view all users</a></p>';
echo '<p><a href="view_products.php" class="bar-item button">view products</a></p>';
echo '<p><a href="get_favorite_products.php" class="bar-item button">view fav products</a></p>';
mysqli_close($db);
}
else
{
    echo "You are not logged in";
}
?>