//copyrights - ImMartynas 2015

<?php
include ("fv435r/config.php");
if (empty($_GET['file'])){ ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script> alert('Klaida Tuščias Failo Pavadinimas!');</script><?php }
elseif (!file_exists("download/".$_GET['file'])) { ?><script> alert('Klaida #404 Failas Nerastas!');</script><?php }
else{
mysql_query("UPDATE `download` SET `downloads` = `downloads`+1 WHERE `adress` ='".$_GET['file']."'");



$file = 'download/'.$_GET['file'];
header ("Content-Type: application/octet-stream");
header ("Accept-Ranges: bytes");
header ("Content-Length: ".filesize('download/'.$_GET['file']));
header ("Content-Disposition: attachment; filename=".$_GET['file']);
readfile('download/'.$_GET['file']);
}
?>