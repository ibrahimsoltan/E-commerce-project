<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-color:#dae0e573/*light silver*/
        }
        img{
            padding-top: 20px;
        }
        #content{

            text-align: center;
            background-color: white;
            border: 2px;
            border-radius: 3%;
        /*    position: sticky;*/
            margin-top: 70px;
            left: 35%;
            box-shadow: 2px 2px #dee2e6;
            height: 650px;
            width: 550px;
        }
        h2{
            margin-top: 90px;
            padding-top: 90px;
            font-size: 30px;
            font-family:inherit;
            margin-bottom: 50px;
            display: inline;
            top:0;
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
            border-bottom: 1px solid ;
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
            margin-top: 30px;
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
            padding-top: 110px;
            font-size: 10px;
        }
        img{
            width: 60px;
            height: 70px;
            border-radius: 25px;
            border: 2px solid white;
            margin-top: 10px;
        }
        input[type="file"] {
          margin-left: 50px;
          margin-top: 30px;
        }
        input[type="file"]::file-selector-button{
            border: none;
            background: linear-gradient(to bottom right,#2627a8cf, rgb(179 232 251));
            color: white;
            border-radius: 15px;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="file"]::file-selector-button:hover{
            background: linear-gradient(to bottom right,#007bff7d, #dfc8e5);
        /*light blue to silver*/
        }
    </style>
</head>
 <center>
<body>
        <?php
        session_start();
        $Session=$_SESSION["user_id"];
        $db = mysqli_connect("localhost", "root", "", "ecomm-db");
        $q = mysqli_query($db, "SELECT * FROM `user` WHERE user_id= '$Session'");
        $row=mysqli_fetch_array($q);
        ?>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
        
            <div id='profile-pic'>
                <img src="images/<?php echo $row['user_photo'];?>" width="100" height="100">
                <br>
                <h2>Edit profile</h2>
            </div>
            <br>
            <input type="text" name="user_email" placeholder='Email' value='<?php echo $row['user_email'];?>'>
            <br>
            <input type="text" name="user_password" placeholder='Password' value='<?php echo $row['user_password'];?>'>
            <br>
            <input type="text" name="user_name" placeholder='Name' value='<?php echo $row['user_name'];?>'>
            <br>
            <input type="text" name="user_address" placeholder='Address' value='<?php echo $row['user_address'];?>'>
            <br>
            <input type="text" name="user_location" placeholder='Location' value='<?php echo $row['user_location'];?>'>
            <br>
            <input type="text" name="user_phone" placeholder='Phone Number' value='<?php echo $row['user_phone'];?>'>
            <br>
            <!-- <label for="file">Select an image to upload:</label> -->
            <br>
            <input type="file" name="file" id="file" for="file">
            <br>
            <button type='submit' name='edit'>apply</button>
            <a href="index.php" class="bar-item button">back</a>
        </form>
    </div>
</body>
</center>
</html>

<?php
session_start();
$Session=$_SESSION["user_id"];
ob_end_flush();

if (isset($_SESSION["user_id"]))
{
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $Session=$_SESSION["user_id"];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $user_location = $_POST['user_location'];
    $user_phone = $_POST['user_phone'];
    $user_photo = $_POST['upload'];
    $user_id = $row['user_id'];
    if (
        isset($_POST['user_email']) && !empty($_POST['user_email'])
        && isset($_POST['user_password']) && !empty($_POST['user_password'])
        && isset($_POST['user_name']) && !empty($_POST['user_password'])
        && isset($_POST['user_address']) && !empty($_POST['user_address'])
        && isset($_POST['user_phone']) && !empty($_POST['user_phone'])
    ) {
        $phone = $_POST['user_phone'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        $name = $_POST['user_name'];
        $address = $_POST['user_address'];
        $location = $_POST['user_location'];
        $phone = $_POST['user_phone'];
        $q = mysqli_query(
            $db,
            "UPDATE `user` SET `user_email` = '$email', `user_password` = '$password', `user_name` = '$name', `user_address` = '$address', `user_location` = '$location', `user_phone` = '$phone' WHERE `user`.`user_id` = '$Session'"
        );
       
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $sql_path = basename($_FILES["file"]["name"]);

        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
          
        $conn = mysqli_connect("localhost", "root", "", "ecomm-db");
    
        $image_path = $target_file;
    
        $sql = "UPDATE user SET user_photo='$sql_path' WHERE user_name='$user_name'";
    
        mysqli_query($conn, $sql);
         
    
    }
}
else
{
    header("Location: index.php");
}
?>