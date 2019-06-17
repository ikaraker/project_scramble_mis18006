<?php

session_start();

include("config_short.php");

if (isset($_GET['id'])) {
	
	$myid=$_GET['id'];
	$count_admins = mysqli_fetch_row(mysqli_query($link, "SELECT count(administrator) FROM player WHERE administrator = 1"));
	$result = mysqli_query($link,"SELECT administrator FROM player WHERE id = '$myid'");
	$array = mysqli_fetch_row($result);
	$getAdmin = $array[0];
	$setAdmin = (!$getAdmin);

	if (($count_admins[0] < 2) && ($setAdmin == 0)) {
			echo('<h3>At list one Administrator should be registered in the database</h3>');
			echo('<h3><a href="admin_register.php">Return to Administration List</a></h3>');
		}
	else {	
			$result = mysqli_query($link, "UPDATE player SET administrator = '$setAdmin' WHERE id = '$myid'");
			if (mysqli_affected_rows($link) > 0) {
			echo('<h3>Admin Status Updated</h3>');
			echo('<h3><a href="admin_register.php">Return to Administration List</a></h3>');
		}
	}
}
?>