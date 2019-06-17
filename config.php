<?php
$link  = mysqli_connect("localhost","mis18006","6vegrp6!", "mis18006") or die ("No connection");
mysqli_query($link, "SET NAMES utf8 COLLATE utf8_general_ci");


$exists = mysqli_query($link, "SELECT 1 FROM player");
$word_exists = mysqli_query($link, "SELECT 1 FROM word");

if (!$exists) {
		$sql_query = "CREATE TABLE player (id INT UNSIGNED NOT NULL AUTO_INCREMENT,
				name varchar(50),
				password varchar(20),
				score int,
				games_played int,
				administrator boolean,
				PRIMARY KEY (id))";
		$result = mysqli_query($link, $sql_query)
				or die(mysqli_error($link));
		$add_pl = mysqli_query($link, "INSERT INTO player VALUES (NULL, 'admin' , 'admin' , '0' , '0', true)") 
			or die(mysqli_error($link));
			echo '<b><h4 style="color:green;">TABLE PLAYER CREATED (default admin credentials : "admin","admin")</h4></b>';
			echo '<b><h4 style="color:orange;">PLEASE CHANGE DEFAULT ADMINISTRATOR CREDENTIALS</h4></b>';
}
if (!$word_exists) {
		$sql_query = "CREATE TABLE word (id INT UNSIGNED NOT NULL AUTO_INCREMENT,
				gword varchar(50),
				PRIMARY KEY (id))";
		$result = mysqli_query($link, $sql_query)
				or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'COFFEE')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'TIGER')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'PENCIL')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'KEYBOARD')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'SMARTPHONE')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'DINNER')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'QUEEN')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'JACKET')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'DREAM')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'TELEVISION')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'TELEPHONE')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'BIRTHDAY')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'COMPUTER')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'COLOR')") or die(mysqli_error($link));
		$add_word = mysqli_query($link, "INSERT INTO word VALUES (NULL, 'BASKETBALL')") or die(mysqli_error($link));
}
	
?>