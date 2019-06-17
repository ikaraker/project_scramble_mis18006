<?php

session_start();
include("config_short.php");
?>

<html>
	<head>
		<title>Add word</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
			<div style="text-align:center;border:8px solid black;width:800;padding:10px;">
			<div class="add_word" style="font-size:50px;font-weight:bold;color:black;">ADD NEW WORD TO DATABASE</div>
			<form method="post" action="" >
			<div style="font-size:40px;font-weight:bold;color:black;">Please enter a word with at least 4 letters:</div>
			<input style="font-size:40px;font-weight:bold;color:black;" type="text" name="word"/>
				<div>
					<input style="font-size:40px;font-weight:bold;color:red;margin:5px;" type="submit" name="submit" value="add word"/>
					<input style="font-size:40px;font-weight:bold;color:red;margin:10px;" type="submit" name="return" value="return"/>
				</div>	
			</form>
			</div>
	</body>
</html>

<?php

if (isset($_POST['return'])) {
		header("location:admin.php");
}
if (isset($_POST['submit'])) {
	
	$new_word=$_POST['word'];
	$new_word=strtoupper($new_word);
	
		if (strlen($new_word) > 3) {
			$sql = "SELECT * FROM word WHERE gword = '$new_word'";
			$result = mysqli_query($link,$sql);
			if (!mysqli_num_rows($result)) {
				$query="INSERT INTO word VALUES (NULL, '$new_word')";
				$add_word = mysqli_query($link, $query) 
					or die(mysqli_error($link));
					if ($add_word) {
							?> 
							<script>
								window.confirm("Word added successfully");
							</script>
							<?php
									}
					}
				else {
					?> 
					<script>
						window.confirm("This word already exists");
					</script>
				<?php
					}
	} else  {
					?> 
					<script>
						window.confirm("Try a word with 4 or more characters");
					</script>
				<?php
			}
}
	
?>
	
	
