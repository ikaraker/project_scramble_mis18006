<?php
session_start();
include("config_short.php");
?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
		<div style = "border:8px solid black;width:510;padding:10px;">
			<div class="player_register" style = "font-size:50px;font-weight:bold;">PLAYER REGISTER</div>
			<form method="post" action="">
			<div style = "font-size:30px;font-weight:bold;">Please select a Username & a Password</div>
			<div style = "font-size:25px;"><input style = "font-size:25px;" type="text" name="new_username" placeholder="username"/></div>
			<div style = "font-size:25px;"><input style = "font-size:25px;" type="password" name="new_password" placeholder="password" autocomplete="new-password"/></div>
			<div style = "font-size:25px;"><input style = "font-size:25px;" type="password" name="new_password2" placeholder="password again" autocomplete="new-password"/></div>
			
			<h3><input  style = "font-size:30px;" type="submit" name="submit" value="Create Player" /> &nbsp;
			<span><input style = "font-size:30px;" type="submit" name="return" value="Return" /></span></h3>
			</form>
		</div>			
	</body>
</html>

<?php

$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];
$new_password_confirm = $_POST['new_password2'];
$sql = "SELECT * FROM player WHERE name='$new_username'";
$result = mysqli_query($link,$sql);
$count=mysqli_num_rows($result);

if (isset($_POST['return'])) {
	header('location:index.php');
}
if (isset($_POST['submit'])) {
	if ($count == 0 ) {
			if ($new_username != ""  &&  $new_password != "" && $new_password == $new_password_confirm) 
				{ $add_pl = mysqli_query($link, "INSERT INTO player VALUES (NULL, '$new_username' , '$new_password' , '0' , '0', false )") 
					or die(mysqli_error($link)); 
					if ($add_pl) {
							?> 
							<script>
								window.confirm("Player added successfully");
							</script>
							<?php
									}
				}
					else {
						?> 
						<script>
							window.confirm("Something went wrong with the password");
						</script>
						<?php
						}
					} 
					else 
					{
				?> 
				<script>
				window.confirm("This player name already exists");
				</script>
			<?php
			}
	}
?>
	
