<html>
<head>
<title>PRODUCT SEARCH</title>
</head>
<body bgcolor="#40C4FF">
<table bgcolor="#0091EA" align="center" style="width:100%" height="20%" >
<!-- <td><img src="http://localhost:8080/myphp/vitlogo.jpg" alt="VIT UNIVERSITY" style="width:250px;height:130px;"></td> -->
<td  width="100%"><h1 align="center">ONLINE RETAIL MANAGEMENT SYSTEM</h1></td>
</table>
<form method="post">
<?php
	echo "<p align='center'><strong>Welcome to Product Search!!!</strong></p>";
	echo "<p align='center'>Search By:
		  <select name='search'>
		   <option  value='nil'>Select</option>
		   <option  value='pid1'>Product ID</option>
		   <option  value='pname1'>Product Name</option>
 		   <option  value='cost1'>Product Cost</option>
		   <option  value='category1'>Product Category</option>
 		   </select>
		   <input type='submit' name='ok' value='OK'></p>
		   ";
		   
?>
</form>
</body>
</html>

<form method="post">
<?php
	if(isset($_POST['ok']))
	{
		if(!empty($_POST['search']))
		{
			if($_POST['search']=='pid1')
			{
					echo "<p align='center'>Enter Product ID:<input type='text' name='spid'>
					<input type='submit' name='ok1' value='OK'></p>";
					
			}
			elseif($_POST['search']=='pname1')
			{
					echo "<p align='center'>Enter Product Name:<input type='text' name='spname'>
					<input type='submit' name='ok2' value='OK'></p>";
			}
			elseif($_POST['search']=='category1')
			{
					echo "<p align='center'>Choose the Category:
		  					<select name='scategory'>
 							<option value='Fruits&Vegetables'>Fruits&Vegetables</option>
  							<option value='grocery'>Grocery</option>
  							<option value='beverages'>Beverages</option>
  							<option value='snacks'>Snacks</option>
  							<option value='others'>Others</option>
							</select>
		  				    <input type='submit' name='ok3' value='OK'></p> ";
			}
			
			elseif($_POST['search']=='cost1')
			{
					echo "<p align='center'>Enter The Product Cost:<input type='text' name='scost'>
					<input type='submit' name='ok4' value='OK'></p>";
			}
			
			else
			{echo "<p align='center'><strong>Select an Option</strong></p>";}
		}
	}
?>
</form>






<?php
if(isset($_POST['ok1']) || isset($_POST['ok2']) || isset($_POST['ok3']) || isset($_POST['ok4']))
{
if(!empty($_POST['spid']) || !empty($_POST['spname']) || !empty($_POST['scategory'])|| !empty($_POST['scost']))
{
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
		die(mysqli_connect_error());
		
		/*$select = mysql_select_db("mydb");
		if($select)
		{//echo "<p align='center'>Selected Database...!!";
		}
		else
		die(mysql_error());*/
	
		if(!empty($_POST['spid']))
		{
			if(isset($_POST['spid']))
			{$spid= $_POST['spid'];}
					//validation.....
				
			$query = "SELECT*
						FROM product
						WHERE id='$spid'";
				
			$result = mysqli_query($connect,$query) or die(mysqli_error());
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
				</tr>	
				
				";
			}
			echo "</table>";
			if($row_count==0)
			{echo"<p align='center'> <strong>Sorry!!! No product with ProductID: '$spid'</strong></p>";}
			else
			{echo"<p align='center'> <strong>Total Product(s): $row_count </strong></p>";}
		}
		

		elseif(!empty($_POST['spname']))
		{
			if(isset($_POST['spname']))
			{$spname= $_POST['spname'];}
			
			//validation
			
			if (!preg_match("/^[a-zA-Z ]*$/",$spname))
				{echo "<p align='center'> Only letters and white space allowed in Name!!</p>";exit();}
				
			$query = "SELECT*
						FROM product
						WHERE p_name='$spname'";
						
			$result = mysqli_query($connect,$query) or die(mysqli_error());
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
				</tr>	
				
				";
			}
			echo "</table>";
			if($row_count==0)
			{echo"<p align='center'> <strong>Sorry!!! No product with '$spname' name</strong></p>";}
			else
			{echo"<p align='center'> <strong>Total Product(s): $row_count </strong></p>";}		
			
			
		}
		
	
		elseif(!empty($_POST['scategory']))
		{
			if(isset($_POST['scategory']))
			{$scategory= $_POST['scategory'];}
				
			$query = "SELECT*
						FROM product
						WHERE p_category='$scategory'";
						
			$result = mysqli_query($connect,$query) or die(mysqli_error());
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
				</tr>	
				
				";
			}
			echo "</table>";
			if($row_count==0)
			{echo"<p align='center'> <strong>Sorry!!! No Product registered under $scategory category</strong></p>";}
			else
			{echo"<p align='center'> <strong>Total Product(s): $row_count </strong></p>";}
			
		}
		
		
		
		
		elseif(!empty($_POST['scost']))
		{
			if(isset($_POST['scost']))
			{$scost= $_POST['scost'];}
				
			$query = "SELECT*
						FROM product
						WHERE p_cost='$scost'";
						
			$result = mysqli_query($connect,$query) or die(mysqli_error());
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
				</tr>	
				
				";
			}
			echo "</table>";
			if($row_count==0)
			{echo"<p align='center'> <strong>Sorry!!! No product with cost : $scost </strong></p>";}
			else
			{echo"<p align='center'> <strong>Total Product(s): $row_count </strong></p>";}
			
		}
		
		
		

}
		echo"<form method='post'><p align='center'><input type='submit' name='Exit' value='Exit'></form>";
		
}


			if(isset($_POST['Exit']))
			{
				$exit = header("location: retailproducts.php");
			}
?>
