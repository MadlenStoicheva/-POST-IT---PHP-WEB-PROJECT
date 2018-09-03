<?php 
	session_start();
	include_once("config.php");
	
	
	if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) {	
		
	} else {
		header("location: index.php");
	}
	
	$allPosts = [];
	$result = mysqli_query( $mysqli,
		"SELECT * FROM posts ORDER BY id DESC"
	);
	while( $posts = mysqli_fetch_assoc($result) )
		array_push($allPosts, $posts);

	$allComments = [];
	$sql = mysqli_query( $mysqli, 
		"SELECT * FROM comments"
	);
	
	while( $comments = mysqli_fetch_assoc($sql) )
		array_push($allComments, $comments);
	
	
	$allUsers = [];
	$userResult =  mysqli_query( $mysqli,
		"SELECT * FROM users ORDER BY user_id DESC"
	);
	
	while( $users = mysqli_fetch_assoc($userResult) )
		array_push($allUsers, $users);
	
	
	
	mysqli_close( $mysqli );
?>

<!DOCTYPE html>
<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/index_page.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	  h1{
		font-family: "Sofia", cursive;
		font-size: 45px;
		font-weight: bold;
		text-align:center;
	  }
  </style>
  
</head>
<body>
	
	<?php include 'header-index.php'?> 
	
<?php if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) : ?>
	
	<h1 class="col-md-12">My Posts</h1>

	
	<div>
		<form class='form-horizontal' action='add_post.php' method='post' name='form1'>
		<aside class='container-form col-md-offset-3'>	
				<div class='form-group'>
					<h4 style='text-align:center;'><b>Add Post:</b></h4>
					
					<div class='col-sm-10 col-sm-offset-3'>
						<label>Title:</label>
						<input type='text' name='title'>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-12'>
						<!--<label>Post:</label>-->
						<textarea name='message' class='post' required='true'></textarea>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-10 col-sm-offset-3'>
						<!--<label>Image:</label>-->
						<input class='file' type='file' name='image' required='true'>
					</div>
				</div>
				<div class='form-group'>        
					<div class='col-sm-12'>
						<input id='form-button' class='btn-success' type='submit' name='Submit' required='true' value='Add'>
					</div>
				</div>
		</aside>
	</form>
	</div>
	
<?php endif; ?>
	
	<div class="all-containers">

		<?php for ( $i = 0; $i < count( $allPosts ); ++$i ): ?>
		<?php if($_SESSION['user_id'] == $allPosts[$i]['user_id']) : ?>
				<div class='box-container col-md-3'>
				<form action="add_post.php" method="POST">
					<h2 class='box-title'><?= $allPosts[$i]['title'] ?></h2>
					<input type="hidden" name="title" value="<?= $allPosts[$i]['title'] ?>">
					<img src="img/<?= $allPosts[$i]['image']?>"><br>
					<input type="hidden" name="image" value="<?= $allPosts[$i]['image'] ?>">
					<p class='box-message'><?= $allPosts[$i]['message'] ?></p>
					<input type="hidden" name="description" value="<?= $allPosts[$i]['message'] ?>">
					<input type="hidden" name="id" value="<?= $allPosts[$i]['id'] ?>">

					<?php if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) : ?>
					<?php if ( $_SESSION['user_id'] == $allPosts[$i]['user_id'] ): ?>
						
						<?php foreach ($result as $res) {
							if($allPosts[$i]['id']==$res['id']){
							echo "<div class='box-buttons col-md-offset-7'><a class='btn-info' style='padding:5px;'  href=\"edit_posts.php?id=$res[id]\">Edit</a> <a class='btn-danger' style='padding:5px;' href=\"delete_posts.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></div>
							";}
						}?>
						<?php endif; ?>
						
						<?php foreach ($userResult as $resUser) {
							if($resUser['user_id']==$allPosts[$i]['user_id']){
								echo "<b>This post was posted By: " .$resUser['user_name']. "</b>";
								echo "<br>";
							;}
						}?>
						
					<?php endif; ?>
					
				</form>
				
				<h3>Comments</h3>

				<?php for ( $j = 0; $j < count( $allComments ); ++$j ): ?>
					<?php if ( $allComments[$j]['post_id'] == $allPosts[$i]['id'] ): ?>
					<div class="commentche" >
						<p><?= $allComments[$j]['comment'] ?></p>
						
						<?php if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) : ?>
						<?php foreach ($sql as $com) {
							if($allComments[$j]['comment_id']==$com['comment_id'] && $com['user_id']==$_SESSION['user_id']){
							echo "<div class='comment-buttons col-md-0'><a class='btn-info' style='padding:5px;'  href=\"edit_comment.php?id=$com[comment_id]\">Edit</a> <a class='btn-danger' style='padding:5px;' href=\"delete_comment.php?id=$com[comment_id]\" onClick=\"return confirm('Are you sure you want to delete this comment?')\">Delete</a></div>
							";}
						}?>
						<?php endif; ?>
											
						<?php foreach ($userResult as $resUser) {
							if($resUser['user_id']==$allComments[$j]['user_id']){
								echo "<b>This comment was posted By: " .$resUser['user_name']. "</b>";
								echo "<br>";
								break;
							;}
						}?>
			
					</div>
					<?php endif; ?>
					
				<?php endfor; ?>
	
				
				<?php if ( isset($_SESSION['is_authorized']) ): ?>
					<form id='frm-comment'  action="add_comment.php" method="POST">
						<br>
						<textarea id="comment" name="comment" cols="40" rows="4" placeholder="Write your comment..."></textarea><br>
						<input type="hidden" name="post_id" value="<?= $allPosts[$i]['id'] ?>">
						<input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
						<input type='submit' name='SubmitComment' class='btn-success col-md-offset-7' id='submitButton'
                    value='Add Comment' />
					</form>
				
				<?php endif; ?>
			</div>	
			<?php endif; ?>
		<?php endfor; ?>
	
	</div>
</body>
</html>