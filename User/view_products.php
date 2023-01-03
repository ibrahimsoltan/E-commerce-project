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
    padding: 14px 16px;
    text-decoration: none;
    color: Black;
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

  .undernav {
    margin-top:30px;
    display:flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
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


.sidenav {
  display: block;
  height: 100%;
  width: 0px;
  position: absolute;
  left: 0;
  background-color: #dae0e573;
  padding-top: 20px;
  overflow-x: hidden;
  transition: 0.5s;
  margin-top: 46px;
}

.opensidenav{
  padding-top:0px;
  margin-top:0px;
  position:sticky;
  width: 100%;
  height: 100%;
  z-index: 999999;

}

.sidenav a {
  margin:0;
  padding: 0px 0px 0px 0px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: inline;
  transition: 0.3s;
}

.sidenav img{
  margin:0;

  padding: 8px 8px 0px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: inline;
  transition: 0.3s;
  top:0;
}

.sidenav span {
  padding: 0px 0px 0px 0px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: inline;
  transition: 0.3s;
  top:0;
}



.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

select{
  margin-right: 0px;
  margin-bottom: 10px;
}


.besidenav{

    transition:0.5s;

}


.background
{
  /*display local image as backgorund*/
  background: url(../images/BackgroundImage.gif) no-repeat center center fixed;
  background-size: cover;
  color:white;
  font-size: 30pt;
  width: 100%;
  height: 700px;
  }

</style>
</head>



<body>

<div >
<ul class="navbar" id="navbar">

            <?php
            session_start();
            echo '<li class="left" style="padding-left:10px;"><a href="view_products.php"><img style="width:100px; height:50px" src="../images/flightclub2.jpg"></a></li>';
            echo '<center><li><a class="text"href="view_all_markets.php">Markets</a></li>';


            if(isset($_SESSION['user_id'])){
              echo '<li ><a class="text "id="text" href="get_favorite_products.php">Favourite Products</a></li>';
              echo '<li><a class="text" id="text" href="get_cart.php">Cart</a></li></center>';


            $Session=$_SESSION["user_id"];
            $db = mysqli_connect("localhost", "root", "", "ecomm-db");
            $q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");
            while ($row=mysqli_fetch_array($q )) {
              echo "<li id='lastchild'><a class='text' id='text' href='profile.php'>Profile</a></li>";

            }
            }
            else{
                echo '<li id="lastchild"><a class="text" id="text" href="login.html">Login</a></li>';
                echo '<li id="lastchild"><a class="text" id="text" href="sign_Up.html">Sign up</a></li>';

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
<section navbar-color="black"  navbar-text-color="white" navbar-hover='3px solid white' name="section1" id="section1"class="background undernav" >
  <div style='float:left'>
  
    <h2 style='z-index:9999999; padding-top:120px; position:static;' data-qa="HeroSectionAllStarTitle" data-testid="heroTitle" class="sc-hYbzA-d ifYKUn">TOP SNEAKER COLLABS 2022</h1>
  </div>
</section>

<section data-navbar-color='white' navbar-text-color="black" navbar-hover='3px solid black' id='besidenav section2' class='undernav besidenav'>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <img src="https://cdna.iconscout.com/img/filters.75dacdc.svg" width="24" alt="Filter icon" class="mr-2">
  <span>Filters</span>
  <form method="get" class='undernav'>
  <input type="text" name="search" placeholder="Search..">
  <br>
  <select name="sort_by">
    <option style="font-size: 9pt; text-align:center;" value="" disabled selected="selected">--Sort--</option>
    <option style="text-align:center;" value="product_name">Name</option>
    <option style="text-align:center;" value="product_price">Price</option>
  </select>
  <select name="order">
    <option style="font-size: 9pt; text-align:center;" value="" disabled selected="selected">--Type--</option>
    <option style="text-align:center;" value="ASC">Ascending</option>
    <option style="text-align:center;" value="DESC">Descending</option>
  </select>
  <input type="submit" value="Sort">
</form>
</div>


<div id="opensidenav" class="opensidenav">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; <span class="title">Filters<span></span>
</div>


<?php
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'product_name';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$search = isset($_GET['search']) ? $_GET['search'] : '';


$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query($db, "SELECT * FROM `product` ORDER BY $sort_by $order");
if($search != ''){
  $q = mysqli_query($db, "SELECT * FROM `product` WHERE LOWER(product_name) LIKE LOWER('%$search%') ORDER BY $sort_by $order");
}
//add the product to naviagte to the product page
while ($row = mysqli_fetch_array($q)) {
    echo "<div class='product' >";

    echo "<center><div class='productimage'>
        <img src='../images/" . $row['product_photo'] . "'>
        </div></center>";
    $product_id = $row['product_id'];
    echo "<div class='productinfo'>";
    echo " <span class='title'>". $row['product_name'] . "</span> <span id='lastchild' class='value'>".  $row['product_price']  . "EGP</span></h5>";
    echo "<center><p class='brief'>" . $row['product_brief'] . "</p></center>";
    echo "<button class='button'><a href='product.php?product_id=$product_id' class='link'><span>View Product </span></a></button>";
    echo "</div>";

    echo "</div>";

}

echo "</section>";
echo '<button class="button"><a href="index.php" class="link"><span>Back to Welcome Page</span></a></button>';


mysqli_close($db);
if (isset($_SESSION["user_id"])) {

}

else {

}

?>


</body>

</html>

<script>
  const boxes = document.querySelectorAll('.besidenav');
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
  boxes.forEach(box => box.style.marginLeft = "210px");
  document.getElementById("opensidenav").style.visibility = "hidden";

}


function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  boxes.forEach(box => box.style.marginLeft = "0px");  
  setTimeout(() => {  document.getElementById("opensidenav").style.visibility = "visible"; }, 300);

}
</script>

<!-- <script>
  // Get the navbar element
  var navbar = document.getElementById("navbar");
  var navbarText = document.getElementsByClassName("text");

  // Get the sections
  var sections = document.querySelectorAll("section");

  // Add an event listener to the window to detect when the user is viewing this section of the page
  window.addEventListener("scroll", function(){
    // Loop through each section
    for (var i = 0; i < sections.length; i++) {
      // Check if the section is in view
      var sectionInView = isInView(sections[i]);
      // If the section is in view, apply the appropriate style to the navbar
      if (sectionInView) {
        navbar.style.backgroundColor = sections[i].getAttribute("navbar-color");
        for(var j = 0; j < navbarText.length; j++){
          navbarText[j].style.color = sections[i].getAttribute("navbar-text-color");
          navbarText[j].addEventListener('mouseenter', function() {
            this.style.borderBottom = sections[i].getAttribute("navbar-text-color") + ' 3px solid';
          });

          navbarText[j].addEventListener('mouseleave', function() {
            this.style.border = '';
          });
        }
        break;
      }
    }
  });

  

  // Function to check if an element is in view
  function isInView(el) {
    // Get the element's p/osition and size
    var rect = el.getBoundingClientRect();
    // Check if the element is in view by comparing its position and size to the viewport
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
</script>


 -->
