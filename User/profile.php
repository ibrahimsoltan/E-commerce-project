<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
<!-- <link rel='stylesheet' type='text/css' href='nav_bar2.css'> -->

<style>
  
body{
            background-color:#f7f7f773
        }
    #lastchild {
    float: right;
  }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    display: inline-block;
  
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
  
  .left {
    float: left;
  }

  li{
      display: inline-block;

  }
  
  li .text {
    display: inline-block;
    color: black;
    padding: 14px 16px;
    text-decoration: none;
    
  }


  .text:hover {
    border-bottom: 3px solid black;
  }

  .active {
    border-bottom: 3px solid black;
  }

  .navbar{
    top: 0;
    left: 0;
    width: 100%;
    position: fixed;
    z-index: 1;  /* add this line */
    background-color: white;
    display: flex;
    justify-content: space-between;
  }

  section.undernav {
    padding-top:100px;
    padding-left: 100px;
    padding-right: 100px;
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
  background-color: white;
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
  grid-column: 1 / span 1;
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
  grid-column: 2 / span 1;
  grid-row: 2;
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

.imgnav{
    width: 45px;
    height: 35px;
    border-radius: 100px;
    padding-right: 5px;
    padding-top: 3px;
    margin-top: 5px;
    cursor: pointer;

}
.marketcard {
  padding: 2%;
  flex: 1 16%;
  border-radius: 10px;
  box-shadow: 0 5px 25px rgba(1 1 1 / 15%) ;
  padding: 25px;
  margin: 15px;
  flex-basis: 500px;
  max-width:250px;
  transition: 0.5s ease;
  background-color: white;
}

.marketcard:hover{
  transform: scale(1.1);
}

.marketimage img {
  max-width: 200px;
  height: 180px;
}

.allmarkets {
    display:flex;
    flex-wrap: wrap;
    width: 85%;
    padding-top:20px;
    justify-content: center;
  }

.markettitle {
  font-size: 15pt ;
    font-weight: bold;
    display: block;
}
.link{
    color:white;
    font-weight: bold;
}
.marketphone{
  float: right;
}
.marketaddress{
  float: left;
}
#componentAnchor{
  text-decoration: none;
  color: black;
}

.purchasedproductundernav {
    margin-top:30px;
    padding:30px;
    display:flex;
    flex-wrap: wrap;
    align-items:center; 
    justify-content: center;
  }


.purchasedproductgrid-container {
  display: grid;
  width: 70%;
  height: 70px;
  border-radius: 10px;
  margin-bottom: 5px;
  background-color: white;
  box-shadow: 0 5px 25px rgba(1 1 1 / 15%) ;
  align-items: center;
}

.productimage {
  grid-column: 1 / span 1;
  grid-row: 1 / span 2;
  text-align: center;
  vertical-align: middle;  
}

.purchasedproductname {
  grid-column: 2 ;
  grid-row: 1;
}

.purchasedproductquantity {
  grid-column: 3 ;
  grid-row: 1 / span 2;
}

.purchasedproducttotalprice {
  grid-column: 4 ;
  grid-row: 1 / span 2;
}

.purchasedproductimage  {
  width: 50px;
  height: 50px;
  border-radius: 10px;

}

</style>
</head>

<body>
<div >
<ul class="navbar">

            <?php
            echo '<li class="left" style="padding-left:10px;"><a href="view_products.php"><img style="width:100px; height:50px" src="../images/flightclub2.jpg"></a></li>';
            echo '<center><li><a class="text"href="view_all_markets.php">Markets</a></li>';


            if(isset($_SESSION['user_id'])){
              echo '<li ><a class="text" href="get_favorite_products.php">Favourite Products</a></li>';
              echo '<li><a class="text" href="get_cart.php">Cart</a></li></center>';


            $Session=$_SESSION["user_id"];
            $db = mysqli_connect("localhost", "root", "", "ecomm-db");
            $q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");
            while ($row=mysqli_fetch_array($q )) {
              echo "<li id='lastchild'><a class='text' href='profile.php'>Profile</a></li>";

            }
            }
            else{
                echo '<li id="lastchild"><a class="text" href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a class="text" href="sign_Up.html">Sign up</a></li>';

            }
            ?>
            </ul>
            <script>
              document.getElementById('profile').addEventListener('click', function() {
                // Navigate to the profile page
                window.location.href = 'profile.php';
              });
            </script>
</div>






        <section class='undernav'>
      
        <div class='grid-container'>
        <div class= 'title'><h1 class='undernav' style='float:left'> Profile</h1></div>
