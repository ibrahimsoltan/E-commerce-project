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

  .producttitle{

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
    left: 0;
    width: 100%;
    position: fixed;
    align-items: center;
    justify-content: center;
    z-index: 1;  /* add this line */
    
  }

  section.undernav {
    padding-top:70px;
    padding-left: 100px;
    padding-right: 100px;
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

h2{
    font-size: 20pt;
    font-weight: bold;
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
  grid-column: 1 / span 1;
  grid-row: 2;
}

.phone {
  grid-column: 2 / span 1;
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

.balanceno {
  grid-column: 1 / span 1;
  grid-row: 5;
}
.balance {
  grid-column: 2 / span 1;
  grid-row: 5;
}


.editbutton{
    grid-column: 1 / span 1;
    grid-row: 6;
}

.addproductbutton{
    padding-bottom: 30px;
}

.logoutbutton{
    position:fixed;
    bottom: 0;
    left:0;
}

.backtohomebutton{
    position:fixed;
    bottom: 0;
    right:0;
}


.marketproduct {
  padding: 2%;
  flex: 1 16%;
  border-radius: 10px;
  box-shadow: 0 5px 25px rgba(1 1 1 / 15%) ;
  padding: 25px;
  margin: 15px;
  flex-basis: 500px;
  max-width:250px;
  transition: 0.5s ease;
  background-color: #f9f9f9;
}

.marketproduct:hover{
  transform: scale(1.1);
}

.marketproductimage img {
  max-width: 100%;
}

.likedmarkets {
    display: grid;
    grid-template-columns: repeat(4, 300px);
    width: 1170px;
    padding-top:20px;
    padding-left: 100px;
    justify-content: center;
  }


.brief{
    font-size: 8pt;
    color: #505050;
}


</style>
</head>

<body>


<section class='undernav'>
      
      <div class='grid-container'>
      <h2 style='float:left' class='title'> Profile</h2>
<?php
session_start(); 

if (isset($_SESSION["market_id"]))
{ 
$Session=$_SESSION["market_id"];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `market` WHERE market_id= '$Session'");

while ($row=mysqli_fetch_array($q)) {
    $user_id =$row['market_id'];

    echo "<div class=' image'> <img class='undernav' src='../images/".$row['market_photo']."'> </div>";

    echo "<div class='grid-item name'><span id='firstchild'><strong>Name</strong></span> <span id='lastchild'>".$row['market_name'] . "</span></div>";
    echo "<div class='grid-item email'><span id='firstchild'><strong>Email</strong></span> <span id='lastchild'>".$row['market_email'] ."</span></div> ";
    echo "<div class='grid-item password'><span id='firstchild'><strong>Password</strong></span><span id='lastchild'>".$row['market_password'] ."</span></div> ";
    echo "<div class='grid-item address'><span id='firstchild'><strong>Address</strong></span><span id='lastchild'>".$row['market_address'] ."</span></div> ";
    echo "<div class='grid-item location'><span id='firstchild'><strong>Location</strong></span><span id='lastchild'>".$row['market_location'] ."</span></div> ";
    echo "<div class='grid-item phone'><span id='firstchild'><strong>Phone Number</strong></span><span id='lastchild'>".$row['market_phone'] ."</span></div> ";
    echo "<div class='grid-item balanceno'><span id='firstchild'><strong>Balance Number</strong></span><span id='lastchild'>".$row['market_balance_no'] ."</span></div> ";
    echo "<div class='grid-item balance'><span id='firstchild'><strong>Balance</strong></span><span id='lastchild'>".$row['market_balance'] ."</span></div> ";
    echo "<div class='editbutton'><span id='firstchild'><button class='button'><a class='link' href='edit_market_profile.php'><span>Edit Profile</span></a></button></span></div> ";
}
echo "</section>";

echo '<h2 style="padding-left:100px; padding-top:20px">Market Products</h2>';


echo "<section class='likedmarkets'>";

    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["market_id"];
    $q = mysqli_query($db, "SELECT p.* FROM market_products fp JOIN product p ON p.product_id = fp.product_id WHERE fp.market_id =$user_id ;");
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        echo "<div class='marketproduct'>";
        echo "<center><div class='marketproductimage'>
        <img src='../images/" . $row['product_photo'] . "'>
        </div></center>";
        echo "<div class='productinfo'>";
        echo " <span class='producttitle'>". $row['product_name'] . "</span> <span id='lastchild' class='value'>".  $row['product_price']  . "EGP</span></h5>";
        echo "<center><p class='brief'>" . $row['product_brief'] . "</p></center>";
        echo "<center><p class='brief'>" . $row['product_description'] . "</p></center>";

        echo "</div>";
        echo "</div>";
       
    }
        
        echo "</section>";
        echo "<div class='addproductbutton'>";
        echo "<center><button class='button'><a href='../add_product/add_product.html' class='link'><span>Add Product </span></a></button></center>";
        echo "</div>";

        echo '<button class="button logoutbutton"><a href="market_logout.php" class="link"><span>Log out</span></a></button>';
        mysqli_close($db);

mysqli_close($db);
}
else
{
    echo "You are not logged in";
}

?>




</body>
</html>