<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");
session_start();

if(isset($_POST['Submit'])) {	
	$message = mysqli_real_escape_string($mysqli, $_POST['message']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);
	$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
		
	// checking empty fields
	if(empty($message) || empty($title) || empty($image) || empty($user_id)) {
				
		if(empty($message)) {
			echo "<font color='red'>message field is empty.</font><br/>";
		}
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($image)) {
			echo "<font color='red'>Image field is empty.</font><br/>";
		}
		if($_SESSION['user_id']!=$user_id){
			echo "Different user id!";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO posts(message,title,image, user_id) VALUES('$message','$title','$image','$user_id')");
		
		//display success message
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='index.php'>View Result</a>";

		header('Location: index.php');
		
		
		
	}
}
?>


</body>
</html>
