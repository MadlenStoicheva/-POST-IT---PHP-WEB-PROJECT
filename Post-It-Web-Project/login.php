<?php include 'header.php';?>
<style>
<?php include 'css/style.css';?>
h2{
	margin-top:2em;
}
</style>
		<section>
			<h2>Login:</h2>
			<form action="data.php" method="POST">
				<input type="email" name="email" required="true" id="emailUser" placeholder="E-mail"/>
				<input type="password" name="pass" required="true" id='password' placeholder='Password'/>
				<input type="submit" name="send" value="Login!" id="submit" />
			</form>
		</section>
		<footer>
		</footer>
	</body>
</html>