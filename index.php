<?php
session_start();
include("config.php");
?>

<html>
	<head>
		<title>Scramble Index</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">	
	</head>
	<body>
		<div class="menu"; style="font-size:50px;">
			<div style="width:500px;font-size:40px;" class="title">SCRAMBLE version 1.0</div>
			<div class="menu_div">
    		<ul style="width:500px">
    			<li id="active"><a href="login.php">Play the game</a></li>
    			<li><a href="player_register.php">Create Player</a></li>
				<li><a href="admin_login.php">Game Administration</a></li>
				<li><a href="hof.php">Hall of fame</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="exit.html">Exit</a></li>
    		</ul>
    		</div>
    	</div>
	</body>
</html>
