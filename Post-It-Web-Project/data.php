<?php 
session_start();
include("connect.php");
// zaqvka 
$postEmail = (isset($_POST['email'])) ? $_POST['email']:null;
$postPassword = (isset($_POST['pass'])) ? $_POST['pass']:null;

$sql = "SELECT * FROM users WHERE 
		user_email='".$postEmail."' AND
		user_password='".md5($postPassword)."'";
		
//tozi red izpulnqva zaqvkata
$result = mysqli_query($link, $sql);
if($result === false){
	echo "Query failed!" . mysqli_error($link);
}

// sega vzimame rezultata
//tova e za da q pokaje
//$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if($count == 1) {
	$row = mysqli_fetch_assoc($result);
	echo "<pre>";
	$_SESSION['is_authorized'] = true;
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['email'] = $row['user_firstname']." " .$row['user_lastname'];
	header("location: index.php");
} else {
	header("location: incorect-login.php");
	echo 'The username or password are incorrect!';
	echo "hahaha NOT AUTHORIZED";
}
mysqli_close($link);