<?php # private_area.php
session_start();
//if (!$_SESSION["is_authorized"]) header("location: login.php");

if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) {
	
	echo "Hello, ".$_SESSION['email']."! <a href='logout.php'>Logout</a>";
	
} else {
	header("location: login.php");
	//echo "You are not authorized. Go <a href='login.php'>login</a>";
}
?>