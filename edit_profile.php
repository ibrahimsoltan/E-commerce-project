

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />
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
            <h2>Edit profile</h2>
            Edit Email: <input type="text" name="user_email" value='<?php echo $row['user_email'];?>'>
            <br>
            Edit Password: <input type="text" name="user_password" value='<?php echo $row['user_password'];?>'>
            <br>
            Edit Username: <input type="text" name="user_name" value='<?php echo $row['user_name'];?>'>
            <br>
            Edit Address: <input type="text" name="user_address" value='<?php echo $row['user_address'];?>'>
            <br>
            Edit Location: <input type="text" name="user_location" value='<?php echo $row['user_location'];?>'>
            <br>
            Edit Phone: <input type="text" name="user_phone" value='<?php echo $row['user_phone'];?>'>
            <br>
            <!--view image-->
            <img src="images/<?php echo $row['user_photo'];?>" width="100" height="100">
            <br>
            <label for="file">Select an image to upload:</label>
            <br>
            <input type="file" name="file" id="file" >
            <br>
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
        
    /*
    if(!empty($user_photo)){
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$user_photo);
        $filename = $user_photo;
    }
    else{
        $filename = $user['photo'];
    }*/

    // if(!empty($user_email)){
    //  $newuser_email = $user_email;
    // }
    // else{
    //     $newuser_email = $row['user_email'];
    // }

    // if(!empty($user_password)){
    //     $newuser_password = $user_password;
    //    }
    //    else{
    //        $newuser_password= $row['user_password'];
    //    }

    // if(!empty($user_name)){
    //     $newuser_name = $user_name;
    //    }
    //    else{
    //        $newuser_name= $row['user_name'];
    //    }

    // if(!empty($user_address)){
    //     $newuser_address = $user_address;
    //    }
    //    else{
    //        $newuser_address= $row['user_address'];
    //    }

    // if(!empty($user_location)){
    //     $newuser_location = $user_location;
    //    }
    //    else{
    //        $newuser_location= $row['user_location'];
    //    }

    // if(!empty($user_phone)){
    //     $newuser_phone = $user_phone;
    //    }
    //    else{
    //        $newuser_phone= $row['user_phone'];
    //    }

    // try{
    //     $stmt = $db->prepare
    //     ("UPDATE user SET user_email=:user_email,
    //      user_password=:user_password, user_name=:user_name, user_address=:user_address,
    //      user_location=:user_location, user_phone=:user_phone, user_photo=:user_photo WHERE user_id=:id");
    //     $stmt->execute(['user_email'=>$newuser_email,
    //     'user_password'=>$newuser_password, 'user_name'=>$newuser_name, 'user_address'=>$newuser_address,
    //      'user_location'=>$newuser_location, 'user_phone'=>$newuser_phone,'user_id'=>$user_id]);

    //     $_SESSION['success'] = 'Account updated successfully';
    // }
    // catch(PDOException $e){
    //     $_SESSION['error'] = $e->getMessage();
    // }
}
else
{
	header("Location: index.php");
}
?>