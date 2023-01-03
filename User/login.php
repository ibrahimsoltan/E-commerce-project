<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-color:#dae0e573/*light silver*/
        }
        #content{

            text-align: center;
            width: 25vw;
            background-color: white;
            border: 2px;
            border-radius: 3%;
        /*    position: sticky;*/
        margin-top: 100px;
            left: 35%;
            top: 20%;
            box-shadow: 2px 2px #dee2e6;
            padding-bottom:20px;

        }
        h2{
            margin-top: 90px;
            padding-top: 90px;
            font-size: 30px;
            font-family:inherit;
            margin-bottom: 50px;
        }
        input[type=text]{
            margin-top: 5px;
            width: 250px;
            height: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #adb5bd;
        /*    border: 1px solid black;*/
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        input[type=text]:focus{
            outline: none;
            border-bottom: 1px solid gray;
        }
        button{
            transition-duration: 0.1s;
            padding: 10px 10px;
            border-radius: 4px;
            border: 2px solid navy;
            width: 190px;
            margin: 4px 4px 4px 4px;
            font-family: inherit;
            font-size: 15px;
            border-color:#ffffff ;
            text-decoration: none;
        /*    background-color: black; */
            background: linear-gradient(to bottom right,#2627a8cf, rgb(179 232 251));/*dark blue to light blue*/
            color: white;
            margin-top: 50px;
            border-radius: 25px;
        }
        button:hover {
                background: linear-gradient(to bottom right,#007bff7d, #dfc8e5);
        /*light blue to silver*/
        color: white;
        }
        a {
            transition-duration: 0.4s;
            color: #0b2846;
            border: 2px;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 10px;
            opacity: 90%;
        }

        /* Change the color of links on hover */
        a:hover {
        /*  background-color: #dee2e6;*/
        color: black;
        }
        #footer{
            padding-top: 20px;
            font-size: 10px;
        }
        
        #wrong{
            color: red;
            font-size: 12px;
            padding-top: 20px;
        }
        #footer2{
            padding-top: 20px;
            font-size: 10px;
        }

    </style>

</head> 
<body>
    <center>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <h2>Welcome</h2>
             <input type="text" placeholder="Email" name="user_email" id="user_email" required="true">
            <br>
            <input type="text" placeholder="Password" name="user_password" id="user_password" required="true">
            <br>
        <div>
            <button type='submit' name='sign_in' id="submit-btn">LOG IN</button></div>
           <!-- <div> <a href="index.php" class="bar-item button">back</a></div> -->
           <div id="footer">Don't have an account?<a href="sign_up.html">Sign Up</a></div>

           <?php
error_reporting(0);
session_start();
$msg = "";
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
if (isset($user_email) && isset($user_password) )
{ 
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    if ($db)
    {
        $q=mysqli_query($db,
        "SELECT `user_id`, `user_email`, `user_password` FROM
         `user` WHERE user_email='$user_email'");
        if ($q){
        $row=mysqli_fetch_array($q);
        if (isset($row["user_email"]))
        {
        $q2=mysqli_query($db,
        "SELECT `user_id`, `user_email`, `user_password` FROM
         `user` WHERE user_email='$user_email' and user_password='$user_password'");
        if ($q2)
        {
            $row=mysqli_fetch_array($q2);
            if (isset($row["user_email"]))
            {
            
            $_SESSION["user_id"]=$row["user_id"];
            echo "Welcome ".$user_email;
            echo '<p><a href="profile.php" class="bar-item button">profile</a></p>';
            header("Location: profile.php");


            }
            else
            {
                echo "<div id='wrong'>Wrong password</div>";
            }
        }
        
        }
        else{
            echo "<div id='wrong'>Wrong email</div>";
        }
    }
        }
    
        
        mysqli_close($db);
    }
    else
    {
        die("not connected".mysqli_errno());
    }


?>
           <div id="footer2">Don't have an account?<a href="sign_up.html">Sign Up</a></div>

        
    </form>
    </div>
</center>

</body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
    $("#submit-btn").click(function() {
      var inputEmail = $("#user_email");
      var inputPassword = $("#user_password");

      if (inputEmail.val() == "" || inputPassword.val() == "") {
        if(inputEmail.val() == "")
            inputEmail.css("border-color", "#DC143C");
        if(inputPassword.val() == "")
            inputPassword.css("border-color", "#DC143C");

        setTimeout(function() {
          inputEmail.css("border-color", "");
          inputPassword.css("border-color", "");
        }, 2000); // remove border after 2 seconds
        return false;
      }
      return true;
    });
  });
    $(document).ready(function(){
        $("#footer").hide();
        $("#submit-btn").click(function(){
        $("#footer").show();
        });
    });
</script>


 
