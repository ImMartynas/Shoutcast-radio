//copyrights - ImMartynas 2015

<?php 


$adm = 'Anonim'; // Savininkas


/*
-----------------------------------------------------------------
Anti mat
-----------------------------------------------------------------
*/
function antimat($string){
	      
$file = file("txt/anti.dat"); 
$count = count($file);
for($i=0; $i<$count; $i++) {
list($mat) = explode('|', $file[$i]); 
$string = str_replace("$mat","***",$string); 
}

return $string;
}

/*
-----------------------------------------------------------------
Filtravimas
-----------------------------------------------------------------
*/
function check($input) {
$input = htmlspecialchars($input);
$search = array('|','\'','$','\\','^','%','`',"\0","\x00","\x1A");
$replace = array('&#124;','&#39;','&#36;','&#92;','&#94;','&#37;','&#96;','','','');
$input = str_replace($search, $replace, $input);
$input = stripslashes(trim($input));
$input = mysql_real_escape_string($input);
return $input;
}

function maketime($string) {
if($string < 3600){
$string = sprintf("%02d:%02d", (int)($string / 60) % 60, $string % 60); 
}else{
$string = sprintf("%02d:%02d:%02d", (int)($string / 3600) % 24, (int)($string / 60) % 60, $string % 60); 	
}
return $string; 
}
/*
-----------------------------------------------------------------
Sekundes pavercia diena
-----------------------------------------------------------------
*/
function distim($string) {

$day = floor($string / 86400); 
$hours = floor(($string / 3600) - $day * 24); 
$min = floor(($string - $hours * 3600 - $day * 86400) / 60); 
$sec = $string - ($min * 60 + $hours * 3600 + $day * 86400);

return sprintf("%01d d. %02d:%02d:%02d", $day, $hours, $min, $sec); 
}

function bbcode($input){
$input = preg_replace("#\[b\](.*?)\[\/b\]#si","<b>\\1</b>", $input);
$input = preg_replace("#\[i\](.*?)\[\/i\]#si","<i>\\1</i>", $input);
$input = preg_replace("#\[u\](.*?)\[\/u\]#si","<u>\\1</u>", $input);
$input = preg_replace("#\[s\](.*?)\[\/s\]#si","<small>\\1</small>", $input);

return $input;}

