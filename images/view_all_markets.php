<html>
<head>
    <style>
        .imgnav{
    width: 45px;
    height: 35px;
    border-radius: 100px;
    padding-right: 5px;
    padding-top: 3px;
    margin-top: 5px;
    cursor: pointer;

}

.active {
    background: linear-gradient(to bottom right,#2627a8cf, rgb(179 232 251));
  }

  .navbar{
    top: 0;
    left: 0;
    width: 100%;
    position: fixed;
    z-index: 1;
  }


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
    .undernav {
    margin-top:90px;
    display:flex;
    flex-wrap: wrap;
    align-items:center; 

    justify-content: center;

  }
  .marketimage img {
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
  background-color: #f9f9f9;
}

.marketcard:hover{
  transform: scale(1.1);
}

.marketimage img {
  max-width: 100%;
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


    </style>

</head>

<body>
<div >
<ul class="navbar">
            <li><a href="view_products.php">Home</a></li>
            <li><a class="active" href="view_all_markets.php">Markets</a></li>

            <?php
            session_start();

            if(isset($_SESSION['user_id'])){
              echo '<li><a href="get_favorite_products.php">Favourite Products</a></li>';
              echo '<li><a href="get_cart.php">Cart</a></li>';
              $Session=$_SESSION["user_id"];
            $db = mysqli_connect("localhost", "root", "", "ecomm-db");
            $q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");
            while ($row=mysqli_fetch_array($q )) {
              echo "<li id='lastchild'> <img class='imgnav' id='profile' src='images/".$row['user_photo']."'> </li>";
            }
            }
            else{
                echo '<li id="lastchild"><a href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a href="sign_Up.html">Sign up</a></li>';

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
<section class="undernav">
  <?php
error_reporting(0);
session_start();

$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, 'SELECT * FROM `market`');
// echo "<section  class='allmarkets'>";
while ($row=mysqli_fetch_array($q)) {
  echo "<a id='componentAnchor' href='market_profile.php'";
  echo "<div class='marketcard' >";
    $market_id =$row['market_id'];
    echo "<center><div class='marketimage'>
        <img src='images/" . $row['market_photo'] . "'>
        </div></center>";
    echo " <span class='markettitle'>". $row['market_name'] . "</span> <span id='lastchild' class='value'>". "</span>";
    
    echo " <span class='marketphone'>". $row['market_phone'] . "</span> <span id='lastchild' class='value'>". "</span>";
    echo " <span class='marketaddress'>". $row['market_address'] . "</span> <span id='lastchild' class='value'>". "</span>";    
    echo "<br>";
    echo"</a>";
//     if (isset($_SESSION["user_id"]))
// {
//     echo "<button class='button'><a href='add_to_liked_markets.php?market_id=$market_id' class='link'><span>add to liked markets </span></a></button>";
// }
// else{
//     echo "<button class='button'><a href='add_to_liked_markets.php?market_id=$market_id' class='link'><span>add to liked markets </span></a></button>";
// }
echo "</div>";
// echo "</section>";
}
mysqli_close($db);

?>


</section>
</body>
</html>
