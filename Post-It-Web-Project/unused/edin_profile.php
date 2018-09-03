<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$message = mysqli_real_escape_string($mysqli, $_POST['message']);	
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$image = mysqli_real_escape_string($mysqli, $_POST['image']);
	
	// checking empty fields
	if(empty($message) || empty($title) || empty($image)) {	
			
		if(empty($message)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
			
		}
		
		if(empty($image)) {
			echo "<font color='red'>Image field is empty.</font><br/>";
			$result = mysqli_query($mysqli, "UPDATE posts SET message='$message', title='$title' WHERE id=$id");
		
			//redirectig to the display page. In our case, it is index.php
			header("Location: profile_index.php");
		}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE posts SET message='$message', title='$title',image='$image' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: profile_index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$message = $res['message'];
	$title = $res['title'];
	$image = $res['image'];

}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="profile_posts.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_posts.php">
		<table border="0">
			<tr> 
				<td>Title:</td>
				<td><input type="text" name="title" required="true" value="<?php echo $title;?>"></td>
			</tr>
			<tr> 
				<td>Message:</td>
				<td><input type="text" name="message" required="true" value="<?php echo $message;?>"></td>
			</tr>
			<tr> 
				<td>Image:</td>
				<td><img src="css/<?php echo $image; ?>" width="100px;">
				<input type="file" name="image"  value="<?php echo $image;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
