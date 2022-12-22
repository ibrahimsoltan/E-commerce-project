<<<<<<< Updated upstream
=======
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
    width: 98.5%;
    position: fixed;
    
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
  background-color: #f9f9f9;
}

.product:hover{
  transform: scale(1.1);
}

.productimage img {
  max-width: 80%;
  max-height:150
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

.brief{
    font-size: 8pt;
    color: #505050;
}

</style>
</head>

<body>
<div >
<ul class="navbar">
            <li><a  class="active" href="view_products.php">Home</a></li>
            <?php
            session_start();

            if(isset($_SESSION['user_id'])){
            echo '<li><a href="get_favorite_products.php">Favourite Products</a></li>';
            echo '<li><a href="get_cart.php">Cart</a></li>';
            echo '<li id="lastchild"><a href="profile.php">Profile</a></li>';
            echo '<li><a href="view_all_markets.php">view markets</a></li>';
            }
            else{
                echo '<li id="lastchild"><a href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a href="sign_Up.html">Sign up</a></li>';

            }
            ?>
            </ul>
        <!-- <h1 class='undernav'> Products</h1> -->
</div>

>>>>>>> Stashed changes
<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $q = mysqli_query($db, 'SELECT * FROM `product`');
    echo "<table border = 2 width = 100% >";
    echo "<tr><th>product_name</th><th>product_price</th><th>product_brief</th>
    <th>product_description</th><th>product_photo</th>
    <th>Navigate to the product</th></tr>";
    //add the product to naviagte to the product page
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        echo "<tr>";
        echo "<td>" . $row['product_name'];
        echo "<td>" . $row['product_price'];
        echo "<td>" . $row['product_brief'];
        echo "<td>" . $row['product_description'];
        echo "<td><img src='images/" . $row['product_photo'] . "' width='100' height='100'>";
        echo "<td><a href='product.php?product_id=$product_id'>View</a>";
    }
    echo "</table>";
    echo '<p><a href="index.php" class="bar-item button">back</a></p>';
    mysqli_close($db);
if (isset($_SESSION["user_id"])) {
    
}

else {
    
}

?>