<?php
session_start();
include("config_short.php");
		
		$new_word=$_POST['word'];
		$id=$_SESSION['word_id'];

		
if (isset($_POST['submit'])) {	
		if (strlen($new_word) > 3) {
			$sql = "SELECT * FROM word WHERE gword = '$new_word'";
			$res = mysqli_query($link,$sql);
			if (!mysqli_num_rows($res)) {
				$new_word=strtoupper($new_word);
				$query = "UPDATE word SET gword= '$new_word' WHERE id = $id";
				$result = mysqli_query($link,$query);
					if (mysqli_affected_rows($link) == 1) {
					echo('<h2>Update was successful</h2>');
					} else {
					echo('<h2>Update failed</h2>');
					}
				}
				else {
						?> 
						<script>
							window.confirm("This word already exists");
						</script>
						<?php
						}
				} else {
			?> 
			<script>
			window.confirm("Try another word(at least 4 characters)");
			</script>
			<?php
		}
}
		
	echo('<h2><a href="words.php">Return</a></h2>');
		
?>