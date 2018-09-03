<?php
//including the database connection file
session_start();
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM posts ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM posts ORDER BY id DESC"); // using mysqli_query instead
$commentResult = mysqli_query($mysqli, "SELECT * FROM comments ORDER BY comment_id DESC");



if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) {
	
	
} else {
	header("location: login.php");
	//echo "You are not authorized. Go <a href='login.php'>login</a>";
}
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/profile_index.css">
	<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
		<header>
			<nav>
				<ul>
				  <li><a href="profile_index.php">Home</a></li>
				  <li><a href="#">Hello, <?php echo $_SESSION['email']?>!</a></li>
				   <li><a href="profile.php">Profile</a></li>
				  <li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</header>
		<div class="col-md-offset-3">
		<form class="form-horizontal" action="add_post.php" method="post" name="form1">
		<aside class="container-form">	
				<div class="form-group">
					<h4 style="text-align:center;"><b>Add Post:</b></h4>
					
					<div class="col-sm-10 col-sm-offset-3">
						<label>Title:</label>
						<input type="text" name="title">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<!--<label>Post:</label>-->
						<textarea name="message" class="post" required="true"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-3">
						<!--<label>Image:</label>-->
						<input class="file" type="file" name="image" required="true">
					</div>
				</div>
				<div class="form-group">        
					<div class="col-sm-12">
						<input id="form-button" class="btn-success" type="submit" name="Submit" required="true" value="Add">
					</div>
				</div>
		</aside>
	</form>
	</div>
	
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 
		echo "<section class='body-posts'>";
		echo "<div class='box-container col-sm-3'>";
		echo "<div class='box-title'>".$res['title']."</div>";		
		echo "<div>"; ?> <img src="img/<?php echo $res['image']; ?>" width="60%;"><?php echo "</div>";
		echo "<div class='box-message'>".$res['message']."</div>";
		echo "<div class='box-buttons col-md-offset-8'><a class='btn-info' style='padding:5px;'  href=\"edit_posts.php?id=$res[id]\">Edit</a> <a class='btn-danger' style='padding:5px;' href=\"delete_posts.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></div>
		
		
		<form id='frm-comment' action='add_comment.php' method='post'>
			<h5 style='text-align:center;'>Add Comment: </h5>
            <div class='input-row'>
                <textarea class='input-field' type='text' name='comment'
                    id='comment' placeholder='Add a Comment'>  </textarea>
					
					 <input type='hidden' id='post_id' name='post_id' value='"?><?php echo $res['id'] ?><?php echo"'/>
            </div>
            <div>
                <input type='submit' name='SubmitComment' class='btn-success col-md-offset-8' id='submitButton'
                    value='Add Comment' />
            </div>
 </form>
       
			<div id='output'>
			"?><?php 
					echo "<h4><b>Comments: </b></h4>";
							
							$resCom = mysqli_fetch_array($commentResult);
					//	//while($resCom = mysqli_fetch_array($commentResult)){
							if($res['id']==$resCom['post_id']){
							echo "<section class='comment-container'>";
							echo "<div class='comment'>".$resCom['comment']."</div></section>";
							}
							else if($res['id']!=$resCom['post_id'])
							{
							echo "<section class='comment-container'>";
							echo "<div class='comment'>".$resCom['comment']."!</div></section>";
							echo "<br>Tova ne e komentar za tozi post.";
							}else{
								echo "There has no comments yet!";
							}
					
					//	//}
					//echo count($resCom);
					echo "<br><br> tova id na posta" .$res['id'];
					echo "<br>id na comentara kum koi post prinadleji" .$resCom['post_id'];
					?><?php echo "
			
			</div>
		</div>
		</section>
		";	
	
	}
	//while($resCom = mysqli_fetch_array($commentResult)) { 		
	//echo "<section class='box-container'>";
	//echo "<h3>Here are comments</h3>";
	 //echo "<div class='box-userName'>".$res['comment_sender_id']."</div>";
	//echo "<div class='comment'>".$resCom['comment']."</div></section>";}
		//echo "<div class='box-buttons'><a href=\"edit_comment.php?id=$res[id]\">Edit</a> | <a href=\"delete_comment.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></div>
	

	
	?>
	</table>
	
</body>
</html>
