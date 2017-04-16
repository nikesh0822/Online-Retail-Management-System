<html>
<head>
<title>PRODUCT DELETE</title>
</head>
<body bgcolor="#40C4FF">
<table bgcolor="#0091EA" align="center" style="width:100%" height="20%" >
<!-- <td><img src="http://localhost:8080/myphp/vitlogo.jpg" alt="VIT UNIVERSITY" style="width:250px;height:130px;"></td> -->
<td  width="100%"><h1 align="center">ONLINE RETAIL MANAGEMENT SYSTEM</h1></td>
</table>
<form method="post">
<?php

	$pid="";
	if(isset($_POST['pid']))
	{$pid= $_POST['pid'];}
	echo"<p align='center'><strong>Delete Products!!!</strong>";
	echo"
	<p align='center'><strong>Enter the ProductID:<input type='text' name='pid' value='$pid'>
	<input type='submit' name='ok' value='OK'> &nbsp; <input type='submit' name='exit' value='Exit'><strong></p>
	";
?>



<?php
if(isset($_POST['ok']))
{ 

		if(!empty($_POST['pid']) )
		{
			$pid = $_POST['pid'];
			
			//validation
			
			
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
						FROM product
						WHERE id='$pid'";
				
			$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
			echo "<table border='1' bgcolor='#00B8D4' align='center'>
			<tr>
					<td><strong>Product_ID</strong></td>
					<td><strong>Product Name</strong></td>
					<td><strong>Cost</strong></td>
					<td><strong>Category</strong></td>
					<td><strong>Quantity</strong></td>
					<td><strong>Description</strong></td>
			</tr>	";
			while($rows = mysqli_fetch_assoc($result))
			{
				$row_count++;
				extract($rows);
				echo "<br>";
				echo "
				
				<tr bgcolor='#FFFFCC'>
					<td>$id</td>
					<td>$p_name</td>
					<td>$p_cost</td>
					<td>$p_category</td>
					<td>$p_quantity</td>
					<td>$p_description</td>
				</tr>";
			}
			echo "</table>";
			if($row_count==0)
			{echo"<p align='center'> <strong>Sorry!!! No Product with productID: '$pid'</strong></p>";exit();}
			
			
			echo "<form method='post'><p align='center'><input type='submit' name='delete' value='Delete'></form>";
		}
}

if(isset($_POST['delete']))
{
	echo "<p align='center'>Are you sure you want to delete this product ? </p>";
	echo "<form method='post'><p align='center'><input type='submit' name='yes' value='YES'>
												<input type='submit' name='no' value='NO' selected></form>";
}

if(isset($_POST['yes']))
{
			$pid = $_POST['pid'];
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
			
			$delete = "DELETE FROM product 
       				   WHERE p_id = '$pid'" ;
			$result = mysqli_query($connect,$delete);
			if($result)
			{
			echo "<p align='center'>Record Deleted..!!</p>";
			
	
			}
			else
			die(mysqli_error());
			
}

if(isset($_POST['no']))
{
	$no = header("location: productdelete.php");
}


if(isset($_POST['exit']))
{
	$no = header("location: retailproducts.php");
}


?>

</form>
		
</body>
</html>
