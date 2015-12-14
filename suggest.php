//copyrights - ImMartynas 2015

<?php
include ("fv435r/config.php");
include ("fv435r/func.php");
?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<style type="text/css">

body { background: #0f0f0f; color: #ffffff; font-size: 13px; font-family: "Verdana";}
</style>
<script>
function closewindow()
{
window.close();
}
function resize()
{
window.resizeTo(288,480);
}
</script>
<?php

if(isset($_POST['submit'])) {
$vardas = isset($_POST['name']) ? check(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? check(trim($_POST['email'])) : '';
$song = isset($_POST['song']) ? check(trim($_POST['song'])) : '';
$song1 = isset($_POST['song1']) ? check(trim($_POST['song1'])) : '';
$code = isset($_POST['kodas']) ? check(trim($_POST['kodas'])) : '';

if(empty ($vardas)  or empty ($song) or empty ($song1) or empty ($code)) { $error='Paliktas tuščias laukelis';}
elseif(!isset($vardas{3})) { $error='Tavo vardas per trumpas';}
elseif(!isset($song{3})) { $error='Atlikėjo pavadinimas per trumpas';}
elseif(!isset($song1{3})) { $error='Dainos pavadinimas per trumpas';}
elseif($_SESSION['code'] != $code) { $error= 'Jūsų įvestas kodas nesutapo su kodu iš paveiksliuko.';}
if(isset($error)){
echo'<center><div style="border: 1px dashed #800000; color: #ffffff;"><br> '.$error.'</br /><br /></div>
<a href="suggest.php"><button onclick="resize()">Atgal</button></a></center>';
?><script>window.resizeTo(288,180);</script> <?php
}
else {
 if(!empty($email)){
echo'<div style="border: 1px dashed #008000; color: #ffffff;"><br> <center>Ačiū kad pasiūlei naują dainą, '.$vardas.' . <br />Susisieksime su tavim per el. paštą kai peržiurėsime..</center></br></div>';
}
else{
echo'<div style="border: 1px dashed #008000; color: #ffffff;"><br> <center>Ačiū kad pasiūlei naują dainą, '.$vardas.'.</center></br></div>';
}
echo '<center><button onclick="closewindow()">Uždaryti</button></center>';
$result = "INSERT INTO `suggest` (`name`,`song-author`,`song-name`,`email`) 
VALUES ('$vardas','$song','$song1','$email')";
mysql_query($result);
?><script>window.resizeTo(288,220);</script> <?php
}}

else{

echo '<form method="post" action="suggest.php">
<center><div style="border: 1px dotted #3c73ef;"><h3>Pasiūlyk dainą:</h4><br />
* Tavo vardas:<br />
<input name="name"  size="15" type="text" maxlength="15"/><br /><br />
Tavo email:<br />
<input name="email"  size="38" type="email" maxlength="38"/><br /><br />
* Atlikėjas:</br>
<input name="song"  size="38" type="text" maxlength="38"/><br /><br />
* Dainos pavadinimas:</br>
<input name="song1"  size="38" type="text" maxlength="38"/><br/><br>* Įveskite kodą:<br>
<img src="captcha/index.php" alt="captcha"/></br>
'.$_SESSION["code"].'
<input name="kodas"  size="7" type="text" maxlength="7"/><br></br><input class="button" type="submit"  name="submit" value="Patvirtinti"/><br/><br /></div>';
}
mysql_close();?>