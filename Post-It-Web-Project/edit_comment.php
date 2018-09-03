<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$comment = mysqli_real_escape_string($mysqli, $_POST['comment']);	
	//$comment_id = mysqli_real_escape_string($mysqli, $_POST['comment_id']);
	
	// checking empty fields
	if(empty($comment)) {	
			
		if(empty($comment)) {
			echo "<font color='red'>comment field is empty.</font><br/>";
		}
		//if(empty($comment_id)) {
		//	echo "<font color='red'>comment_id field is empty.</font><br/>";
			
		//}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE comments SET comment='$comment' WHERE comment_id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM comments WHERE comment_id=$id");

while($res = mysqli_fetch_array($result))
{
	$comment = $res['comment'];
	$comment_id = $res['comment_id'];

}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
<?php include 'header_logged.php';?>
<style>
<?php include 'css/form_style.css'; ?>
form{
	width: 500px;
}
</style>

	<a class="btn-primary" style="padding:10px;margin:20px;" href="index.php">Home</a>
	<br/><br/>

	<h2 style="text-align:center;">Edit Comment: </h2>
	<form name="form1" method="post" action="edit_comment.php">
		<table border="0">
			<tr> 
				<input type='hidden' name='comment_id' id='commentId'
                    placeholder='CommentId' />
					<input type='hidden' name='comment_id' id='commentSenderId'
                    placeholder='UserId' />
				<td><label>Comment: </label></td>
				<td><input type="text" name="comment" required="true" value="<?php echo $comment;?>"></td>
			</tr>
		<!--	<tr> 
				<td>Message:</td>
				<td><input type="text" name="comment_id" required="true" value="<?php echo $comment_id;?>"></td>
			</tr>-->
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="btn-success" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
