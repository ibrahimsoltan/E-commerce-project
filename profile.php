<<<<<<< Updated upstream
=======
<!DOCTYPE html>
<html>
<head>
<!-- <link rel='stylesheet' type='text/css' href='nav_bar2.css'> -->

<style>
    body{
        background-color: #dae0e573;
        }
    #lastchild {
    float: right;
  }

  #firstchild {
    float: left;
  }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;

  }

  .title{

    font-size: 15pt ;
    font-weight: bold;
  }

  .value{
    padding-top: 5px;
    font: 10pt sans-serif;
    color: gray;
  }
  
  li {
    float: left;
    
  }
  
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    
  }
  
  li a:hover {
    background-color: #111;
  }

  .active {
    background: linear-gradient(to bottom right,#2627a8cf, rgb(179 232 251));
  }

  .navbar{
    top: 0;
    width: 98.5%;
    position: fixed;
    
  }

  section.undernav {
    padding:100px;
    margin-top:30px;
    width: 85%;    
  }



  img.undernav{
    width: 60px;
    height: 60px;
    border-radius: 25px;
    float: right;

}

  

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #0474aa;
  border: none;
  color: white;
  text-align: center;
  font-size: 15;
  padding: 10px;
  width: 150;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  background: linear-gradient(to bottom right,#2627a8cf, rgb(179 232 251));

}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.link{
    color:white;
    font-weight: bold;
}


.grid-container {
  display: grid;
  width: 100%;
  gap: 2px;
}

.grid-item {
  background-color: #f9f9f9;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
}

.title {
  grid-column: 1 / span 1;
  grid-row: 1;
}

.image {
  grid-column: 2 / span 1;
  grid-row: 1;
}

.name {
  grid-column: 1 / span 2;
  grid-row: 2;
}

.email {
  grid-column: 1 / span 1;
  grid-row: 3;
}

.password {
  grid-column: 2 / span 1;
  grid-row: 3;
}

.address {
  grid-column: 1 / span 1;
  grid-row: 4;
}
.location {
  grid-column: 2 / span 1;
  grid-row: 4;
}
.phone {
  grid-column: 1 / span 2;
  grid-row: 5;
}

.editbutton{
    grid-column: 1 / span 1;
    grid-row: 6;
}

.productsbutton{
    grid-column: 2 / span 1;
    grid-row: 6;
}

.logoutbutton{
    position:fixed;
    bottom: 0;
}




</style>
</head>

<body>
<div >
<ul class="navbar">
            <li><a href="view_products.php">Home</a></li>
            <?php
            session_start();

            if(isset($_SESSION['user_id'])){
            echo '<li><a href="get_favorite_products.php">Favourite Products</a></li>';
            echo '<li><a href="get_cart.php">Cart</a></li>';
            echo '<li><a href="view_all_markets.php">view markets</a></li>';
            echo '<li id="lastchild"><a class="active" href="profile.php">Profile</a></li>';
            }
            else{
                echo '<li id="lastchild"><a href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a href="sign_Up.html">Sign up</a></li>';

            }
            ?>
            </ul>
</div>
        <section class='undernav'>
        <center>

        <div class='grid-container'>
        <div class= 'title'><h1 class='undernav' style='float:left'> Profile</h1></div>
>>>>>>> Stashed changes
<?php
session_start(); 

if (isset($_SESSION["user_id"]))
{ 
$Session=$_SESSION["user_id"];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");

echo "<table border = 2 width = 100% >";
echo "<tr><th>user_email</th><th>user_password</th><th>user_name</th>
<th>user_address</th><th>user_location</th><th>user_phone</th><th>user_photo</th>
</tr>";
while ($row=mysqli_fetch_array($q )) {
<<<<<<< Updated upstream
    $user_id =$row['user_id'];
    echo "<tr>";
    echo "<td>".$row['user_email'];
    echo "<td>".$row['user_password'];
    echo "<td>".$row['user_name'];
    echo "<td>".$row['user_address'];
    echo "<td>".$row['user_location'];
    echo "<td>".$row['user_phone'];
    echo "<td><img src='images/".$row['user_photo']."' width='100' height='100'>";
}
echo "</table>";
echo '<p><a href="edit_profile.php">edit</a></p>';
echo '<p><a href="view_all_users.php" class="bar-item button">view all users</a></p>';
echo '<p><a href="view_products.php" class="bar-item button">view products</a></p>';
echo '<p><a href="get_favorite_products.php" class="bar-item button">view fav products</a></p>';
=======
    echo "<div class=' image'> <img class='undernav' src='images/".$row['user_photo']."'> </div>";

    echo "<div class='grid-item name'><span id='firstchild'><strong>Name</strong></span> <span id='lastchild'>".$row['user_name'] . "</span></div>";
    echo "<div class='grid-item email'><span id='firstchild'><strong>Email</strong></span> <span id='lastchild'>".$row['user_email'] ."</span></div> ";
    echo "<div class='grid-item password'><span id='firstchild'><strong>Password</strong></span><span id='lastchild'>".$row['user_password'] ."</span></div> ";
    echo "<div class='grid-item address'><span id='firstchild'><strong>Address</strong></span><span id='lastchild'>".$row['user_address'] ."</span></div> ";
    echo "<div class='grid-item location'><span id='firstchild'><strong>Location</strong></span><span id='lastchild'>".$row['user_location'] ."</span></div> ";
    echo "<div class='grid-item phone'><span id='firstchild'><strong>Phone Number</strong></span><span id='lastchild'>".$row['user_phone'] ."</span></div> ";
    echo "<div class='editbutton'><span id='firstchild'><button class='button'><a class='link' href='edit_profile.php'><span>Edit Profile</span></a></button></span></div> ";
    echo "<div class='productsbutton'><span id='lastchild'><button class='button'><a class='link' href='view_products.php'><span>Products</span></a></button>
    <button class='button'><a class='link' href='get_favorite_products.php'><span>Favourite Products</span></a></button></span></div> ";

    //cart position bayez randomly placed for testing <center>
    echo "<center><div class='productsbutton'><span id='lastchild'>
    <button class='button'><a class='link' href='get_cart.php'><span>cart</span></a></button></span></div></center>";


    
    echo "</div>";
    echo "</center>";
    
    echo "<button class='button logoutbutton'><a class='link' href='logout.php'><span>Logout</span></a></button>";
}



>>>>>>> Stashed changes
mysqli_close($db);
}
else
{
	header("Location: index.php");
}
?>