<!DOCTYPE html>
<html>
<head>

<style>
     body{
          background-color:#f7f7f773;
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
    display: flex;
    justify-content: space-between;
    background-color: white;
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
  background-color: white;
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
}

.grid-item {
  background-color: #f9f9f9;
  font-size: 30px;
  padding: 10px 20px 10px 20px;
}

.title {
  grid-column: 1 / span 1;
  grid-row: 1;
}

.brief {
  grid-column: 1 / span 2;
  grid-row: 2;
}

.image {
  grid-column: 1 / span 2 ;
  grid-row: 3 / span 2;
}

.nameprice {
  grid-column: 4 / span 1;
  grid-row:  3 / span 2;
  margin-top: auto;
  margin-bottom: auto;
}

.description {
  grid-column: 1 / span 4;
  grid-row: 5;
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
<<<<<<< Updated upstream
<div >
<ul class="navbar">
            <li><a href="view_products.php">Home</a></li>
            <?php

            session_start();

            if(isset($_SESSION['user_id'])){
            echo '<li><a href="get_favorite_products.php">Favourite Products</a></li>';
            echo '<li><a href="#Cart">Cart</a></li>';
            echo '<li id="lastchild"><a href="profile.php">Profile</a></li>';
            }
            else{
                echo '<li id="lastchild"><a href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a href="sign_Up.html">Sign up</a></li>';

            }
            ?>
            </ul>
=======
  <div >
    <ul class="navbar" id="navbar">

      <?php
        session_start();
        echo '<li class="left" style="padding-left:10px;"><a href="view_products.php"><img style="width:100px; height:50px" src="images/flightclub2.jpg"></a></li>';
        echo '<center><li><a class="text"href="view_all_markets.php">Markets</a></li>';


        if(isset($_SESSION['user_id']))
        {
          echo '<li ><a class="text" href="get_favorite_products.php">Favourite Products</a></li>';
          echo '<li><a class="text" href="get_cart.php">Cart</a></li></center>';

          $Session=$_SESSION["user_id"];
          $db = mysqli_connect("localhost", "root", "", "ecomm-db");
          $q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");
          while ($row=mysqli_fetch_array($q )) 
          {
            echo "<li id='lastchild'><a class='text' href='profile.php'>Profile</a></li>";
          }
        }
        else
        {
          echo '</center>
                <li id="lastchild"><a class="text" href="login.html">Login</a></li>';
          echo '<li id="lastchild"><a class="text" href="sign_Up.html">Sign up</a></li>';
        }
      ?>
    </ul>
>>>>>>> Stashed changes

</div>
        <section class='undernav'>
        <center>

        <div class='grid-container'>
        <div class= 'title'><h1 class='undernav' style='float:left'> Product</h1></div>
<?php
$product_id = $_GET['product_id'];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `product` WHERE product_id = $product_id");
while ($row = mysqli_fetch_array($q)) {
<<<<<<< Updated upstream
    $product_id = $row['product_id'];
    echo "<div class='brief'> <h4 id='firstchild'>".$row['product_brief']."</h4></div>";
    echo "<div class='image'> <img class='undernav' src='images/".$row['product_photo']."'> </div>";
    echo "<div class=' nameprice'><h2>".$row['product_name'] . "</h2>
     <p id='price'>".$row['product_price']. "EGP</p></div>";
   
    echo "<div class='grid-item description'><p id='firstchild'>".$row['product_description']."</p></div>";
    
}
echo "</table>";
echo "<div class='backbutton'><span id='firstchild'><button class='button'><a class='link' href='index.php'><span>Back To Home Page</span></a></button></span></div> ";
if (isset($_SESSION["user_id"])) {
    echo "<div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='add_to_favorites.php?product_id=$product_id'><span>Add to favorites</span></a></button></span></div> ";

} else {
=======
  $product_id = $row['product_id'];
  echo "<div class='image'> <img class='undernav' src='images/" . $row['product_photo'] . "'> </div>";
  echo "<div class=' nameprice'><h2>" . $row['product_name'] . "</h2>
     <p id='price'>" . $row['product_price'] . "EGP</p></div>";
  echo "<div class='description'><p id='firstchild'>" . $row['product_description'] . "</p></div>";


  echo "</table>";
  if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION['user_id'];
    $q2 = mysqli_query($db, "SELECT * FROM `favorite_products` WHERE user_id = $user_id AND product_id = $product_id");
    if (mysqli_num_rows($q2) > 0) {
      echo "<div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='add_to_favorites.php?product_id=$product_id'><img src='images/heart-red-icon.png' style='width:20px;height:20px'></a></button></span></div> ";
    } else {
      echo "<div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='add_to_favorites.php?product_id=$product_id'><img src='images/heart-white-icon.png' style='width:20px;height:20px'></a></button></span></div> ";
    }

    if ($row['product_count'] > 0) {
      $q2 = mysqli_query($db, "SELECT * FROM `cart` WHERE user_id = $user_id AND product_id = $product_id");
      if (mysqli_num_rows($q2) > 0) {
        echo "<div class='backbutton'><span ><button class='button'><a class='link' href='add_to_cart.php?product_id=$product_id'><span><img src='images/cart-filled-icon.png' style='width:20px;height:20px'></span></a></button></span></div></center>";
      } else {
        echo "<div class='backbutton'><span ><button class='button'><a class='link' href='add_to_cart.php?product_id=$product_id'><span><img src='images/shopping-cart-icon.png' style='width:20px;height:20px'></span></a></button></span></div></center>";
      }

    } else {
      echo "<div class='backbutton'><span><button class='button' disabled><span>Out of stock</span></a></button></span></div></center>";
    }
  } else {
>>>>>>> Stashed changes
    echo "<div class='addfavbutton'><span id='lastchild'><button class='button'><a class='link' href='login.html'><span>Login to add to favorites</span></a></button></span></div> ";

}    
mysqli_close($db);
?>

</body>

</html>

