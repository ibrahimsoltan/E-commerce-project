<?php
error_reporting(0);
session_start();

if (isset($_SESSION["user_id"]))
{
$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, 'SELECT * FROM `market`');

echo "<table border = 2 width = 100% >";
echo "<tr><th>market_name</th><th>market_address</th><th>market_phone</th><th>market_photo</th>
<th>market_location</th></tr>";
while ($row=mysqli_fetch_array($q )) {
    $user_id =$row['market_id'];
    echo "<tr>";
    echo "<td>".$row['market_name'];
    echo "<td>".$row['market_address'];
    echo "<td>".$row['market_phone'];
    echo "<td><img src='images/".$row['market_photo']."' width='100' height='100'>";
    echo "<td>".$row['market_location'];
    echo '<td><a href="add_to_liked_markets.php" class="bar-item button">add to liked markets</a></p></td>';
}
echo "</table>";
echo '<p><a href="index.php" class="bar-item button">back</a></p>';
mysqli_close($db);
}
else
{
    echo "You are not logged in";
    echo "<p><a href='login.html'>Login</a></p>";
}
?>