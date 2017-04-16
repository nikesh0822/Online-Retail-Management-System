<html>
<head>
<title>PRODUCT MODIFY</title>
</head>
<body bgcolor="##40C4FF">
<table bgcolor="#0091EA" align="center" style="width:100%" height="20%" >
<!-- <td><img src="http://localhost:8080/myphp/vitlogo.jpg" alt="VIT UNIVERSITY" style="width:250px;height:130px;"></td> -->
<td  width="100%"><h1 align="center">ONLINE RETAIL MANAGEMENT SYSTEM</h1></td>
</table>
<form method="post">
<?php
	
	$mregno="";
	if(isset($_POST['mregno']))
	{$mregno= $_POST['mregno'];}
	echo"<p align='center'><strong>Welcome to Student Data Modification!!</strong></p>";
	echo"
	<p align='center'><strong>Enter the Registration Number:<input type='text' name='mregno' value='$mregno'>
	<input type='submit' name='ok' value='OK'><strong></p>
	";
?>




<?php
if(isset($_POST['ok']))
{ 

		if(!empty($_POST['mregno']) )
		{
			$mregno1 = $_POST['mregno'];
			
			//validation
			$regex='/^\d{2}[a-zA-Z]{3}\d{4}/';
			if(!preg_match($regex,$mregno1))
			{echo " <p align='center'> Invalid Registration Number Format!!</p>";exit();}
			$mname=$mfname=$mprogram=$mcity=$memail=$mphno=$mgender=$mfee="";
			
			$row_count=0;
			$host="localhost";
			$user="harsh";
			$password="";
			$database="mydb";
			$connect=mysqli_connect($host,$user,$password,$database);
			if($connect)
					{//echo "<p align='center'>Connected to the server...!!";
					}
			else
			die(mysqli_error());
		
			/*$select = mysql_select_db("mydb");
			if($select)
					{//echo "<p align='center'>Selected Database...!!";
					}
			else
			die(mysql_error());*/
		
			$query = "SELECT*
						FROM student
						WHERE registration_number='$mregno1'";
				
			$result = mysqli_query($connect,$query) or die(mysqli_error());
			
			while($rows = mysqli_fetch_assoc($result))
			{
				$row_count++;
				extract($rows);
				echo "	<form method='post'>
					<table align='center' border='1' cellpadding='10' bgcolor='#00B8D4'>

					<tr><td><strong>Registration no.:</strong></td><td> <input type='text' name='mregno2' value='$registration_number' /></td></tr>

					<tr><td><strong>Name: </strong></td><td><input type='text' name='mname' value='$name' /></td></tr>

					<tr><td><strong>Father's Name:</strong></td><td><input type='text' name='mfname' value='$fname'/></td> </tr>";
	if($rows['gender']=='male')
	{
					echo "<tr><td><strong>Gender:</strong></td><td><input type='radio' name='mgender' value='male' checked='checked'>Male
			  							 <input type='radio' name='mgender' value='female'>Female</td></tr>";
	}
	else
	{
		echo "<tr><td><strong>Gender:</strong></td><td><input type='radio' name='mgender' value='male'>Male
			  							 <input type='radio' name='mgender' value='female' checked='checked'>Female</td></tr>";
	}
										 
					echo"<tr><td><strong>Program:</strong></td><td>
					<select name='mprogram'>
 					 <option value='CSE'>CSE</option>
 					 <option value='EEE'>EEE</option>
 					 <option value='ECE'>ECE</option>
					  <option value='MECH'>MECH</option>
 					 <option value='CIVIL'>CIVIL</option>
					</select></td></tr>

					<tr><td><strong>City:</strong></td><td><input type='text' name='mcity' value='$city'/></td> </tr>

					<tr><td><strong>Email:</strong></td><td><input type='text' name='memail' value='$email'/></td></tr>

					<tr><td><strong>Phone no.:</strong></td><td><input type='text' name='mphno' value='$phone_number'/></td> </tr>";



					if($rows['fee_status']=='paid')
						{
							echo "<tr><td><strong>Fee submission:</strong></td><td><input type='radio' name='mfee' value='paid' 	checked='checked'>Paid <input type='radio' name='mfee' value='not_paid'>Not Paid</td> </tr>";
						}
					else
						{
							echo "<tr><td><strong>Fee submission:</strong></td><td><input type='radio' name='mfee' value='paid' >Paid <input type='radio' name='mfee' value='not_paid' checked='checked'>Not Paid</td> </tr>";
						}





			echo "<tr><td colspan='2' align='right'><input type='submit' name='msubmitvalue' value='submit' /></td></tr>

					</table>";
			echo "<p align='center'><input type='submit' name='mexit' value='Exit'></form>";
				
			}
			
			



			
			echo "</table>";
			
			//mysql_close($connect);
			if($row_count==0)
			{echo"<p align='center'><strong>Sorry!!! No student with registration number: '$mregno1'</strong></p>";}
			

			
		}
		else
		{echo " <p align='center'>Please enter a registartion number";}
		
	
}



