<?php
session_start();
$Session=$_SESSION["market_id"];
ob_end_flush();

if (isset($_SESSION["market_id"]))
{
    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $Session=$_SESSION["market_id"];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $user_location = $_POST['user_location'];
    $user_phone = $_POST['user_phone'];
    $user_photo = $_POST['upload'];
    $user_id = $row['market_id'];
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
            "UPDATE `market` SET `market_email` = '$email', `market_password` = '$password', `market_name` = '$name', `market_address` = '$address', `market_location` = '$location', `market_phone` = '$phone' WHERE `market`.`market_id` = '$Session'"
        );
       
       
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $sql_path = basename($_FILES["file"]["name"]);
        if ($sql_path != "") {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            $conn = mysqli_connect("localhost", "root", "", "ecomm-db");
            $image_path = $target_file;

            $sql = "UPDATE market SET market_photo='$sql_path' WHERE market_name='$user_name'";
            mysqli_query($conn, $sql);
        }
        header("Location: market_profile.php");
    }
}

?>