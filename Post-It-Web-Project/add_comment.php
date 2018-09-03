<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC");
//while($res = mysqli_fetch_array($result)) {
	//($res['id'])
//}

if(isset($_POST['SubmitComment'])) {	
	$comment = mysqli_real_escape_string($mysqli, $_POST['comment']);
	$post_id = mysqli_real_escape_string($mysqli, $_POST['post_id']);
	$user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

	// checking empty fields
	if(empty($comment)|| empty($post_id) || empty($user_id)) {
				
		if(empty($comment)) {
			echo "<font color='red'>message field is empty.</font><br/>";
		}
		if(empty($post_id)) {
			echo "<font color='red'>post_id is empty.</font><br/>";
		}
		if(empty($user_id)) {
			echo "<font color='red'>user_id is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			echo $post_id;
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO comments (comment,post_id, user_id) VALUES('$comment', '$post_id', '$user_id')");
		
		//display success message
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='index.php'>View Result</a>";

		header('Location: index.php');
		
		
		
	}
}
?>


</body>
</html>
