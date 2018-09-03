<?php 
	include("connect.php");
	if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true){
	while( $users = mysqli_fetch_assoc($userResult) )
		array_push($allUsers, $users);
	
	$sqluser = "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."' ";
	$resultche = mysqli_query($link, $sqluser);
	$row = mysqli_fetch_assoc($resultche);

	
	mysqli_close( $mysqli );
	}
?>

<!DOCTYPE html>
<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
	
	
<?php if( isset($_SESSION['is_authorized']) && $_SESSION['is_authorized'] == true) : ?>
	
	<header>			
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" style="font-family: 'Sofia', cursive; font-size: 2em;
		  font-weight: bold;" href="#">PostIt</a>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li><a href="index.php">Hello, <?php echo $row['user_name'];?></a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="my_posts.php">My Posts</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="logout.php">Logout</a></li>
			  </ul>
			  </ul>
			</div>
		  </div>
		</nav>
	</header>
	<?php endif; ?>	
	<?php if(!array_key_exists('is_authorized',$_SESSION)): ?>

	<header>			
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" style="font-family: 'Sofia', cursive; font-size: 2em;
			  font-weight: bold;" href="#">PostIt</a>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
				  </ul>
				  </ul>
				</div>
			  </div>
			</nav>		
		</header>
	
<?php endif; ?>	