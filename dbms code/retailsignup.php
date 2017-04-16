



<html>
<head>
<title>Sign Up</title>
</head>

<body bgcolor="#EF9A9A">
<h1 align="center"> ONLINE RETAIL MANAGMENT SYSTEM </h1>
<form  method='post'>

<?php 

$fname=$lname=$email=$phone=$submit=$password=$repassword=$address=$username="";

	if(isset($_POST['fname']))
	{$fname= $_POST['fname'];}

	if(isset($_POST['lname']))
	{$lname= $_POST['lname'];}

	if(isset($_POST['username']))
	{$username= $_POST['username'];}

	if(isset($_POST['password']))
	{$password= $_POST['password'];}

	if(isset($_POST['repassword']))
	{$repassword= $_POST['repassword'];}

	if(isset($_POST['address']))
	{$address= $_POST['address'];}

	if(isset($_POST['phone']))
	{$phone= $_POST['phone'];}

	if(isset($_POST['email']))
	{$email= $_POST['email'];}


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

echo "	
<table align='center' border='1' cellpadding='10' bgcolor='#ffffff'>

<tr><td><strong>First Name</strong></td><td> <input type='text' name='fname' value='$fname' /></td></tr>

<tr><td><strong>Last Name</strong></td><td><input type='text' name='lname' value='$lname' /></td></tr>

<tr><td><strong>Username</strong></td><td><input type='text' name='username' value='$username'/></td> </tr>

<tr><td><strong>Email:</strong></td><td><input type='text' name='email' value='$email'/></td></tr>

<tr><td><strong>Phone no.:</strong></td><td><input type='text' name='phone' value='$phone'/></td> </tr>

<tr><td><strong>Password:</strong></td><td><input type='password' name='password' value='$password'/></td> </tr>

<tr><td><strong>Re-Enter Password:</strong></td><td><input type='password' name='repassword' value='$repassword'/></td> </tr>

<tr><td><strong>Address:</strong></td><td><input type='text' name='address' value='$address'/></td> </tr>


<tr><td colspan='2' align='right'><input type='submit' name='submitvalue' value='Sign Up' /></td></tr>

</table>";


?>



</form>

<?php

if(isset($_POST['submitvalue']))
{
	
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['repassword']) && !empty($_POST['address']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$userpassword=$_POST['password'];
		$address=$_POST['address'];
		
		
		
				if(!preg_match("/^[a-zA-Z]*$/",$fname))
				{echo "<p align='center'> Only letters and white space allowed in Name!!</p>";
				exit();}
				elseif(!preg_match("/^[a-zA-Z]*$/",$lname))
				{echo "<p align='center'> Only letters and white space allowed in Name!!</p>";
				exit();}
				elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
				{echo "<p align='center'>Invalid email format!!</p>"; 
				exit();}
				elseif(!preg_match('/^[0-9]{10}+$/',$phone))
				{echo "<p align='center'> Phone number should be of 10 digits!!</p>";
				exit();}
				else
				{
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
					
					$data = "INSERT INTO customer VALUES 
					('$fname','$lname','$username','$email','$phone','$userpassword','$address'); ";
					
					$result = mysqli_query($connect,$data);
					if($result)
					{
						echo "<p align='center'>Congratulations!! Your account have been created!!!<br>Please LOGIN to continue..
						</p>";
					echo"
					<form  method='POST'>
					
						<p align='center'><input type='submit' name='login' value='Login' />
							
					
					</form>
					";
					}
					else
					die(mysqli_error($connect));
					
						
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