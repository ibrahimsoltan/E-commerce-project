<!DOCTYPE html>
<html>
<head>
<style>
    body{
            background-color:#dae0e573/*light silver*/
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
    left: 0;
    width: 100%;
    position: fixed;
    
  }


  .undernav {
    margin-top:30px;
    padding:30px;
    display:flex;
    flex-wrap: wrap;
    align-items:center; 
    justify-content: center;
  }


.grid-container {
  display: grid;
  width: 70%;
  height: 70px;
  border-radius: 10px;
  margin-bottom: 5px;
  background-color: #f9f9f9;
  box-shadow: 0 5px 25px rgba(1 1 1 / 15%) ;
  /*make it centered in the height */;
  align-items: center;
}

.image {
  grid-column: 1 / span 1;
  grid-row: 1 / span 2;
  text-align: center;
  vertical-align: middle;  
}

.name {
  grid-column: 2 ;
  grid-row: 1;
}

.quantity {
  grid-column: 3 ;
  grid-row: 1 / span 2;
}

.totalprice {
  grid-column: 4 ;
  grid-row: 1 / span 2;
}

.imgnav{
    width: 35px;
    height: 40px;
    border-radius: 30px;
    padding-right: 5px;
    padding-top: 3px;

}
.productimage  {
  width: 50px;
  height: 50px;
  border-radius: 10px;

}

.value{
    padding-top: 5px;
    font: 10pt sans-serif;
    color: gray;
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
.addbutton{
  display: inline-block;
  border-radius: 4px;
  background-color: #0474aa;
  border: none;
  color: white;
  text-align: center;
  font-size: 15;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 0px;
  padding-bottom: 0px;
  width: 150;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 20px;
  margin-right: 20px;
  background: linear-gradient(to bottom right,#2627a8cf, rgb(179 232 251));
}

.addbutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
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

.add{
    font-size: 20pt;
    font-weight: bold;
    color: white;
}

.brief{
    font-size: 8pt;
    color: #505050;
}

.quan{
    font-size: 15pt;
    font-weight: bold;
}

.total{
   display:block;
   width: 65%;
   margin-left: 50px;
   float: right;
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
            echo '<li><a class="active" href="get_cart.php">Cart</a></li>';
            echo '<li><a href="view_all_markets.php">view markets</a></li>';
            echo '<li id="lastchild"><a href="profile.php">Profile</a></li>';
            }
            else{
                echo '<li id="lastchild"><a href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a href="sign_Up.html">Sign up</a></li>';

            }
            ?>
            </ul>
        <h1 class='undernav'> Cart</h1>
</div>

<?php

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "SELECT p.* FROM cart
    fp JOIN product p ON p.product_id = fp.product_id WHERE fp.user_id =$user_id ;");
    echo "<section class='undernav'>";
    //add the product to naviagte to the cart page
    //need to show quantity
    $total_cart_price=0;
    while ($row = mysqli_fetch_array($q)) {
        $total_product_price=0;
        $product_id = $row['product_id'];
        $q2 = mysqli_query($db, "SELECT * FROM `cart` WHERE `user_id` = $user_id AND `product_id` = $product_id");
        $row2 = mysqli_fetch_array($q2);
        $product_count  = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = $product_id");
        $product_count_row = mysqli_fetch_array($product_count);
        $total_product_price = $row2['quantity'] * $row['product_price'];
        $total_cart_price += $total_product_price;
        echo "<div class='grid-container'>";
        echo "<center><div class='image'>
            <img class='productimage' src='images/" . $row['product_photo'] . "'>
            </div></center>";
        
        echo " <span class='name'> <div>". $row['product_name'] . "</div>
               <div class='value'>" .  $row['product_price']  . "EGP</div> </span> ";
        
        echo "<div class='quantity'>";
        echo "<button class='addbutton'><a href='reduce_quantity.php?product_id=$product_id' class='link'> <span class='add'>-</span></a></button>";
        echo "<span class=quan>".$row2['quantity'] . "</span>";
        if ($product_count_row['product_count'] > $row2['quantity']) {
            echo "<button class='addbutton'><a href='add_quantity.php?product_id=$product_id' class='link'> <span class='add'>+ </span></a></button>";
        } else {
            echo "<button class='addbutton'><span class='add'>+</span></a></button>";
          }
        echo "</div> ";

        echo "<div class='totalprice'>";
        echo "<span class='brief'>". $row['product_price']. " X " . $row2['quantity'] . "</span>";
        echo "<span > = ". $total_product_price . "EGP</span>";
        echo "</div>";


        echo "</div>";
        echo "<br>";
    }

    echo "<div class='total'>";
    echo "<span  style='float: right;'>Total Price = ". $total_cart_price . "EGP</span>";
    echo "<br>";
    echo "<button class='button' style='float: right;'><a href='buy.php' class='link'><span>Purchase </span></a></button>";


    echo "</div>";

    echo "</section>";
    //purchase button

    mysqli_close($db);
}
    
    else {
        echo "You are not logged in";
    }

?>

</body>

</html>