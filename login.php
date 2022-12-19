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
        "SELECT `user_id`, `user_email`, `user_password` FROM
         `user` WHERE user_email='$user_email' and user_password='$user_password'");
        if ($q)
        {
            $row=mysqli_fetch_array($q);
            if (isset($row["user_email"]))
            {
            
            $_SESSION["user_id"]=$row["user_id"];
            echo "Welcome ".$user_email;
            echo '<p><a href="profile.php" class="bar-item button">profile</a></p>';
            header("Location: profile.php");


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
 
