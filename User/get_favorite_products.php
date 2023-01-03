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
    width: 98.5%;
    position: fixed;
    z-index: 1;  /* add this line */
    background-color: white;
    display: flex;
    justify-content: space-between;
  }

  .undernav {
    padding:20px;
    margin-top:30px;
    display:flex;
    flex-wrap: wrap;
    align-items:center; 
    justify-content: center;
  }

  .product {
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

.product:hover{
  transform: scale(1.1);
}

.productimage img {
  max-width: 80%;
  max-height:150
}

/* .productinfo {
  margin-top: auto;
} */

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


.brief{
    font-size: 8pt;
    color: #505050;
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
                window.location.href = 'User/profile.php';
              });
            </script>
</div>
<?php

if (isset($_SESSION["user_id"])) {
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "SELECT p.* FROM favorite_products fp JOIN product p ON p.product_id = fp.product_id WHERE fp.user_id =$user_id ;");
    echo "<section class='undernav'>";
    //add the product to naviagte to the product page
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        echo "<div class='product'>";
        echo "<center><div class='productimage'>
            <img src='../images/" . $row['product_photo'] . "'>
            </div></center>";
        echo "<div>";
        echo " <span class='title'>". $row['product_name'] . "</span> <span id='lastchild' class='value'>".  $row['product_price']  . "EGP</span></h5>";
        echo "<center><p class='brief'>" . $row['product_brief'] . "</p></center>";
        echo "<button class='button'><a href='product.php?product_id=$product_id' class='link'><span>View Product </span></a></button>";

        echo"";

        echo "</div>";
        echo "</div>";
    }
    echo "</section>";

    mysqli_close($db);
}
    
    else {
        echo "You are not logged in";
    }

?>


</body>

</html>