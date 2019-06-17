<?php 
	session_start();
	include("config.php");
?>
<html>
	
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	
	<body>
		<div style = "border: 8px solid #394ade;width:410;padding:10px">
			<div class="login", class="mytitle", style="color:#1aed8e;font-size:50px;width:470px;font-weight:bold;">PLAYER LOGIN</div>
			<form method="post" action="" >
			<div style="color:#1aed8e;font-size:30px;font-weight:bold;">Please enter your credentials</div>
			<div style="color:#f50076;font-size:30px;"><input type="text" style="font-size:30px;" name="username" placeholder="username"/></div>
			<div style="color:#f50076;font-size:30px;"><input type="password" style="font-size:30px;" name="password" placeholder="password" autocomplete="new-password"/></div></br>
			<input type="submit" name="submit" style="font-size:30px;color:red;" value="Enter Scramble" /> &nbsp;
			<input type="submit" name="return" style="font-size:30px;color:red;" value="Return" />
			</form>
		</div>
	</body>
</html>



<?php	

	if (isset($_POST['return'])) {
		header("location: index.php");
	}
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM player WHERE name='$username' and password='$password'";
		$count = mysqli_num_rows(mysqli_query($link,$query));
		
			
		
				if($count == 1) {
					$_SESSION['username'] = $username;
					header("location:game_prepare.php");
					}	else	{ 
					?> 
					<script>
					window.confirm("Unknown username and/or password");
					window.location.href = "login.php";
					</script>
					<?php
				}
		}

?> 



