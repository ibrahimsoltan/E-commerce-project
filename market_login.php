<?php
error_reporting(0);
session_start();
$msg = "";
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
if (isset($user_email) && isset($user_password) )
{ $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    if ($db)
    {
        $q=mysqli_query($db,
        "SELECT `market_id`, `market_email`, `market_password` FROM
         `market` WHERE market_email='$user_email' and market_password='$user_password'");
        if ($q)
        {
            $row=mysqli_fetch_array($q);
            if (isset($row["market_email"]))
            {
            
            $_SESSION["market_id"]=$row["market_id"];
            echo "Welcome ".$user_email;
            echo '<p><a href="market_profile.php" class="bar-item button">profile</a></p>';
            header("Location: market_profile.php");

            }
            else
            {
                //header("Location: index.php");
                echo "not logged on system! sign up now";
                //echo  "<a href="sign_up.php" class="bar-item button">sign up</a>";
                echo '<p><a href="sign_up.php" class="bar-item button">sign up</a></p>';

            }
                
            mysqli_close($db);

            
        }
        else
        {
            echo "not selected";
        }
        mysqli_close($db);
    }
    else
    {
        die("not connected".mysqli_errno());
    }
}
?>
 
