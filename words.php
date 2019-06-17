<html>
<head>
    <title>Word List</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
<?php
session_start();
include("config_short.php");

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$counter=0;
$number_of_records_per_page=15;
$offset = (($pageno-1)*$number_of_records_per_page);

$sql = "SELECT COUNT(*) FROM word";
$result = mysqli_query($link, $sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $number_of_records_per_page);

$query = "SELECT * FROM word LIMIT $offset, $number_of_records_per_page";
$result = mysqli_query($link,$query); 



		echo('<style>
				table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			</style>');
		
		echo('<h2>LIST OF WORDS</h2>
				<table style:"width:50%">
				<tr>
    				<th>Number</th>
    				<th>word</th>
				</tr>');

		while ($row = mysqli_fetch_array($result)) { 
				$counter++;
				echo("<tr>
    					<td>$counter</td>
    					<td>$row[1]</td>
    					<td><a href='delete_word.php?id=$row[0]'?><img src='delete.gif' width='17'></a></td>
    					<td><a href='edit_word.php?id=$row[0]'><img src='edit.gif' width='17'></a></td>
					</tr>");
		}
		
		echo('</table>');
		echo('<h2><a href="admin.php">Return</a></h2>');

	mysqli_close($link);
	

?>
<ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>
</html>

