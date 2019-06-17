<?php
session_start();
include("config_short.php");
$admin = $_SESSION['admin_name'];
?>
<html>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mystyle.css">	
	</head>
	<body>
			<div class="menu_div" style="font-size:30px;width:500px;">
			<div class="title" style="font-size:30px;width: 500px;font-weight:bold;background:black">SCRAMBLE ADMINISTRATION</div>
    		<ul>
    			<li style="background:#f20c4d;"><b></b><span style="color:white;font-size:25px;">logged in as:&nbsp
    				<span style="color:yellow;font-size:30px;"><?php echo($admin); ?>
    				</span></span></b>
    				</li>
    			<li id="active"><a href="admin_register.php">Give/Revoke Admin Privileges</a></li>
				<li><a href="players.php">Player List</a></li>
				<li><a href="add_word.php">Add Word</a></li>
				<li><a href="words.php">Word List</a></li>
				<li><a href="index.php">Return</a></li>
    		</ul>
    		</div>
	
	</body>
</html>
</html>