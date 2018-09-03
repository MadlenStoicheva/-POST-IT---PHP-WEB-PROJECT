<?php
include "config.php";

$link = mysqli_connect($host, $user, $pass, $db);
if(!$link){
	die('Connect Error! ' . mysqli_connect_error());
	
}
