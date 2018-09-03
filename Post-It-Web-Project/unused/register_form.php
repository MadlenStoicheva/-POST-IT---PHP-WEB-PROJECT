<?php 
	require "connect.php";

	$data = $_POST;

	if ( isset($data['register']) )
	{
		$errors = [];

		if ( trim( $data['username'] ) == '') 
			$errors[] = 'Enter your username!';

		if ( $data['password'] == '') 
			$errors[] = 'Enter your password!';

		if ( trim( $data['firstname'] ) == '') 
			$errors[] = 'Enter your firstname!';

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
			$insertUser =  mysqli_query($mysqli,
				"INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_firstname`, `user_lastname`) 
				VALUES ( '" . trim( $data['username'] ) . "', '" . trim( $data['email'] ) . "', '" . trim( $data['password'] ) . "', '" . trim( $data['firstname'] ) . "', '" . trim( $data['lastname'] ) . "'))"
			);

			$_SESSION['registed_user'] = 1;

			echo '<div style="color: green;">You are registered!</div><hr>';
		} else
			echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
	}
	
	mysqli_close( $link );
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	
</head>
<body>
	<strong><a href="/MyProject">Home Page</a></strong>
	<?php if( isset($_SESSION['is_authorized']) ): ?>
		<strong>Now you can go to <a href="login.php">login</a> page!</strong>
	<?php else: ?>
		<form action="register_form.php" method="POST">
			<div>
				<p><strong>Your username</strong></p>
				<input type="text" name="username"  value="<?= @$data['username'] ?>">
				<p><strong>Your password</strong></p>
				<input type="password" name="password">
				<p><strong>Your First Name</strong></p>
				<input type="text" name="firstname" value="<?= @$data['firstname'] ?>">
				<p><strong>Your Last Name</strong></p>
				<input type="text" name="lastname" value="<?= @$data['lastname'] ?>">
				<p><strong>Your Email</strong></p>
				<input type="text" name="email" value="<?= @$data['email'] ?>">
			</div><br>
			<button type="submit" name="register">Register</button>
		</form>
	<?php endif; ?>
</body>
</html>
