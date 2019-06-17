<?php
session_start();
include("config_short.php");

$_SESSION['id']=$_GET['id'];

if (isset($_GET['id'])) {
	$myid=$_GET['id'];
	
	$sql1 = "SELECT id,name,password,score,games_played FROM player WHERE id=$myid";
	$result = mysqli_query($link,$sql1);
	while ($row = mysqli_fetch_array($result)) {
		?>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="mystyle.css">	
			</head>
			<body>
			<h2>EDIT PLAYER<span style="color:orange;">&nbsp<?php echo $row[1];?></h2>
			<form action="update.php" method="POST">
			<input name="id" type="hidden" value="<?=$row[0];?>">
			    <table>
			         <tr>
			        <td>Score: </td>
			        <td><input name="score" type="text" placeholder="<?=$row[3];?>"></td>
			      </tr>
			         <tr>
			        <td>Games Played: </td>
			        <td><input name="games" type="text" placeholder="<?=$row[4];?>"></td>
			      </tr>
			      <tr>
			        <td colspan="2"><input name="submit" type="submit"></td>
			      </tr>
			    </table>
			    <h3><a href="players.php">Return to Player List</a></h3>
			</form>
			</html>
			<?php
			$_SESSION['last_score'] = $row[3];
			$_SESSION['last_games'] = $row[4];
		}
		
}


?>