// Copyrights - ImMartynas 2015


<?php include ("fv435r/config.php");
include ("fv435r/func.php");
?>
<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NGR-radio.Tk - Tiesiog Nesveikai Geras Radijas!</title>
<link rel="shortcut icon" href="ico.png" type="image/png" />
<link rel="icon" href="ico.png" type="image/png" />
<link rel='stylesheet' type='text/css' href='style.css'/>
<link rel="copyright" content='NGR-Radio.tk' />
<script>
var w, wi=window.innerWidth, h=window.innerHeight, wh= wi/2, hh= h/2;
function openwindow()
{


w=window.open('suggest.php','a', 'width=288,height=439');
var wii=w.window.innerWidth, hi=w.window.innerHeight, whi = wii/2, hii= hi/2, total1 = wh - whi, total2 = hh - hii;
w.moveTo(total1,total2);
}


</script>
</head>

<body>
<div class='hid'><a href='adminpanel/'>*</a></div>
<div id = "cont">
<div class='header'>
	<div class='srw'><?php include("fv435r/data.php");?></div>
</div>
<div class='navigacija'>
	<div class='linkai'>
	<center>
	<a href='index.php'>Pagrindinis</a>
    <a href='index.php?pg=siuntiniai'>Siuntiniai</a>
	<span style='cursor:pointer;'><a onclick="openwindow()"><big>Pasiulyk dainą</big></a>
	<a href='index.php?pg=duk'>D.U.K.</a>
	<a href='index.php?pg=kontaktai'>Kontaktai</a>
	</center>
	</div></span>
</div>
<center><br><img src="images/ad.png"/></center>
<div class='panele'>
	<div class='pavadinimasp'>Dabar groja:</div>
		<div class='face'><center><a href="down.php?file=ngr.pls"><img src="images/windows.png" onclick="alert('Ačiū, kad pasirinkote mus! -N.G.R. Komanda\n P.S. Paleiskitę failą kurį tuojau atisiūsite per savo muzikos leistuvą, kad klausitumėtės mūsų radijo.')" /></a>
<a href="down.php?file=ngr.pls"><img src="images/vlc.png" onclick="alert('Ačiū, kad pasirinkote mus! -N.G.R. Komanda\n P.S. Paleiskitę failą kurį tuojau atisiūsite per savo muzikos leistuvą, kad klausitumėtės mūsų radijo.')" /></a>
<a href="down.php?file=ngr.pls"><img src="images/shout.png" onclick="alert('Ačiū, kad pasirinkote mus! -N.G.R. Komanda\n P.S. Paleiskitę failą kurį tuojau atisiūsite per savo muzikos leistuvą, kad klausitumėtės mūsų radijo.')" /></a></br>
<?php //include('radio_inf.php');?>
</center></div>
		<div class='panele2'>
	<div class='pavadinimasp'>Top 5:</div>
		<div class='face'><?php include('tops.php'); ?></br></br></br></br></br></div>
		<div class='panele2'>
	<div class='pavadinimasp'>Balsavimas</div>
		<div class='face'><?php include('poll.php'); ?></br></br></br></br></br></br></div>
<div class='panele2'>
	<div class='pavadinimasp'>Facebook įskiepis</div>
		<div class='face'><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FSRGLT%2F486828878034484&amp;width=262&amp;height=290&amp;show_faces=true&amp;colorscheme=dark&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:262px; height:262px;" allowTransparency="true"></iframe></div>
<div class='panele2'>
	<div class='pavadinimasp'>Reklama</div>
		<div class='face'>
		<a href='#'><img src="images/ad2.png"/></a>
		<a href='#'><img src="images/ad2.png"/></a><br>
		<a href='#'><img src="images/ad2.png"/></a>
		<a href='#'><img src="images/ad2.png"/></a><br>
		<a href='#'><img src="images/ad2.png"/></a>
		<a href='#'><img src="images/ad2.png"/></a><br>
		<a href='#'><img src="images/ad2.png"/></a>
		<a href='#'><img src="images/ad2.png"/></a><br>
		</div>
		</div></div></div></div></div><br>
			<?php 
			$pg = isset($_GET['pg']) ? check($_GET['pg']) : '';
			if ($pg == "siuntiniai"){include("downloads.php");}
			elseif ($pg == "duk"){include("duk.php");}
			elseif ($pg == "kontaktai"){include("contact.php");}
			else {
			$news1 = mysql_query("SELECT * FROM `news` ORDER by `id` DESC LIMIT 0,8");
			$page= isset($_GET['psl']) ? check($_GET['psl']) : '';
			$messpage = '7';
			$place = '0';
	if (mysql_num_rows($news1) == 0) 
	echo 'Atsiprašome, bet kolkas Naujienų nėra :)';
	else {

$count = intval((mysql_num_rows($news1) -1) / $messpage) + 1; 
if(empty($page) or $page < 0) $page = 1;   
if($page > $count) $page = $count;  
$start = $page * $messpage - $messpage;  

$news = mysql_query("SELECT * FROM `news` ORDER by `id` DESC LIMIT $start , $messpage");
	while($new=mysql_fetch_array($news)){
	$place++;
	if ($place == '1'){
?><div class='naujiena'> 
	<div class='pavadinimasn'><?php echo $place .'.  '.$new['title']; ?></div>
		<div class='parase'>Naujien&#261; para&#353;&#279;: <span style='color: #2f8ad3'><b><?php echo $new['by']; ?></b></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Data: <span style='color: #2f8ad3'><b><?php echo $new['date']; ?></b></span></div>
			<div class='patinaujiena'><?php echo simile($new['content']); ?>
<b></br></br>- Pagarbiai, NGR-radio.Tk Administracija.</b>  </div><?php } else { ?>
<div class='naujiena1'> 
	<div class='pavadinimasn'><?php echo $place .'.  '.$new['title']; ?></div>
		<div class='parase'>Naujien&#261; para&#353;&#279;: <span style='color: #2f8ad3'><b><?php echo $new['by']; ?></b></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Data: <span style='color: #2f8ad3'><b><?php echo $new['date']; ?></b></span></div>
			<div class='patinaujiena'><?php echo simile($new['content']); ?>
<b></br></br>- Pagarbiai, NGR-radio.Tk Administracija.</b>  </div><?php
}
}
$url = 'index.php?psl=';
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
}}
mysql_close();?>






</div>

</body>

</html>
