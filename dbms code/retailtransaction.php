<?php
session_start();
?>

<html>
<head>
<title>Login</title>
</head>

<body bgcolor="#EF9A9A">

<h1 align="center"> ONLINE RETAIL MANAGMENT SYSTEM </h1>

<form method='post'>
<?php

	$username=$email="";
	if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
	}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location: http://localhost:8080/myphp/retailindex.php");
	exit();
}
echo "<input type='submit' name='logout' value='Logout'>"
	."<div align='right'>Welcome ".$username." <br>". $email."</div>";



?>
</form>

	<h2 align="center">Connecting to Online Transaction Portal . . .</h2>