<?php
$product_name = $_POST['product_name'];
$product_brand = $_POST['product_brand'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];
$product_brief = $_POST['product_brief'];
$product_count = $_POST['product_count'];
$db = mysqli_connect("localhost", "root", "", "ecomm-db");
session_start();
$market_id = $_SESSION["market_id"];
if (isset($_SESSION["market_id"])) {
    $q = mysqli_query(
        $db,
        "INSERT INTO `product` (`product_name`, `product_brand`, `product_price`, `product_brief`, `product_description`, 
    `product_count`, `product_photo`, `product_id`)
     VALUES ('$product_name', '$product_brand', '$product_price ', '$product_brief', '$product_description', '$product_count', '', NULL);
    "
    );
    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $sql_path = basename($_FILES["file"]["name"]);

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    $conn = mysqli_connect("localhost", "root", "", "ecomm-db");

    $image_path = $target_file;

    $sql = "UPDATE product SET product_photo='$sql_path' WHERE product_name='$product_name'";

    mysqli_query($conn, $sql);
    $q = mysqli_query($db, "SELECT product_id FROM product WHERE product_name = '$product_name'");
    $row = mysqli_fetch_assoc($q);
    $product_id = $row["product_id"];
    $q = mysqli_query($db, "INSERT INTO `market_products` (`market_id`, `product_id`, `market_products_id`) VALUES ($market_id, $product_id, NULL)");
    if ($q) {
        // echo "Record updated successfully";
        header("Location: ../market/market_profile.php");
    }
    

    
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>