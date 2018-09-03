<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['user_id']);
	
	$user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);	
	$user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
	$user_password = mysqli_real_escape_string($mysqli, $_POST['user_password']);
	$user_password = md5($user_password); 
	$user_firstname = mysqli_real_escape_string($mysqli, $_POST['user_firstname']);
	$user_lastname = mysqli_real_escape_string($mysqli, $_POST['user_lastname']);
	
	// checking empty fields
	if(empty($user_name) || empty($user_email) || empty($user_password) || empty($user_firstname) || empty($user_lastname)) {	
			
		if(empty($user_name)) {
			echo "<font color='red'>user_name field is empty.</font><br/>";
		}
		if(empty($user_email)) {
			echo "<font color='red'>user_email field is empty.</font><br/>";	
		}
		if(empty($user_password)) {
			echo "<font color='red'>user_password field is empty.</font><br/>";	
		}
		if(empty($user_firstname)) {
			echo "<font color='red'>user_firstname field is empty.</font><br/>";	
		}
		if(empty($user_lastname)) {
			echo "<font color='red'>user_lastname field is empty.</font><br/>";	
		}
		
		
		//if(empty($image)) {
			//echo "<font color='red'>Image field is empty.</font><br/>";
			//$result = mysqli_query($mysqli, "UPDATE posts SET message='$message', title='$title' WHERE id=$id");
		
			// //redirectig to the display page. In our case, it is index.php
			//header("Location: profile_index.php");
		//}
				
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET user_name='$user_name', user_email='$user_email',user_password='$user_password',
		user_firstname='$user_firstname', user_lastname='$user_lastname' WHERE user_id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: profile.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id=$id");

while($res = mysqli_fetch_array($result))
{
	$user_name = $res['user_name'];
	$user_email = $res['user_email'];
	$user_password = md5($res['user_password']);
	$user_firstname = $res['user_firstname'];
	$user_lastname = $res['user_lastname'];

}
?>
<?php include 'header_logged.php';?>
<style>
<?php include 'css/form_style.css'; ?>
</style>

<div class="form-horizontal">
	<a href="profile.php" class="btn-primary" style="padding:10px;margin:20px;">Back to Profile</a>
	<br/><br/>
		<h2 style="text-align:center;">Edit Profile: </h2>

	<div class="col-md-12">
	<form name="profile_edit" method="post" action='edit_profile.php'>  
		<table border="0">
			<tr> 
			  <td><label>Username: </label></td>
			  <td><input type="text" name="user_name" required="true" value="<?php echo $user_name;?>"></td>
			</tr>
			<tr> 
			  <td><label>Password: </label></td>
			  <td><input type="password" name="user_password" required="true" value="<?php echo $user_password;?>"> </td>  
			</tr>
			<tr> 
			  <td><label>E-mail: </label></td>
			  <td><input type="email" name="user_email" required="true" value="<?php echo $user_email;?>"></td>
			</tr>
			<tr> 
			  <td><label>First Name: </label></td>
			  <td><input type="text" name="user_firstname" required="true" value="<?php echo $user_firstname;?>"></td>
			</tr>
			<tr> 
			  <td><label>Last Name: </label></td>
			  <td><input type="text" name="user_lastname" required="true" value="<?php echo $user_lastname;?>"></td>
			</tr>
			<tr>
			  <td><input type="hidden" name="user_id" value=<?php echo $_GET['id'];?>></td>
			  <td><input class="btn-success" type="submit" name="update" value="Update" id="update"></td>
			</tr>		  
		</table>
	</form>
</div>
</div>

</body>
</html>