<?php

if (isset($_SESSION["user_id"]))
{ 
$Session=$_SESSION["user_id"];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");

while ($row=mysqli_fetch_array($q )) {
    echo "<div class=' image'> <img class='undernav' src='../images/".$row['user_photo']."'> </div>";

    echo "<div class='grid-item name'><span id='firstchild'><strong>Name</strong></span> <span id='lastchild'>".$row['user_name'] . "</span></div>";
    echo "<div class='grid-item email'><span id='firstchild'><strong>Email</strong></span> <span id='lastchild'>".$row['user_email'] ."</span></div> ";
    echo "<div class='grid-item password'><span id='firstchild'><strong>Password</strong></span><span id='lastchild'>".$row['user_password'] ."</span></div> ";
    echo "<div class='grid-item address'><span id='firstchild'><strong>Address</strong></span><span id='lastchild'>".$row['user_address'] ."</span></div> ";
    echo "<div class='grid-item location'><span id='firstchild'><strong>Location</strong></span><span id='lastchild'>".$row['user_location'] ."</span></div> ";
    echo "<div class='grid-item phone'><span id='firstchild'><strong>Phone Number</strong></span><span id='lastchild'>".$row['user_phone'] ."</span></div> ";
    echo "<div class='editbutton'><span id='firstchild'><button class='button'><a class='link' href='edit_profile.php'><span>Edit Profile</span></a></button></span></div> ";
    
    
    echo "</div>";
    
    echo "<button class='button logoutbutton'><a class='link' href='logout.php'><span>Logout</span></a></button>";
}

mysqli_close($db);
}
else
{
	header("Location: index.php");
}
?>
</section>










<h1 style="padding-left:100px; padding-top:20px">Liked Markets</h1>
<center>
<?php
error_reporting(0);
session_start();

$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$user_id = $_SESSION['user_id'];
$q = mysqli_query($db, "SELECT * FROM `liked_markets` WHERE `user_id` = $user_id");

echo "<section  class='allmarkets'>";
while ($row=mysqli_fetch_array($q)) {
  // echo "<a id='componentAnchor' href='market_profile.php'";
    $market_id = $row['market_id'];
    $q2 = mysqli_query($db, "SELECT * FROM `market` WHERE `market_id` = $market_id;");
    $row2 = mysqli_fetch_array($q2);
  echo "<div class='marketcard' >";
    $market_id =$row['market_id'];
    echo "<center><div class='marketimage'>
        <img src='../images/" . $row2['market_photo'] . "'>
        </div></center>";
    echo " <span class='markettitle'>". $row2['market_name'] . "</span> <span id='lastchild' class='value'>". "</span>";
    
    echo " <span class='marketphone'>". $row2['market_phone'] . "</span> <span id='lastchild' class='value'>". "</span>";
    echo " <span class='marketaddress'>". $row2['market_address'] . "</span> <span id='lastchild' class='value'>". "</span>";    
    echo "<br>";
    // echo"</a>";
//     if (isset($_SESSION["user_id"]))
// {
//     echo "<button class='button'><a href='add_to_liked_markets.php?market_id=$market_id' class='link'><span>add to liked markets </span></a></button>";
// }
// else{
//     echo "<button class='button'><a href='add_to_liked_markets.php?market_id=$market_id' class='link'><span>add to liked markets </span></a></button>";
// }
echo "</div>";
}

echo "</section>";




mysqli_close($db);

?>


</center>

<h1 style="padding-left:100px; padding-top:20px">Purchased Products</h1>
  <section class='purchasedproductundernav'>
  <?php 
session_start();
if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $order_no = 1;
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

            echo "<div class='purchasedproductgrid-container'>";
            echo "<center><div class='productimage'>
            <img class='purchasedproductimage' src='../images/" . $row3['product_photo'] . "'>
            </div></center>";
        
            echo " <span class='purchasedproductname'> <div>". $row3['product_name'] . "</div>
               <div class='value'>" .  $row3['product_price']  . "EGP</div> </span> ";
        
            echo "<div class='purchasedproductquantity'>";
            echo "<span class=quan>".$row2['quantity'] . "</span>";
            echo "</div> ";

            echo "<div class='purchasedproducttotalprice'>";
            echo "<span class='brief'>". $row['product_price']. " X " . $row2['quantity'] . "</span>";
            echo "<span > = ". $total_price_of_product . "EGP</span>";
            echo "</div>";
            echo "</div>";
            echo "<br>";


        }
    }
}
?>
  </section>


</body>

</html>