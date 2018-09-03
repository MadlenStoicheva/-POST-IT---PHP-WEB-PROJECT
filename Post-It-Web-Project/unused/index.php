<?php
session_start();
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC");
$commentResult = mysqli_query($mysqli, "SELECT * FROM comments ORDER BY comment_id DESC");


if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) {
	
	header("location: index_page.php");	
}
else{
	
}
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/profile_posts.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
		<header>
			<nav>
				<ul>
				  <li><a href="index.php">Home</a></li>
				  <li><a href="login.php">Login</a></li>
				  <li><a href="register.php">Register</a></li>
				</ul>
			</nav>
		</header>
	
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<section class='box-container'>";
		echo "<div class='box-title'>".$res['title']."</div>";
		//echo "<td>".$res['image']."</td>";
		//echo '<img src="data:image/jpeg;base64,'.base64_encode($image->load()).'"/>';
		echo "<div>"; ?> <img src="img/<?php echo $res['image']; ?>" width="100px;"><?php echo "</div>";
		//echo "<td><img src=".$res['image']."/></td>";
		//echo '<img src="data:image/jpeg;base64,'.base64_encode( $res['image'] ).'"/>';
		echo "<div class='box-message'>".$res['message']."</div>";
		echo "<div class='box-buttons'><a href=\"edit_posts.php?id=$res[id]\">Edit</a> | <a href=\"delete_posts.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></div>
		
		
		<!--<form id='frm-comment' action='add_comment.php' method='post'>
            <div class='input-row'>
                <textarea class='input-field' type='text' name='comment'
                    id='comment' placeholder='Add a Comment'>  </textarea>
            </div>
            <div>
                <input type='submit' name='SubmitComment' class='btn-submit' id='submitButton'
                    value='Publish' />
            </div>

        </form>
			<div id='output'>
			</div>-->
		
		</section>";		
	
	}
	//while($resCom = mysqli_fetch_array($commentResult)) { 		
	//echo "<section class='box-container'>";
	//echo "<h3>Here are comments</h3>";
	// //echo "<div class='box-userName'>".$res['comment_sender_id']."</div>";
	//echo "<div class='comment'>".$resCom['comment']."</div></section>";}
	//	//echo "<div class='box-buttons'><a href=\"edit_comment.php?id=$res[id]\">Edit</a> | <a href=\"delete_comment.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></div>
	

	
	?>
	</table>
	
</body>
</html>
