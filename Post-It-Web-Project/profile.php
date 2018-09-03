<?php include 'header_logged.php';?>
<style>
<?php include 'css/style.css';?>
  h1{
		font-family: "Sofia", cursive;
		font-size: 50px;
		font-weight: bold;
		text-align:center;
		margin:1em;;
	  }
</style>

		<section>
			<h1 style="text-align:center;">Profile: </h1>
			<div class="col-md-offset-4">
			<?php 
				while($row = mysqli_fetch_array($result)){
				echo "<div class='container'>
				<h4><label>Username: </labe></h4>";
				echo "<div>" . $row['user_name'] . "</div></div>";
				
				echo "<div class='container'>
				<h4><label>E-mail: </label></h4><div>" . $row['user_email'] . "</div></div>";
				
				//echo "<div class='container'>
				//<h3>Password: </h3><div>" . $row['user_password'] . "</div></div>";
				echo "<div class='container'>
				<h4><label>Firstname:</label></h4><div>" . $row['user_firstname'] . "</div></div>";
				
				echo "<div class='container'>
				<h4><label>Lastname</label></h4><div>" . $row['user_lastname'] . "</div>";
				echo "</div><br><br>";
				echo "<div class='col-md-offset-4'><a class='btn-info' style='padding:10px;' href=\"edit_profile.php?id=$row[user_id]\">Edit</a>  <a class='btn-danger' style='padding:10px;' href=\"delete_profile.php?id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></div>
		";
				}
			?>
			</div>
		</section>
		
</body>
</html>