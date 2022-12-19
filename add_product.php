<?php
$product_name = $_POST['product_name'];
$product_brand = $_POST['product_brand'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];
$product_brief = $_POST['product_brief'];
$product_count = $_POST['product_count'];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
$q = mysqli_query(
    $db,
    "INSERT INTO `product` (`product_name`, `product_brand`, `product_price`, `product_brief`, `product_description`, 
    `product_count`, `product_photo`, `product_id`)
     VALUES ('$product_name', '$product_brand', '$product_price ', '$product_brief', '$product_description', '$product_count', '', NULL);
    "
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
    $product_id = mysqli_insert_id($db);
    echo "The ID of the product is: $product_id";


    $sql = "UPDATE product SET product_photo='$sql_path' WHERE product_name='$product_name'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        echo "<img src='$target_file' alt='product_image' width='200' height='200'>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }


// $target_dir = "images/";
// $target_file = $target_dir . basename($_FILES["file"]["name"]);
// $sql_path = basename($_FILES["file"]["name"]);
// echo $target_file;
// echo "<br>";
// echo $sql_path;

// move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
  
// $conn = mysqli_connect("localhost", "root", "", "ecomm-db");

// $image_path = $target_file;

// $sql = "UPDATE product SET product_photo='$sql_path' WHERE product_name='$product_name'";

// mysqli_query($conn, $sql);

?>