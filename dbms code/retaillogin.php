<?php
session_start();
?>


<html>
<head>
<title>Login</title>
</head>

<body bgcolor="#EF9A9A">
<h1 align="center"> ONLINE RETAIL MANAGMENT SYSTEM </h1>
<form  method='post'>

<?php 

$password=$username="";

	

	if(isset($_POST['username']))
	{$username= $_POST['username'];}

	if(isset($_POST['password']))
	{$password= $_POST['password'];}

	


/*echo"<div align='center'>
<p>FIRST NAME:<input type='text' name='fname' id='fname' value='$fname'/>
<p>LAST NAME:<input type='text' name='lname' value='$lname'/>
<p>USERNAME:<input type='text' name='username' value='$username'/>
<p>EMAIL:<input type='email' name='email' value='$email'/>
<p>PHONE NO.:<input type='text' name='phone' value='$phone'/>
<p>PASSWORD:<input type='password' name='password' value='$password'/>
<p>RETYPE PASSWORD:<input type='password' name='repassword' value='$repassword'/>
<p>ADDRESS:<input type='text' name='address' value='$address'/>
<input  align='right' type='button' name='submitvalue' value='submit' />
</div>";*/

echo "	<br><br><br><br><br><br>
<table align='center' border='1' cellpadding='10' bgcolor='#B3E5FC'>
<tr><td><strong>Username</strong></td><td><input type='text' name='username' value='$username'/></td> </tr>
<tr><td><strong>Password:</strong></td><td><input type='password' name='password' value='$password'/></td> </tr>
<tr><td colspan='2' align='right'><input type='submit' name='submitvalue' value='Sign Up' /></td></tr>
	</table>";
?>
</form>



<?php

if(isset($_POST['submitvalue']))
{
	
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		
					$myusername= $_POST['username']; 
					$mypassword= $_POST['password']; 
				$row_count="";
					//DATABASE CONNECT AFTER VALIDIATION.....
					//$flag=0;
					$host="localhost";
					$user="harsh";
					$password="";
					$database="mydb";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{//echo "Connected to the server...!!";
					}
					else
					die(mysqli_error());
					
					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to server: " . mysqli_connect_error();
  					}
		
					$select = mysqli_select_db($connect,$database);
					if($select)
					{//echo "Selected Database...!!";
					}
					else
					die(mysqli_error($connect));
					
					/*$create = "CREATE TABLE customer(
						fname VARCHAR(30) NOT NULL,
						lname VARCHAR(30) NOT NULL,
						username VARCHAR(30) PRIMARY KEY NOT NULL,
						email VARCHAR(30) NOT NULL,
						phone BIGINT(10) NOT NULL,
						password VARCHAR(50) NOT NULL,
						address VARCHAR(50) NOT NULL
						)";
						
					$result = mysqli_query($connect,$create);
					if($result)
					echo"table created";
					else
					die(mysqli_error($connect));*/


					
					
					$myusername = mysqli_real_escape_string($connect,$_POST['username']);
					$mypassword = mysqli_real_escape_string($connect,$_POST['password']);

					// Retrieve username and password from database according to user's input
						$login = mysqli_query($connect, " SELECT email FROM customer WHERE username = '$myusername'
						 and password = '$mypassword' ") or die(mysqli_error($connect));

						while($rows = mysqli_fetch_assoc($login))
						{
							extract($rows);
							$_SESSION['email'] = $email;


						}

						
						// Check username and password match
						$row_count = mysqli_num_rows($login);
						
						if (mysqli_num_rows($login) == 1) {
						// Set username session variable
						$_SESSION['username'] = $_POST['username'];
						
						// Jump to secured page
						header('Location: retailshop.php');
						}
						else {
						// Jump to login page
							echo "<div align='center'><strong>Invalid Username or Password</strong></div>";
						}

							}
							
							else
							{
								echo "<div align='center'><b>Please enter all fields</b></div>";	
							}
							
							
						}

else
{}

if(isset($_POST['login']))
{
	header("location: retaillogin.php");
}

?>

</body>
</html>