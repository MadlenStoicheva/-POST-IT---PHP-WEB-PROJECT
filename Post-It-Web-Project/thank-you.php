<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login form</title>
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<style  type="text/css">
				h1 {
				  color: #6D7781;
				  font-family: "Sofia", cursive;
				  font-size: 15px;
				  font-weight: bold;
				  font-size: 6em;
				  text-align: center;
				  margin-bottom: 10px;
				  margin-top: 2em;
				}
				h2 a{
				  text-decoration:none!important;
				  font-family: "Sofia", cursive;
				  font-size: 1.2em;
				  font-weight: bold;
				}
				h2 a:hover{
					color:black!important;
				}
		</style>
	</head>
	<body>
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
		<section>
			<h1>"Thank you!"</h1>
			<h2><a href='login.php'>By Madlen Stoycheva</a></h2>
		</section>
		<footer>
		</footer>
	</body>
</html>