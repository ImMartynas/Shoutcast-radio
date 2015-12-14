//copyrights - ImMartynas 2015

<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'Off');	//Klaidu pranesimai On/Off
$sysklaida = '0'; //MySql Klaidu diagnozavimas 0- Ne, 1- Taip.



//duomenø bazës info
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'ngr_system';


	

//Prisijungimas prie MySql
$mysql = mysql_connect($host,$user,$pass);
$db = mysql_select_db($dbname,$mysql); 
mysql_query('SET NAMES utf8');
if ($sysklaida == '1')
{
if (!$mysql) die('Nepavyko prisijungti prie duomenu bazes: '. mysql_error());
elseif (!$db) die('Nepavyko prisijungti prie duomenu bazes: '. mysql_error());
else echo'MySql system is ok';
}

	
?>