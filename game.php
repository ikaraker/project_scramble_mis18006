<?php
session_start();
include("config_short.php");

$help = array();
$selected_words=$_SESSION['selected_words'];
$counter = $_SESSION['counter'];

$current_word = $selected_words[$counter];
$current_word_as_array = str_split($current_word);

$help_counter = $_SESSION['help_counter'];


$word_shuffled= str_shuffle($current_word);


$array_word_shuffled = str_split($word_shuffled); 


?>	
<html>
	<head>
		<title>scramble v1.0</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        //When the page has loaded.
        $( document ).ready(function(){
            $('#message').fadeIn('slow', function(){
               $('#message').delay(1000).fadeOut(); 
            });
        });
        </script>
        
		
		<div style = "border:8px solid #394ade;width:870;padding:10px;">
			<div style="font-size:50px;color:#394ade;font-weight:bold;text-align:center;border:8px solid #394ade;">S C R A M B L E</div>
				<div style="font-size:30px;font-weight:bold;" style="color:#5483a8;">Player: &nbsp <span style="color:#a85071";><?php echo($_SESSION['username']); ?></span> 
										   &nbsp Score: 
										   &nbsp<span style="color:#a85071";><?php echo($_SESSION['score']); ?></span> 
										   &nbsp Games: 
										   &nbsp<span style="color:#a85071";><?php echo($_SESSION['games']); ?></span>
										   &nbsp Word#: 
										   &nbsp<span style="color:#a85071;";><?php echo($_SESSION['counter']+1); ?></span>
										   </div><br/>
										   
			
				<div style="font-size:45px;color:#1710e6;"><?php 
										
								
												if ($_SESSION['no_help_flag']) {
													foreach ($array_word_shuffled as $key=>$val) 
														{
															echo ("<span style='border:5px solid blue; padding:1px;'>$array_word_shuffled[$key]</span>");
															echo ("<span> </span>");
														} 
														$_SESSION['first']=$array_word_shuffled;
														$_SESSION['no_help_flag']=false;
													
													}
													else {
															$first=$_SESSION['first'];
															foreach ($first as $key=>$val) 
															
														{
															echo ("<span style='border:5px solid blue; padding:1px;'>$first[$key]</span>");
															echo ("<span> </span>");
														} 
														
													}
						
													 ?></div>
				<form method="post" action="" >
				<div style="font-size:50px;color:#19e661;font-weight: bold;">Guess the word: 
				<span style="font-size:40px;color:#ff5900;font-weight: bold;">
				<?php echo "(for ".(strlen($current_word)*10-$help_counter*10)." points)"; ?></span></div>
				<div><input type="text" style="font-size:50px;color:orange;font-weight:bold;" name="guess"/></div>
			
					<?php if ($help_counter > 0) { ?>
						<span style="font-size:40px;color:white;background:green;width:80;font-weight:bold;">
						1st Letter: <?php echo($current_word_as_array[0]);
						$minus=10;
						?></span>
					<?php } ?>
					<?php if ($help_counter > 1) { ?>
						<span style="font-size:40px;color:white;background:green;width:80;font-weight:bold;">
						2nd Letter: <?php echo($current_word_as_array[1]); 
						$minus+=10;
						?></span>
					<?php } ?>
					<?php if ($help_counter > 2) { ?>
						<span style="font-size:40px;color:white;background:green;width:80;font-weight:bold;">
						3rd Letter: <?php echo($current_word_as_array[2]); 
						$minus+=10;
						$_SESSION['help_flag']=false;
						?></span>
					<?php } ?>
				</br>
				<div>
					<input type="submit" style="font-size:40px;color:green;font-weight:bold;" name="submit" value="Found it!"/>
					&nbsp;
					<input type="submit" style="font-size:30px;color:red;font-weight:bold;" name="help" value="Get Hint (<?php echo("$help_counter") ?>)"/>
					&nbsp;
					<input type="submit" style="font-size:30px;color:red;font-weight:bold;" name="Abandon" value="Abandon current game"/>
				</div>
		</div>
		<?php
		if (($counter > 0) && ($help_counter == 0)) { ?>
			<div id="message" style="display:none;">
			<div style = "border:8px solid green;width:870;padding:10px;">
			<div style="font-size:50px;color:green;font-weight:bold;text-align:center;border:8px solid green;">C O R R E C T !!!!</div>
			</div>
			</div> <?php
		}  ?>
	</body>
	
</html>
<?php


if (isset($_POST['Abandon'])) 
	{	header("location: index.php"); }
		
if (isset($_POST['help'])) 
	{	 
		
		if ($help_counter <= 2 ) {
		$_SESSION['help_counter']++;
	
		header("location: game.php");
		}
		
	}

if (isset($_POST['submit'])) {
	
	if (strtoupper($_POST['guess']) == $current_word) {
	
		$_SESSION['score']+=strlen($current_word)*10 - $minus;
		
		$minus=0;
		
		$_SESSION['counter']++;
		$_SESSION['help_counter']=0;
		
		if ($_SESSION['counter'] == 10) {
			$_SESSION['games']++;
			$_SESSION['total_score']+=$_SESSION['score'];
			header("location: win.php");
		}
		else {
			$_SESSION['no_help_flag']=true; 
			header("location: game.php");
	
	}
	}
		
	if (strtoupper($_POST['guess']) != $current_word) {
	
		$_SESSION['total_score']+=$_SESSION['score'];
		$_SESSION['games']++;
		header("location: fail.php");
		
		}
		
	
}
		

			
?>

	