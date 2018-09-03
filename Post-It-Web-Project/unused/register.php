<!DOCTYPE HTML>  
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="form_style.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style  type="text/css">
				h2 {
				  color: #6D7781;
				  font-family: "Sofia", cursive;
				  font-size: 15px;
				  font-weight: bold;
				  font-size: 3.6em;
				  text-align: center;
				  margin-bottom: 10px;
				  margin-top: 15px;
				}
		</style>
	</head>
<body style="background-color:white;">  
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
	<h2>Register:</h2>
	<form method="post" id='register' action='insertdata.php' accept-charset='UTF-8'>  
	  <label for="username">Username: </label>
	  <input type="text" name="name" required="true" id='username' placeholder='Username'>
	  <br><br>
	  <label for="password">Password: </label>
	  <input type="password" name="password" required="true" id='password' placeholder='Password'> 
	  <br><br>
	  <label for="email">E-mail: </label>
	  <input type="email" name="email" required="true" id="emailUser" placeholder="@gmail.com">
	  <br><br>
	  <label for="firstname">First Name: </label>
	  <input type="text" name="firstname" required="true" id='firstname' placeholder='First Name'>
	  <br><br>
	  <label for="lastname">Last Name: </label>
	  <input type="text" name="lastname" required="true" id='lastname' placeholder='Last Name'>
	  <br><br>
	  <input type="submit" name="submit" value="Register" id="submit">  
	</form>
	</section
</body>
</html>