function simile($zinute) {
$zinute = str_replace(":easter"," <img src=\"images/smailai/easter.gif\" alt=\":easter\"/> ", $zinute);
$zinute = str_replace(":)"," <img src=\"images/smailai/1.gif\" alt=\":)\"/> ", $zinute); 
$zinute = str_replace(":D"," <img src=\"images/smailai/2.gif\" alt=\":D\"/> ", $zinute); 
$zinute = str_replace(";)"," <img src=\"images/smailai/3.gif\" alt=\";)\"/> ", $zinute); 
$zinute = str_replace(":smoke"," <img src=\"images/smailai/5.gif\" alt=\":smoke\"/> ",$zinute); 
$zinute = str_replace(":liux"," <img src=\"images/smailai/6.gif\" alt=\":liux\"/>",  $zinute); 
$zinute = str_replace(":crazy"," <img src=\"images/smailai/7.gif\" alt=\":crazy\"/>", $zinute); 
$zinute = str_replace(":hi"," <img src=\"images/smailai/8.gif\" alt=\":hi\"/> ",$zinute); 
$zinute = str_replace(":F"," <img src=\"images/smailai/9.gif\" alt=\":F\"/> ",$zinute); 
$zinute = str_replace(":P"," <img src=\"images/smailai/10.gif\" alt=\":P\"/> ",$zinute); 
$zinute = str_replace(":xaxa"," <img src=\"images/smailai/11.gif\" alt=\":xaxa\"/> ",$zinute); 
$zinute = str_replace(":devil"," <img src=\"images/smailai/12.gif\" alt=\":devil\"/> ",$zinute); 
$zinute = str_replace(":finger"," <img src=\"images/smailai/13.gif\" alt=\":finger\"/> ",$zinute); 
$zinute = str_replace("=D"," <img src=\"images/smailai/14.gif\" alt=\"=D\"/> ",$zinute); 
$zinute = str_replace(":/"," <img src=\"images/smailai/15.gif\" alt=\":/\"/> ",$zinute); 
$zinute = str_replace(";]"," <img src=\"images/smailai/17.gif\" alt=\";]\"/> ",$zinute); 
$zinute = str_replace(":("," <img src=\"images/smailai/18.gif\" alt=\":(\"/> ",$zinute); 
$zinute = str_replace(":liuksas"," <img src=\"images/smailai/19.gif\" alt=\":liukas\"/> ",$zinute); 
$zinute = str_replace("=]"," <img src=\"images/smailai/20.gif\" alt=\"=]\"/> ",$zinute); 
$zinute = str_replace(":xe"," <img src=\"images/smailai/22.gif\" alt=\":xe\"/> ",$zinute); 
$zinute = str_replace("=("," <img src=\"images/smailai/23.gif\" alt=\"=(\"/> ",$zinute); 
$zinute = str_replace(";D"," <img src=\"images/smailai/24.gif\" alt=\";D\"/> ",$zinute); 
$zinute = str_replace(":bann"," <img src=\"images/smailai/25.gif\" alt=\":bann\"/> ",$zinute); 
$zinute = str_replace(":z"," <img src=\"images/smailai/26.gif\" alt=\":z\"/> ",$zinute); 
$zinute = str_replace(":lol"," <img src=\"images/smailai/27.gif\" alt=\":lol\"/> ",$zinute); 
$zinute = str_replace(":lezuvis"," <img src=\"images/smailai/28.gif\" alt=\":lezuvis\"/> ",$zinute); 
$zinute = str_replace("B)"," <img src=\"images/smailai/29.gif\" alt=\"B)\"/> ",$zinute); 
$zinute = str_replace(":yay"," <img src=\"images/smailai/30.gif\" alt=\":yay\"/> ",$zinute); 
$zinute = str_replace(":o"," <img src=\"images/smailai/31.gif\" alt=\":o\"/> ",$zinute); 
$zinute = str_replace(":doleris"," <img src=\"images/smailai/33.gif\" alt=\":doleris\"/> ",$zinute); 
$zinute = str_replace(":?"," <img src=\"images/smailai/34.gif\" alt=\":?\"/> ",$zinute); 
$zinute = str_replace(":!"," <img src=\"images/smailai/35.gif\" alt=\":!\"/> ",$zinute); 
$zinute = str_replace(":piktas"," <img src=\"images/smailai/36.gif\" alt=\":piktas\"/> ",$zinute); 
$zinute = str_replace(":B"," <img src=\"images/smailai/37.gif\" alt=\":B\"/> ",$zinute); 
$zinute = str_replace(":salta"," <img src=\"images/smailai/38.gif\" alt=\":salta\"/> ",$zinute); 
$zinute = str_replace(":be"," <img src=\"images/smailai/39.gif\" alt=\":be\"/> ",$zinute); 
$zinute = str_replace(":vemiu"," <img src=\"images/smailai/40.gif\" alt=\":vemiu\"/> ",$zinute); 
$zinute = str_replace(":cool"," <img src=\"images/smailai/cool.gif\" alt=\":cool\"/> ", $zinute); 
$zinute = str_replace(":drink"," <img src=\"images/smailai/drink.gif\" alt=\":drink\"/> ", $zinute); 
$zinute = str_replace(":fermer"," <img src=\"images/smailai/fermer.gif\" alt=\":fermer\"/> ", $zinute); 
$zinute = str_replace(":agree"," <img src=\"images/smailai/agree.gif\" alt=\":agree\"/> ", $zinute); 
$zinute = str_replace(":acute"," <img src=\"images/smailai/acute.gif\" alt=\":sacute\"/> ",$zinute); 
$zinute = str_replace(":bye"," <img src=\"images/smailai/bye.gif\" alt=\":bye\"/>",  $zinute); 
$zinute = str_replace(":dance"," <img src=\"images/smailai/dance.gif\" alt=\":dance\"/>", $zinute); 
$zinute = str_replace(":dash"," <img src=\"images/smailai/dash.gif\" alt=\":dash\"/> ",$zinute); 
$zinute = str_replace(":dirol"," <img src=\"images/smailai/dirol.gif\" alt=\":dirol\"/> ",$zinute); 
$zinute = str_replace(":king"," <img src=\"images/smailai/king.gif\" alt=\":king\"/> ",$zinute); 
$zinute = str_replace(":tease"," <img src=\"images/smailai/tease.gif\" alt=\":tease\"/> ",$zinute); 
$zinute = str_replace(":rolf"," <img src=\"images/smailai/rofl.gif\" alt=\":rolf\"/> ",$zinute); 
$zinute = str_replace(":shull"," <img src=\"images/smailai/skull.gif\" alt=\":skull\"/> ",$zinute); 
$zinute = str_replace(":ruko"," <img src=\"images/smailai/ruko.gif\" alt=\":ruko\"/> ",$zinute); 
$zinute = str_replace(":xi"," <img src=\"images/smailai/xi.gif\" alt=\":xi\"> ",$zinute); 
$zinute = str_replace(":angel2"," <img src=\"images/smailai/32.gif\" alt=\":angel2\"/> ",$zinute); 
$zinute = str_replace(":blink"," <img src=\"images/smailai/blink.gif\" alt=\":blink\"/> ",$zinute); 
$zinute = str_replace(":taunt"," <img src=\"images/smailai/taunt.gif\" alt=\":taunt\"/> ",$zinute); 
$zinute = str_replace(":traning"," <img src=\"images/smailai/traning.gif\" alt=\":traning\"> ",$zinute); 
return $zinute;
}
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))$ip = check($_SERVER['HTTP_X_FORWARDED_FOR']);
	  elseif(isset($_SERVER['REMOTE_ADDR'])) $ip = check($_SERVER['REMOTE_ADDR']);
	  else $ip = 'Unknown';

if (isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])) {$narsykle= $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];}
elseif(isset($_SERVER['HTTP_USER_AGENT'])) {$narsykle = $_SERVER['HTTP_USER_AGENT'];}
$narsykle = check($narsykle);

function nars($nrs) {
list($nrs) = explode('/', $nrs);
return $nrs;}

?>