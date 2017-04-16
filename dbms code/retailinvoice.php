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



<?php
$i=0;$j=0;$myid=0;$total = 0;$gt=0;

					$host="localhost";
					$user="harsh";
					$password="";
					$database="mydb";
		
					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{
					}
					else
					die(mysqli_error());
					
					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to server: " . mysqli_connect_error();
  					}
		
					$select = mysqli_select_db($connect,$database);
					if($select)
					{
					}
					else
					die(mysqli_error($connect));
				echo"<h3 align='center'>INVOICE</h3>
					<table border='1' bgcolor='#00B8D4' align='center' width='40%'>
					<tr>
					<td width='20%'><strong><h4 align='center'>Product Name</h4></strong></td>
					<td width='10%'><strong><h4 align='center'>Cost</h4></strong></td>
					<td width='10%'><strong><h4 align='center'>Quantity</h4></strong></td>
					<td width='10%'><strong><h4 align='center'>Total</h4></strong></td>
					</tr>";


while($i<=$_SESSION['count'])
{			


					


	if(!empty($_SESSION['id'][$i]))
	{
					$myid = $_SESSION['id'][$i];
					$myquantity = $_SESSION['quantity'][$i];
					$query = "SELECT*
						FROM product
						WHERE id='$myid'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());

					while($rows = mysqli_fetch_assoc($result))
						{
							extract($rows);
							$total = $p_cost * $myquantity;
							$gt = $gt + $total;
							echo "
								<tr bgcolor='#FFF9C4'>
								<td width='10%'><strong>$p_name</strong></td>
								<td width='10%'><strong>$p_cost/-</strong></td>
								<td width='10%'><strong>".$myquantity."</strong></td>
								<td width='10%'><strong>".$total."</strong></td>
								</tr>
								";


						}
						

						


// print_r($_SESSION['id'][$i]);echo "<br>";
// print_r($_SESSION['quantity'][$i]);echo "<br>";

	}
$i++;
}
echo"</table>";
echo"<table border='1' bgcolor='#00B8D4' align='center' width='40%'>
						<tr>
							
						<td width='41%' align='right'><strong>Grand Total:</strong></td>
						<td width='10%'><strong>".$gt."/-</strong></td>
					</tr></table>";
?> 

<?php
	echo"<form method='post'>
	<p align = 'center'><input type='submit' name='back' value='Go back to shop'>
	<input type='submit' name='proceed' value='Proceed'></p></form>";


	if(isset($_POST['back']))
{
	
	header("location: http://localhost:8080/myphp/retailshop.php");
	exit();
}














if(isset($_POST['proceed']))
{
	$username=$email="";
	if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
	}
	else{echo"some problem";}
	
		// $create = "CREATE TABLE invoice(
						
		// 				order_date DATE NOT NULL,
		// 				customer_email VARCHAR(50) NOT NULL,
		// 				product_name VARCHAR(30) NOT NULL,
		// 				product_category VARCHAR(40) NOT NULL,
		// 				product_cost INT(10) NOT NULL,
		// 				product_quantity INT(10) NOT NULL,
		// 				total_cost int(10) NOT NULL
						
		// 				)";
						
		// 			$result = mysqli_query($connect,$create);
		// 			if($result)
		// 			echo"table created";
		// 			else
		// 			die(mysqli_error($connect));

$i=0;$myid=0;$total = 0;

while($i<=$_SESSION['count'])
{			
				if(!empty($_SESSION['id'][$i]))
				{
					$myid = $_SESSION['id'][$i];
					$myquantity = $_SESSION['quantity'][$i];
					
					$query = "SELECT*
						FROM product
						WHERE id='$myid'";
					$result = mysqli_query($connect,$query) or die(mysqli_error());

					while($rows = mysqli_fetch_assoc($result))
						{
							extract($rows);
							$total = $p_cost * $myquantity;

							$query = "INSERT INTO invoice (order_date,customer_email,product_name,product_category,product_cost,product_quantity,total_cost) VALUES 
							(now(),'$email','$p_name','$p_category',$p_cost,$myquantity,$total)";
							$result = mysqli_query($connect,$query);
							if($result)
							echo"RECORD ENTERED!!!";
							else
							die(mysqli_error($connect));
								
						 }
				}
				$i++;
}

					header("location: http://localhost:8080/myphp/retailtransaction.php");
					exit();

}



?>
	

</body>
</html>