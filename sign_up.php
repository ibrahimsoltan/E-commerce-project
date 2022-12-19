<?php
error_reporting(0);
 
$msg = "";
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_name = $_POST['user_name'];
$user_address = $_POST['user_address'];
$user_location = $_POST['user_location'];
$user_phone = $_POST['user_phone'];
$user_id = $row['user_id'];
if (
    isset($_POST['user_email']) && !empty($_POST['user_email'])
    && isset($_POST['user_password']) && !empty($_POST['user_password'])
    && isset($_POST['user_name']) && !empty($_POST['user_password'])
    && isset($_POST['user_address']) && !empty($_POST['user_address'])
    && isset($_POST['user_phone']) && !empty($_POST['user_phone'])
) {
    $q = mysqli_query(
        $db,
        "INSERT INTO
    `user`(`user_email`, `user_password`, `user_name`, `user_address`,
    `user_location`, `user_phone`)
    VALUES
    ('$user_email','$user_password','$user_name','$user_address','$user_location','$user_phone');"
    );
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $sql_path = basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        echo "$target_file";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn = mysqli_connect("localhost", "root", "", "ecomm-db");

    $image_path = $target_file;

    $sql = "UPDATE user SET user_photo='$sql_path' WHERE user_name='$user_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        echo "<img src='" . $row["image_path"] . "'>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }


}
    

mysqli_close($db);
?>
 
