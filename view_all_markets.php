<?php
error_reporting(0);
session_start();


$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, 'SELECT * FROM `market`');

echo "<table border = 2 width = 100% >";
echo "<tr><th>market_name</th><th>market_address</th><th>market_phone</th><th>market_photo</th>
<th>market_location</th></tr>";
while ($row=mysqli_fetch_array($q)) {
    $market_id =$row['market_id'];
    echo "<tr>";
    echo "<td>".$row['market_name'];
    echo "<td>".$row['market_address'];
    echo "<td>".$row['market_phone'];
    echo "<td><img src='images/".$row['market_photo']."' width='100' height='100'>";
    echo "<td>".$row['market_location'];
    if (isset($_SESSION["user_id"]))
{
    echo "<td><a href='add_to_liked_markets.php?market_id=$market_id' class='bar-item button'>add to liked markets</a></p></td>";
}
else{
    echo "<td><a href='login.html' class='bar-item button'>login to add to liked markets</a></p></td>";
}


}
mysqli_close($db);
echo "</table>";
echo '<p><a href="index.php" class="bar-item button">back</a></p>';

?>