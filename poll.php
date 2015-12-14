//copyrights - ImMartynas 2015

<?php


include("fv435r/config.php");



$user_ip = $_SERVER['REMOTE_ADDR'];

$ipquery = mysql_query("SELECT * FROM poll_ip WHERE ip='$user_ip'");
$select_banned = mysql_num_rows($ipquery);

if($select_banned){

	//display results
	
	
	$poll = mysql_fetch_array(mysql_query("select * from poll_q"));

	$question = $poll['question'];
	
	$countvotes = mysql_query("select total from poll_q");
	$polll = mysql_query("select * from poll_a");
		$tikrinimas=mysql_num_rows($polll);
	if ($tikrinimas == 0){
	echo 'Atsiprašome, bet kolkas Balsavimų nėra :)';}
	else{
	while ($row = mysql_fetch_assoc($countvotes)) {
    	$totalvotes =+ $row["total"];
	}
			
	echo('<center><u>'.$question.'</u></center><br />');
	
	
	$get_questions = mysql_query("select * from poll_a");
	while($r=mysql_fetch_array($get_questions)){
	
	
		extract($r);
		$per = $votes * 100 / $totalvotes;
		$per = floor($per);
		
		echo htmlspecialchars($field);
		echo ':';		
		?> 
		<strong><?php echo $votes; ?>
		</strong>
		<div style="background-color: #D7D7D7; width:260px;"><div style="color: #4795C3; font-size: 8px; text-align: right;background-color: #000000; width: <?php echo($per); ?>%;"><?php echo("$per%"); ?></div></div>
		<?php
			
	}
	
	echo('<br />Viso balsų: <strong>'.$totalvotes.'</strong>'); 
	}
	
	
	
	
	
}else{





//if the submit button was pressed
if($_POST['submit']){
	
	//grab vars
	$vote = $_POST['vote'];
	$refer = $_POST['refer'];
	
		
	//update numbers
	$update_totalvotes = "UPDATE poll_q SET total = total + 1";
	$insert = mysql_query($update_totalvotes);
	
	$update_votes = "UPDATE poll_a SET votes = votes + 1 WHERE id = $vote";
	$insert = mysql_query($update_votes);
			
	//add ip to stop multiple voting
	$ip = $_SERVER['REMOTE_ADDR'];
	$addip = mysql_query("INSERT INTO poll_ip (ip)". "VALUES ('$ip')"); 

	
	//send the user back to thepage they were just viewing
	header("Location: $refer");
	
	
		
}	

	$uri = $_SERVER['REQUEST_URI'];
	
	//display the form!
	?><form action="poll.php" method="post"><?php
		
	$poll = mysql_fetch_array(mysql_query("select * from poll_q"));
	$polll = mysql_query("select * from poll_a");
		$tikrinimas=mysql_num_rows($polll);
	if ($tikrinimas == 0){
	echo 'Atsiprašome, bet kolkas Balsavimų nėra :)';}
	else{

	$question = $poll['question'];
			
	echo("<center><u>$question</u></center><br />");
	
	
	$getcurrent = mysql_query("select * from poll_a ORDER by id");
	while($r=mysql_fetch_array($getcurrent)){
		
		extract($r);
		
		?><input type="radio" name="vote" value="<?php echo($id); ?>" class="radiobutton" /> <?php echo($field); ?><br /><?php
		
	}	
		
		
	?>
	<input type="hidden" name="refer" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
	<input type="submit" name="submit" value="Balsuoti" /> 
	</form>
	<?php	
	}
	
	
}


?>