if(isset($_POST['msubmitvalue']))
{
		$mregno3 = $_POST['mregno'];
	if(!empty($_POST['mregno2']) && !empty($_POST['mname']) && !empty($_POST['mfname']) && !empty($_POST['mprogram']) && !empty($_POST['mcity']) && !empty($_POST['memail']) && !empty($_POST['mphno']) && !empty($_POST['mgender']) && !empty($_POST['mfee']))
			{
				$mregno2= $_POST['mregno2'];
				$mname= $_POST['mname'];
				$mfname= $_POST['mfname'];
				$mprogram= $_POST['mprogram'];
				$mcity= $_POST['mcity'];
				$memail= $_POST['memail'];
				$mphno= $_POST['mphno'];
				$mgender= $_POST['mgender'];
				$mfee= $_POST['mfee'];
				
				$regex='/^\d{2}[a-zA-Z]{3}\d{4}/';
				if(!preg_match($regex,$mregno2))
				{echo " <p align='center'> Invalid Registration Number Format!!</p>";exit();}
				elseif (!preg_match("/^[a-zA-Z ]*$/",$mname))
				{echo "<p align='center'> Only letters and white space allowed in Name!!</p>";exit();}
				elseif(!filter_var($memail, FILTER_VALIDATE_EMAIL))
				{echo "<p align='center'>Invalid email format!!</p>"; exit();}
				elseif(!preg_match('/^[0-9]{10}+$/',$mphno))
				{echo "<p align='center'> Phone number should be of 10 digits!!</p>";exit();}
				
				else
				{
					//DATABASE CONNECT AFTER VALIDIATION.....
					$flag=0;
					$host="localhost";
					$user="harsh";
					$password="";
					$database="mydb";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{echo "<p align='center'>Connected to the server...!!";}
					else
					die(mysqli_error());
		
					/*$select = mysql_select_db("mydb");
					if($select)
					{echo "<p align='center'>Selected Database...!!";}
					else
					die(mysql_error());*/
					
					
					$update="UPDATE student
							 SET registration_number='$mregno2',
							 	 name ='$mname' , 
								 fname ='$mfname' ,
								 gender ='$mgender' ,
								 program ='$mprogram' ,
								 city ='$mcity' , 
								 email ='$memail' ,
								 phone_number ='$mphno' ,
								 fee_status ='$mfee'
							 WHERE registration_number = '$mregno3' ";
					$result=mysqli_query($connect,$update) or die(mysqli_error());
					if($result)
					echo " <p align='center'>Your data is modified into the database...!!";
					else
					die(mysqli_error());
					}
			}
			echo "<p align='center'><input type='submit' name='mexit' value='Exit'></form>";
}
if(isset($_POST['mexit']))
{
	$exit = header("location: studentindex.php");
}

?>

</form>
</body>
</html>