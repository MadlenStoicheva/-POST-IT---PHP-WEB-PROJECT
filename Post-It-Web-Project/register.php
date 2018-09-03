<?php 
	require "connect.php";

	$data = $_POST;

	$link = mysqli_connect("localhost", "root", "", "myprojectdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
	if ( isset($data['register']) )
	{
		$errors = [];

		if ( trim( $data['username'] ) == '') 
			$errors[] = 'Enter your username!';

		if ( $data['password'] == '') 
			$errors[] = 'Enter your password!';

		if ( trim( $data['firstname'] ) == '') 
			$errors[] = 'Enter your firstname!';
		
		if ( trim( $data['lastname'] ) == '') 
			$errors[] = 'Enter your lastname!';

		if ( trim( $data['email'] ) == '') 
			$errors[] = 'Enter your Email!';

		
		$checkUser = mysqli_query( $link, 
			"SELECT * FROM users WHERE user_name = '" . trim( $data['username'] ) . "'"
		);

		if ($checkUser->num_rows == 1)
			$errors[] = 'This username already exists!';

		$checkEmail = mysqli_query( $link, 
			"SELECT * FROM users WHERE user_email = '" . trim( $data['email'] ) . "'"
		);

		if ( $checkEmail->num_rows == 1 )
			$errors[] = 'This Email already exists!';

		if ( empty( $errors ) ) 
		{
			$username = mysqli_real_escape_string($link, $_REQUEST['username']);
			$email = mysqli_real_escape_string($link, $_REQUEST['email']);
			$password = mysqli_real_escape_string($link, $_REQUEST['password']);
			$password = md5($password); 
			$firstname = mysqli_real_escape_string($link, $_REQUEST['firstname']);
			$lastname = mysqli_real_escape_string($link, $_REQUEST['lastname']);
 
 
			$insertUser =  mysqli_query($mysqli,
				"INSERT INTO users (user_name, user_email, user_password, user_firstname, user_lastname) VALUES ('$username', '$email' ,'$password', '$firstname' , '$lastname')"
			);

			$_SESSION['registed_user'] = 1;
			header('Location: login.php');
			echo '<div class="validation-message" style="color: green;">You are registered!</div>';
		}
	}
	
	mysqli_close( $link );
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
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

	<h2>Register:</h2>
	<?php if( isset($_SESSION['is_authorized']) ): ?>
		<strong>Now you can go to <a href="login.php">login</a> page!</strong>
	<?php else: ?>
		<form action="register.php" method="POST">
			<div>
				<label for="username">Username: </label>
				<input type="text" name="username" required="true" id='username' placeholder='Username' value="<?= @$data['username'] ?>">
				<label for="password">Password: </label>
				<input type="password" name="password" required="true" id='password' placeholder='Password'>
				<label for="firstname">First Name: </label>
				<input type="text" name="firstname" required="true" id='firstname' placeholder='First Name' value="<?= @$data['firstname'] ?>">
				<label for="lastname">Last Name: </label>
				<input type="text" name="lastname" required="true" id='lastname' placeholder='Last Name' value="<?= @$data['lastname'] ?>">
				<label for="email">E-mail: </label>
				<input type="email" name="email" required="true" id="emailUser" placeholder="@E-mail.com" value="<?= @$data['email'] ?>">
				<div><br><?php 
                if(!empty( $errors )) {
                    echo '<div class="validation-message" style="color: red;">* ' . array_shift($errors) . '</div>';;
                }?></div>
			</div>
			<button type="submit" name="register" id="submit">Register</button>
		</form>
	<?php endif; ?>
</body>
</html>
