<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

echo 'message';
//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM posts WHERE id=$id");
$comentRes = mysqli_query($mysqli, "DELETE FROM comments WHERE post_id=$id");

//redirecting
header("Location: index.php");
?>

