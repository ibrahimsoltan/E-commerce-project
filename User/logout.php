<?php
session_start();

if (isset($_SESSION["user_id"]))
{
	unset($_SESSION["user_id"]);
	unset($_SESSION["user_email"]);
	session_destroy();
	header("Location: view_products.php");
}
else
{
	header("Location: view_products.php");
}


?>