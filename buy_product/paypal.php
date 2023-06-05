<?php

require __DIR__ . '/vendor/autoload.php';
$user_id = $_GET['user_id'];


$clientId = "AeazP3uoUnzUraVH3mkpbjYTotHgpmnw1lWHoB4YsnD6SYCZCdJb5czfQ6RUc1YW0ez7vKqdvVkimPGD";
$clientSecret = "EOezPvh1aV4eQ7JE6ml0Bz07fGB0l0yi8TbLdoyAhmE_Hlebpj86mwcxPBOaWOpY5-2nX8-FD-M6VEWO";

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        $clientId,     // ClientID
        $clientSecret,     // ClientSecret
    )
);

$product_total = 3000;

session_start();
if (isset($_SESSION["user_id"])) {
    $count = 0;

    $db = mysqli_connect("localhost", "root", "", "ecomm-db");
    $user_id = $_SESSION["user_id"];
    $q = mysqli_query($db, "SELECT * FROM `cart` WHERE `user_id` = $user_id");
    while ($row = mysqli_fetch_array($q)) {
        $product_id = $row['product_id'];
        $count++;

        $q2 = mysqli_query($db, "SELECT * FROM `product` WHERE `product_id` = '$product_id'");
        $row2 = mysqli_fetch_array($q2);
        $product_name = $row2['product_name'];
        $product_price = $row2['product_price'];
        $product_image = $row2['product_image'];
        $product_count = $row2['product_count'];
        $product_quantity = $row['quantity'];
        $product_total = $product_price * $product_quantity;
        //get the market of the product using the product_id from market_products table
        $product_count = $product_count - $product_quantity;
        $q5 = mysqli_query($db, "UPDATE `product` SET `product_count` = '$product_count' WHERE `product_id` = '$product_id'");
        //delete from cart
        $cart_id = $row['cart_id'];
        $q6 = mysqli_query($db, "DELETE FROM `cart` WHERE `cart`.`cart_id` = '$cart_id'");
        $q7 = mysqli_query($db, "INSERT INTO `purchased_products` (`product_id`, `quantity`, `user_id`, `purchase_id`, `total_price`) VALUES ($product_id, $product_quantity, $user_id, NULL, $product_total);");
    
    }

    if ($q6) {
        mysqli_close($db);
    } else {
        echo "Error: " . $q6 . "<br>" . mysqli_error($db);
    }
    




    

}
$payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');
    
        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($product_total);
        $amount->setCurrency('USD');
    
        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
    
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl("http://localhost/E-COMMERCE-PROJECT/User/profile.php")
            ->setCancelUrl("http://localhost/E-COMMERCE-PROJECT/User/profile.php");
    
        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
    
    
        try {
            $payment->create($apiContext);
            echo $payment;
            echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            header("Location: http://localhost/E-commerce-project/User/profile.php");
    
            echo $ex->getCode(); // Prints the Error Code
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

?>
