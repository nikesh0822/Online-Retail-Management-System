<html>
<head>
<title>ADVANCED ONLINE RETAIL SYSTEM</title>
</head>
<body bgcolor="#EF9A9A">

<h1 align="center"> ONLINE RETAIL MANAGMENT SYSTEM </h1>
<form method="post">
<table bgcolor="#66FF33"; style="height:10%; width:100%;">
	<td><input type="button" name="admin" value="Admin" onclick="login()"></td>
<td><h4 style="text-align:right;"><a href="retaillogin.php" >Login</a>
<h4 style="text-align:right;"><a href="retailsignup.php">Sign up</a></td>
	</table>

</form>


</body>
</html>


<script type="text/javascript">
function login()
{
var username=prompt("Enter usename");
var password=prompt("Enter password");
if(username=="admin" && password=="admin123")
window.location="http://localhost:8080/myphp/retailproducts.php";
else
alert("Invalid username password");
}
</script>