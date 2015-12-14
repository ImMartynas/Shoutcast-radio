//copyrights - ImMartynas 2015

<?php
//Nustatymai:
$server2 = "s1.justhost.lt"; //IP shoutcast serverio
$server2port = ""; //Port shoutcast serverio
$server2pass = "r"; //Slaptazodis shoutcast serverio

$dateix = fsockopen("$server2", $server2port, &$errno, &$errstr);
if( !$dateix )
{
echo "<span style='font-family:Verdana;font-size:10px;color:#0897e7;font-weight:bold;'><red>Radijas neveikia.</red></span><br>";
fclose($dateix);
}
else
{
echo "<span style='font-family:Verdana;font-size:10px;color:#0897e7;font-weight:bold;'>Radijas veikia.</span><br>";
fputs($dateix,"GET /admin.cgi?pass=$server2pass&mode=viewxml HTTP/1.0\r\nUser-Agent: Mozilla/4.0  (compatible; MSIE 4.01; Windows NT;)\r\n\r\n");
while (!(feof($dateix)))
{
$zeilex .= fgets($dateix, 4096);
}
fclose($dateix);
}
$tmpx = explode("<CURRENTLISTENERS>", $zeilex);
$tmpx = explode("</CURRENTLISTENERS>", $tmpx[1]);
$klauso = $tmpx[0];
$pl2 = " ";
$tmpx = explode("<SERVERGENRE>", $tmpx[1]);
$tmpx = explode("</SERVERGENRE>", $tmpx[1]);
$tmp2x = explode("+", $tmpx[0]);
$nick2 = $tmp2x[0];
$eteryje = explode("<AIM>", $zeilex);
$eteryje = explode("</AIM>", $eteryje[1]);
$eteryje1 = $eteryje[0];
$laida = explode("<ICQ>", $zeilex);
$laida = explode("</ICQ>", $laida[1]);
$laida1 = $laida[0];

if(count($tmp2x) == 2)
$pl2 = $tmp2x[1];

$tmpx = explode("<SERVERTITLE>", $tmpx[1]);
$tmpx = explode("</SERVERTITLE>", $tmpx[1]);
$server2title = $tmpx[0];
$tmpx = explode("<SONGTITLE>", $tmpx[1]);
$tmpx = explode("</SONGTITLE>", $tmpx[1]);
$kas_groja = $tmpx[0];
$tmpx = explode("<STREAMSTATUS>", $tmpx[1]);
$tmpx = explode("</STREAMSTATUS>", $tmpx[1]);
$stream2status = $tmpx[0];
?>