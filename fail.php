<?php
session_start();
include("config_short.php");

$score=$_SESSION['total_score'];
$games=$_SESSION['games'];
$username=$_SESSION['username'];

$sql = "UPDATE player SET score=$score, games_played=$games WHERE name='$username'";
		
$res = mysqli_query($link, $sql);
	//if (mysqli_affected_rows($link) == 1) {
	//		echo('<h2>Update was successful</h2>');
	//		} else {
	//		echo('<h2>Update failed</h2>');
	//		}


?>


<html>
	<head>
		<title>
			Game Fail
		</title>
	</head>
	
	<body>
		<form method="post" action="" >
			<div style="border:8px solid #394ade;width:1200;padding:10px;text-align:center;">
				<div style="color:blue;font-size:50px;font-weight:bold;">Try harder <?php echo($_SESSION['username']); ?>, you failed to finish the game</div>
				<div style="color:orange;font-size:50px;font-weight:bold;">Your score is: <?php echo($_SESSION['score']); ?></div>
				<form method="post" action="" >
				<input style = "font-size:50px;color:green;" type="submit" name="submit" value="Play Again" /> &nbsp;
				<input style = "font-size:50px;color:red;" type="submit" name="return" value="Return to Menu" />
			</div>
		</form>
		
		
	</body>
</html>

<?php

if (isset($_POST['submit'])) {
	
	header("location: game_prepare.php");
	
}

if (isset($_POST['return'])) {
	
	header("location: index.php");
	
}

?>