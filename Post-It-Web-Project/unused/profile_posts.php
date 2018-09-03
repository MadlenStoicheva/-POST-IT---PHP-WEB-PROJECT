<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM posts ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/profile_posts.css">
	<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
		<header>
			<nav>
				<ul>
				  <li><a class="active" href="#home">Home</a></li>
				  <li><a href="login.php">Login</a></li>
				  <li><a href="register.php">Register</a></li>
				</ul>
			</nav>
		</header>
				
		<form class="form-horizontal" action="add_post.php" method="post" name="form1">
		<div class="container-form">
				<div class="form-group">
					<div div class="col-sm-10">
						<label>Title:</label>
						<input type="text" name="title">
					</div>
				</div>
				<div class="form-group">
					<div div class="col-sm-10">
						<label>Message</label>
						<input type="text" name="message" required="true">
					</div>
				</div>
				<div class="form-group">
					<div div class="col-sm-10">
						<label>Image:</label>
						<input type="file" name="image" required="true">
					</div>
				</div>
				<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" name="Submit" required="true" value="Add">
					</div>
				</div>
		</div>
		<!--<table width="25%" border="0">
			<tr> 
				<td>Title:</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr> 
				<td>Message</td>
				<td><input type="text" name="message" required="true"></td>
			</tr>
			<tr> 
				<td>Image:</td>
				<td><input type="file" name="image" required="true"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" required="true" value="Add"></td>
			</tr>
		</table>-->
	</form>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>POST:</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['title']."</td>";
		//echo "<td>".$res['image']."</td>";
		//echo '<img src="data:image/jpeg;base64,'.base64_encode($image->load()).'"/>';
		echo "<td>"; ?> <img src="img/<?php echo $res['image']; ?>" width="100px;"><?php echo "</td>";
		//echo "<td><img src=".$res['image']."/></td>";
		//echo '<img src="data:image/jpeg;base64,'.base64_encode( $res['image'] ).'"/>';
		echo "<td>".$res['message']."</td>";
		echo "<td><a href=\"edit_posts.php?id=$res[id]\">Edit</a> | <a href=\"delete_posts.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}

	?>
	</table>
</body>
</html>
