<form action="" method="post" enctype="multipart/form-data">
  <label for="file">Select an image to upload:</label>
  <input type="file" name="file" id="file">
  <input type="submit" value="Upload Image">
</form>
<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$sql_path = basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    echo "$target_file";
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn = mysqli_connect("localhost", "root", "", "ecomm-db");

$username = 'user1';
$image_path = $target_file;

$sql = "UPDATE user SET user_photo='$sql_path' WHERE user_name='$username'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    echo "<img src='" . $row["image_path"] . "'>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$sql = "SELECT image_path FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);




?>