<?php
session_start();
include("config_short.php");
		
		if (isset($_POST['score'])) {
			$new_score=$_POST['score'];
		} else $new_score=$_SESSION['last_score'];
		if (isset($_POST['games'])) {
			$new_games=$_POST['games'];
		} else $new_games=$_SESSION['last_games'];
		
		$id=$_SESSION['id'];
		
if (isset($_POST['submit'])) {		
		$sql1 = "UPDATE player SET score=$new_score, games_played=$new_games WHERE id =$id";
		$result = mysqli_query($link,$sql1);
		if (mysqli_affected_rows($link) == 1) {
			echo('<h2>Update was successful</h2>');
			} else {
			echo('<h2>Update failed</h2>');
			}
}
		
	echo('<h2><a href="players.php">Return</a></h2>');
		
?>