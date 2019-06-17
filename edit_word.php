<?php
session_start();
include("config_short.php");

$_SESSION['word_id']=$_GET['id'];

if (isset($_GET['id'])) {
	$myid=$_GET['id'];
	
	$sql = "SELECT id,gword FROM word WHERE id=$myid";
	$result = mysqli_query($link,$sql);
	while ($row = mysqli_fetch_array($result)) {
		?>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="mystyle.css">	
			</head>
			<body>
			<h2>EDIT WORD<span style="color:orange;">&nbsp<?php echo $row[1];?></h2>
			<form action="update_word.php" method="POST">
			<input name="id" type="hidden" value="<?=$row[0];?>">
			    <table>
			         <tr>
			        <td><input name="word" type="text" placeholder="<?=$row[1];?>"></td>
			      </tr>
			      <tr>
			        <td colspan="2"><input name="submit" type="submit"></td>
			      </tr>
			    </table>
			    <h3><a href="words.php">Return to Word List</a></h3>
			</form>
			</html>
			<?php
		}
}


?>