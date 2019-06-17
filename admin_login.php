<?php
session_start();
include("config.php");

?>

<html>
	<head>
		<title>admin</title>
	</head>
	
	<body>
		<div style = "border:8px solid black;width:620;padding:10px;">
			<div class="admin_login" style = "font-size:50px;font-weight:bold;">ADMINISTRATOR LOGIN</div>
			<form method="post" action="" >
			<div style = "font-size:30px;font-weight:bold;">Please enter your credentials</div>
			<div><input style = "font-size:30px;" type="text" name="admin_name" placeholder="username"/></div>
			<div><input style = "font-size:30px;" type="password" name="admin_password" placeholder="password" autocomplete="new-password"/></div> </br>
			<input style = "font-size:30px;" type="submit" name="submit" value="Enter Setup" /> &nbsp;
			<input style = "font-size:30px;" type="submit" name="return" value="Return" />
			</form>
		</div>
	</body>
</html>

<?php 

if (isset($_POST['return'])) {
	header('location:index.php');
}
	
if (isset($_POST)) {
$admin_name = $_POST['admin_name'];
$admin_password = $_POST['admin_password'];

$sql = "SELECT * FROM player WHERE name='$admin_name' and
password='$admin_password' and administrator = true";

$result = mysqli_query($link,$sql);
$count=mysqli_num_rows($result);


if($count==1) {
	$_SESSION['admin_name'] = $_POST['admin_name'];
	header("location:admin.php"); }
	else
	{
	if (($admin_name) or ($admin_password))	{ 
		?> 
		<script>
			window.confirm("Wrong username and/or password");
		</script>
		<?php
		
	}
		
	}
}



?> 
