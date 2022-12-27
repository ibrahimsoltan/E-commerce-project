<!DOCTYPE html>
<html>
<head>

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

  #price{
    font: 10pt sans-serif;
    color: gray;
  }

  h2{
    font-size: 30pt ;
    font-weight: bold;
    margin-top: 0;
    margin-bottom: 0;
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
    width: 200px;
    height: 200px;
    border-radius: 25px;
    float: left;

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
  width: 60%;
  gap: 2px;
  background-color:white;
  border-radius:25px;
  padding: 20px;
}

.grid-item {
  background-color: #f9f9f9;
  padding: 10px 20px 10px 20px;
}



.image {
  grid-column: 4 / span 1  ;
  grid-row: 3 / span 2;
}

.nameprice {
  grid-column: 1 / span 2;
  grid-row:  3 / span 2;
  margin-top: auto;
  margin-bottom: auto;
}

.description {
  grid-column: 1 / span 4;
  font-size: 10pt;
  grid-row: 5;
  color: #505050;
}

.backbutton{
    grid-column: 1 / span 1;
    grid-row: 6;
}

.addfavbutton{
    grid-column: 4 / span 1;
    grid-row: 6;
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
            echo '<li id="lastchild"><a href="profile.php">Profile</a></li>';
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
<?php
$product_id = $_GET['product_id'];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `product` WHERE product_id = $product_id");
while ($row = mysqli_fetch_array($q)) {
  $product_id = $row['product_id'];
  echo "<div class='image'> <img class='undernav' src='images/" . $row['product_photo'] . "'> </div>";
  echo "<div class=' nameprice'><h2>" . $row['product_name'] . "</h2>
     <p id='price'>" . $row['product_price'] . "EGP</p></div>";
  echo "<div class='description'><p id='firstchild'>" . $row['product_description'] . "</p></div>";


  echo "</table>";
  echo "<div class='backbutton'><span id='firstchild'><button class='button'><a class='link' href='index.php'><span>Back To Home Page</span></a></button></span></div> ";
  if (isset($_SESSION["user_id"])) {
    echo "<div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='add_to_favorites.php?product_id=$product_id'><span>Add to favorites</span></a></button></span></div> ";


    if ($row['product_count'] > 0) {
      echo "<center><div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='add_to_cart.php?product_id=$product_id'><span>Add to cart</span></a></button></span></div></center>";
    } else {
      echo "<center><div class='addfavbutton'><span id='lastchild'><button class='button' disabled><span>Out of stock</span></a></button></span></div></center>";
    }
  } else {
    echo "<div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='login.html'><span>Login to add to favorites</span></a></button></span></div> ";

  }
}
mysqli_close($db);
?>

</body>

</html>

