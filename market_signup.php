<?php
error_reporting(0);
session_start();
$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_name = $_POST['user_name'];
$user_address = $_POST['user_address'];
$user_location = $_POST['user_location'];
$user_phone = $_POST['user_phone'];
$user_balance = 0;
$user_balance_no = $_POST['user_balance_no'];

if (
    isset($_POST['user_email']) && !empty($_POST['user_email'])
    && isset($_POST['user_password']) && !empty($_POST['user_password'])
    && isset($_POST['user_name']) && !empty($_POST['user_password'])
    && isset($_POST['user_address']) && !empty($_POST['user_address'])
    && isset($_POST['user_phone']) && !empty($_POST['user_phone'])
) {
    $q = mysqli_query(
        $db,
        "INSERT INTO `market` (`market_id`, `market_name`, `market_email`, `market_address`, `market_password`, `market_phone`, `market_photo`, `market_location`,`market_balance`, `market_balance_no`) VALUES 
        (NULL, '$user_name', '$user_email', '$user_address', '$user_password', '$user_phone', '', '$user_location', '$user_balance' ,'$user_balance_no');"
    // "INSERT INTO `market` (`market_id`, `market_name`, `market_email`, `market_address`, `market_password`, `market_phone`, `market_photo`, `market_location`) VALUES (NULL, 'dtwey', 'test2@email', 'xfhb', '123', '416106', '', 'dgcjhdh');"
    );
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $sql_path = basename($_FILES["file"]["name"]);

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    $conn = mysqli_connect("localhost", "root", "", "ecomm-db");

    $image_path = $target_file;
    // echo "$user_name";
    $sql = "UPDATE market SET market_photo='$sql_path' WHERE market_name='$user_name'";
    mysqli_query($conn, $sql);


    $sql2 = "SELECT market_id FROM market WHERE market_email = '$user_email'";
            $row = mysqli_query($db, $sql2);
            $row = mysqli_fetch_array($row);
            $market_name = $row['market_name'];
            // echo "$market_name";
            $user_id = $row['market_id'];
            echo "$user_id";
            $_SESSION['market_id'] = $user_id;
    header("Location: market_profile.php");


}
    

mysqli_close($db);
?>
 
