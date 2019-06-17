<html>
<head>
    <title>Hall Of Fame</title>
</head>
</html>

<?php

session_start();
include("config_short.php");

$sql = "SELECT * FROM player ORDER BY score DESC LIMIT 10";
$result = mysqli_query($link,$sql); 
$counter=0;



		echo('<style>
				table, th, td {
				border: 4px solid blue;
				border-collapse: collapse;
				font-size:30;
			}
			</style>');
		
		echo('<div style="font-weight:bold;font-size:50px;color:red;">HALL OF FAME</h2>
				<table style:"width:500;">
				<tr>
    				<th>Number</th>
    				<th>Player Name</th>
    				<th>Score</th> 
    				<th>Games Played</th>
				</tr>');

		while ($row = mysqli_fetch_array($result)) { 
				$counter++;
				echo("<tr>
    					<td>$counter</td>
    					<td>$row[1]</td>
				    	<td>$row[3]</td>
    					<td>$row[4]</td>
					</tr>");
		}
		
		echo('</table>');
		echo('<div style="font-weight:bold;font-size:50px;color:purple;"><a href="index.php">Return</a></div>');
	mysqli_close($link);
	

?>