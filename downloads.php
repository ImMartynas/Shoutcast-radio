//copyrights - ImMartynas 2015

<link rel='stylesheet' type='text/css' href='style.css'/>
<?php
include ("fv435r/config.php");
$all = mysql_query("SELECT COUNT(*) FROM `download`");
$page = isset($_GET['pgg']) ? check(trim($_GET['pgg'])) : '';
$messpage = '7';
			$place = '0';
	if (mysql_num_rows($all) == 0) 
	echo 'Atsiprašome, bet kolkas Siuntinų nėra :)';
	else {


$count = intval((mysql_num_rows($all) -1) / $messpage) + 1; 
if(empty($page) or $page < 0) $page = 1;   
if($page > $count) $page = $count;  
$start = $page * $messpage - $messpage;  

$downloads = mysql_query("SELECT * FROM `download` ORDER by `id` DESC LIMIT $start,$messpage");
echo $count.$count;
	while($new=mysql_fetch_array($downloads)){
	$place++;
	if ($place == '1'){
	
?><div class='naujiena'> 
	<div class='pavadinimasn'><?php echo $place .'. Failas "'.$new['name'].'"'; ?></div>
		<div class='parase'>Atsisiūsta kartų: <span style='color: #2f8ad3'><b><?php echo $new['downloads']; ?></b></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Įkelimo data: <span style='color: #2f8ad3'><b><?php echo $new['date']; ?></b></span></div>
			<div class='patinaujiena'><table cellspacing ='10'><tr><td><?php echo '<a href="down.php?file='.$new['adress'].'"><img src="images/down.png"/></a> '; ?> </td><td><?php echo '<i>'.simile($new['comment']).'</i>' ?></td><tr></table></div><?php } else { ?>
<div class='naujiena1'> 
	<div class='pavadinimasn'><?php echo $place .'. Failas "'.$new['name'].'"'; ?></div>
		<div class='parase'>Atsisiūsta kartų: <span style='color: #2f8ad3'><b><?php echo $new['downloads']; ?></b></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Įkelimo data: <span style='color: #2f8ad3'><b><?php echo $new['date']; ?></b></span></div>
			<div class='patinaujiena'><table cellspacing ='10'><tr><td><?php echo '<a href="down.php?file='.$new['adress'].'"><img src="images/down.png"/></a> '; ?> </td><td><?php echo '<i>'.simile($new['comment']).'</i>' ?></td><tr></table></div>
<?php
}}
$url = 'index.php?pg=siuntiniai&pgg=';
echo '<center><div style="color:#fff;">';
if ($page != 1) echo  ' <a href= "'.$url.''. ($page - 1) .'">&lt;&lt;</a> '; 
if ($page - 4 > 0) echo  '<a href="'.$url.'1">1</a>...';
if($page - 2 > 0) echo '<a href= "'.$url.''. ($page - 2) .'">'. ($page - 2) .'</a> '; 
if($page - 1 > 0) echo  '<a href= "'.$url.''. ($page - 1) .'">'. ($page - 1) .'</a> '; 
echo '['.$page.']';
if($page + 1 <= $count) echo  ' <a href="'.$url.''. ($page + 1) .'">'. ($page + 1) .'</a>';
if($page + 2 <= $count) echo  ' <a href= "'.$url.''. ($page + 2) .'">'. ($page + 2) .'</a>'; 
if ($page + 4 <= $count) echo  '...<a href="'.$url.''.$count.'">'.$count.'</a>';
if ($page != $count) echo  ' <a href="'.$url.''. ($page + 1) .'">&gt;&gt;</a>'; 
echo '</div></div></center>';
}
?>