//copyrights - ImMartynas 2015

<?php include ("../fv435r/config.php");
include_once ('../fv435r/func.php');
?>
<head><link rel='stylesheet' type='text/css' href='../style.css'/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body><?php 

if(isset($_POST['submit'])) {
$user = isset($_POST['user']) ? check(trim($_POST['user'])) : '';
$passwor = isset($_POST['password']) ? check(trim($_POST['password'])) : '';
$password = md5($passwor);
$checkuser = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `name`='$user' AND `pass`='$password'"));
if(!isset($user{3})) { $error='Vartotojo vardas per trumpas.';}
elseif(isset($user{31})) { $error='Vartotojo vardas per ilgas.';}
elseif(!isset($password{3})) { $error='Slaptaždodis per trumpas.';}
elseif(isset($password{35})) { $error='Slaptažodis per ilgas.';}
elseif($checkuser==0){ $error='Neteisingi duomenys.';}

if(isset($error)){
echo'<div style="border: 1px dashed #800000; color: #ffffff;"><br> <center>'.$error.'</center></br></div>';
}
else {
		setcookie('user',$user,time()+3600);
		setcookie('pass',$password,time()+3600);
		header('Location: index.php');
		?> <script> alert('Prisijungta sekmingai!'); </script> <?php
}}

if(empty($_COOKIE['user']) or empty($_COOKIE['pass']))
{
echo"<form method='post' action='index.php'>
<center><div class='naujiena1'> 
	<div class='pavadinimasn'>Prisijungimas</div>
		<div class='parase'><i>Prašome prisijungti kad galėtumėte valdyti sistemą</i> </div>
			<div class='patinaujiena'></br>  Vartotojo vardas:</br><input name='user'  size='30' type='text' maxlength='30'/></br>Slaptažodis:</br><input name='password'  size='30' type='password' maxlength='30'/></br></br><input class='button' type='submit'  name='submit' value='Patvirtinti'/></div></div></center></body>";
}
else
{
$checkuser = mysql_num_rows(mysql_query("SELECT * FROM `users` WHERE `name`='".$_COOKIE['user']."' AND `pass`='".$_COOKIE['pass']."'"));
if($checkuser==0){ 	header('Location: index.php');} else{
echo "<center><div class='naujiena1'>
	<div class='pavadinimasn'>Administravimas</div>
		<div class='parase'>Prisijungta kaip: <span style='color: #2f8ad3'><b>".$_COOKIE['user']."</b></span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Data: <span style='color: #2f8ad3'><b>".date('Y.m.d H:m')."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style='color: #2f8ad3'><a href='index.php?pg=atsijungti'>Atsijungti</a></span>
		</b></span></div>

			<div class='patinaujiena'><span style='color:#008000'><div style='margin-right:300px;'><h3>Naujienos:</h3></div></br> Įrašyti naują naujieną</span></br><span style='color:#d7d51f'>Redaguoti esamą naujieną</br>Ištrinti naujieną
			</br><div style='margin-right:300px;'><h3>Top'ai:</h3></div>Redaguoti esamus topus
			</br><div style='margin-right:300px;'><h3>Balsavimai:</h3></div>Skelbti naują balsavimą</br>Redaguoti klausimus</br>Redaguoti skaičius</span>
			</br><div style='margin-right:300px;'><span style='color:#008000'><h3>Siuntiniai:</h3></div></br><span style='color:#008000'>Pridėti naują siuntinį</span><span style='color:#d7d51f'></br>Redaguoti esamą siuntinį</br>Ištrinti siuntinį</br>
			</br><div style='margin-right:300px;'><h3>Vartotojai:</h3></div></br>Pridėti naują vartotoją</br>Redaguoti esamą vartotoją</br>Ištrinti vartotoją
			</br><div style='margin-right:300px;'><span style='color:#008000'><h3>Informacija:</h3></div></br><span style='color:#008000'>Keisti savo informaciją</span>
			</br><span style='color:#800000'><div style='margin-right:300px;'><h3>Valymas:</h3></div>Išvalyti naujienas</br>Išvalyti siuntinius</br>Išvalyti Topus</br>Išvalyti vartotojus</br>Išvalyti sistemą</span></div></div>";}

if($_GET['pg']=="rasyti-naujiena"){
	
echo "<form action=\"index.php?pg=rasyti-naujiena_2\" method=\"post\">";
echo "<p>";
echo "<big>Naujienos kelimas</big><br>";
echo "Naujienos pavadinimas:<br/></p>";
echo "<input type=\"text\" name=\"pvd\" size=\"20\"/><br/><p>";
echo "Naujiena (250 simbolių):<br><p>";
echo "<textarea name=\"zinute\"  rows=\"5\" cols=\"40\"></textarea><br/>";
echo "<p>";

echo "<input class=\"button\" type=\"submit\"  name=\"submit\" value=\"Ra".$s."yti\"/><br><p>";
echo "<a href=\"index.php\"> Pradžia</a><br/>";
}			

if($pg =="rasyti-naujiena_2"){
include_once ('../odierjfgoiedrjhgo43ouh5toiu342ujh/func.php');
$pvd=$_POST['pvd'];
$zinute=$_POST['zinute'];
$user = $_COOKIE['user'];

$laikas=date("Y-m-d  H:i");
echo "<p>";
echo "<big>Naujiena sekmingai įdėta</big><br>";

mysql_query("INSERT INTO news (date, title, content, by)
VALUES ('$laikas', '$pvd', '$zinute', '$user')");
echo "<br><p><a href=\"index.php\">Valdymo pultas</a>";}

if($_GET['pg']=="atsijungti"){
	
	setcookie ('user');	
	setcookie ('pass');
	?> <script>alert('Atsijungta sekmingai!');</script> <?php
	header("Location: index.php");

}}
?>