<?php
include_once("config.php");


if(isset($_POST['submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
		
	// checking empty fields
	if(empty($name) || empty($email) || empty($password) || empty($firstname) || empty($lastname)) {
				
		if(empty($name)) {
			echo "<font color='red'>name field is empty.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>password field is empty.</font><br/>";
		}
		if(empty($firstname)) {
			echo "<font color='red'>firstname field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>lastname field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
	include "config.php";

	$link = mysqli_connect($host, $user, $pass, $db);
		// if all the fields are filled (not empty) 
		$checkUser = mysqli_query( $link, 
		"SELECT * FROM users WHERE user_name = '" . trim( $_POST['name'] )  . "'"
		);

		if ($checkUser->num_rows == 1)
			echo 'This username already exists!';

		$checkEmail = mysqli_query( $link, 
			"SELECT * FROM users WHERE user_email = '" . trim( $_POST['email'] ) . "'"
		);

		if ( $checkEmail->num_rows == 1 )
			echo 'This Email already exists!';
			
		//insert data to database	
		//$result = mysqli_query($mysqli, "INSERT INTO posts(message,title,image, user_id) VALUES('$message','$title','$image','$user_id')");
		
		$result = mysqli_query($mysqli, "INSERT INTO users (user_name, user_email, user_password, user_firstname, user_lastname) VALUES ('$name', '$email' ,'$password', '$firstname' , '$lastname')"
	
		);
		//display success message
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='index.php'>View Result</a>";

		header('Location: index.php');
		
		
		
	}
}
?>