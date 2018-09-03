<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

echo 'message';
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE user_id=$id");
$postRes = mysqli_query($mysqli, "DELETE FROM posts WHERE user_id=$id");
$comentRes = mysqli_query($mysqli, "DELETE FROM comments WHERE user_id=$id");

//redirecting
header("Location: logout.php");

?>