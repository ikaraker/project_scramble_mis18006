<?php
include("config_short.php");
if (isset($_GET['id'])) {
	
	$myid=$_GET['id'];
	$result = mysqli_query($link, "DELETE FROM word WHERE id = '$myid'");
	if (mysqli_affected_rows($link) > 0) {
		
		echo('<h3>Word deleted.</h3>');
		echo('<h3><a href="words.php">Return to Word List</a></h3>');
	}
}

?>