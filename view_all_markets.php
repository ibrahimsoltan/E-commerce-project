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


    </style>

</head>

<body>
<div >
<ul class="navbar">

            <?php
            session_start();
            echo '<li class="left" style="padding-left:10px;"><a href="view_products.php"><img style="width:100px; height:50px" src="images/flightclub2.jpg"></a></li>';
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
<section class="undernav">
  <?php
error_reporting(0);
session_start();

$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, 'SELECT * FROM `market`');
// echo "<section  class='allmarkets'>";
while ($row=mysqli_fetch_array($q)) {
  // echo "<a id='componentAnchor' href='market_profile.php'";
  echo "<div class='marketcard' >";
    $market_id =$row['market_id'];
    echo "<center><div class='marketimage'>
        <img src='images/" . $row['market_photo'] . "'>
        </div></center>";
    echo " <span class='markettitle'>". $row['market_name'] . "</span> <span id='lastchild' class='value'>". "</span>";
    
    echo " <span class='marketphone'>". $row['market_phone'] . "</span> <span id='lastchild' class='value'>". "</span>";
    echo " <span class='marketaddress'>". $row['market_address'] . "</span> <span id='lastchild' class='value'>". "</span>";    
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
// echo "</section>";
}
mysqli_close($db);

?>


</section>
</body>
</html>
