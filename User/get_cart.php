<!DOCTYPE html>
<html>
<head>
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
  background-color: white;
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

            <?php
            session_start();
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
            <img class='productimage' src='../images/" . $row['product_photo'] . "'>
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
    echo "<button class='button' style='float: right;'><a href='../buy_product/buy.php' class='link'><span>Pay with credit </span></a></button>";
    echo "<button class='button' style='float: right;'><a href='../buy_product/paypal.php' class='link'><span>Pay with paypal </span></a></button>";


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