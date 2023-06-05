<?php
session_start();

if (isset($_SESSION["market_id"]))
{
	unset($_SESSION["market_id"]);
	unset($_SESSION["market_email"]);
	session_destroy();
	header("Location: market_login.php");
}
else
{
	header("Location: market_login.php");

}


?>