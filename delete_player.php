<?php
session_start();
include("config_short.php");
if (isset($_GET['id'])) {
	
	$pl_id=$_GET['id'];
	$res = mysqli_query($link, "SELECT administrator FROM player WHERE id = '$pl_id'");
	$row = mysqli_fetch_array($res);
	if ($row[0] == 0) {
			$result = mysqli_query($link, "DELETE FROM player WHERE id = '$pl_id'");
					if (mysqli_affected_rows($link) > 0) {
					echo('<h3>Player deleted.</h3>');
					echo('<h3><a href="players.php">Return to Player List</a></h3>');
				}
			}
			else {
				?>
				<script>
					window.confirm("Can't delete an admin!");
					window.location.href = "players.php";
				</script>
				<?php
				}
			
	}

?>