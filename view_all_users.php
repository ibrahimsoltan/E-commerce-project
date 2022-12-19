<?php
error_reporting(0);
session_start();

if (isset($_SESSION["user_id"]))
{
$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, 'SELECT * FROM `user`');

echo "<table border = 2 width = 100% >";
echo "<tr><th>user_email</th><th>user_password</th><th>user_name</th>
<th>user_address</th><th>user_location</th><th>user_phone</th><th>user_photo</th></tr>";
while ($row=mysqli_fetch_array($q )) {
    $user_id =$row['user_id'];
    echo "<tr>";
    echo "<td>".$row['user_email'];
    echo "<td>".$row['user_password'];
    echo "<td>".$row['user_name'];
    echo "<td>".$row['user_address'];
    echo "<td>".$row['user_location'];
    echo "<td>".$row['user_phone'];
    echo "<td><img src='images/".$row['user_photo']."' width='100' height='100'>";}
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