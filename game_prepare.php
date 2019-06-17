<?php
session_start();
include("config_short.php");

$user=$_SESSION['username'];
$query= "SELECT * FROM player WHERE name = '$user'";
$current_player = mysqli_fetch_array(mysqli_query($link,$query));

$username=$current_player[1];
$score=$current_player[3];
$games=$current_player[4];
$counter=0;
$help_counter=0;
$no_help_flag=true;


$_SESSION['score']=0;
$_SESSION['total_score']=$score;
$_SESSION['games']=$games;
$_SESSION['counter'] = $counter;
$_SESSION['help_counter'] = $help_counter;
$_SESSION['no_help_flag'] = $no_help_flag;

	
	$sql = "SELECT gword FROM word";
	$res = mysqli_query($link,$sql);
	$words = array();
	$selected_words = array();

	
	while($row = mysqli_fetch_row($res))
	{
    	$words[] = $row[0];

	}
	
	$keys = array_rand($words,10);
	
	foreach ($keys as $v) {
	$selected_words[] = $words[$v];
	}
	
	$_SESSION['selected_words'] = $selected_words;
	$_SESSION['word']=($selected_words[$counter]);
	header("location:game.php");
	
	?>
