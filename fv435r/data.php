//copyrights - ImMartynas 2015

<?php

	$daa = date ('H:i');
	function data_lt()
	{
	$menesis = date('n');
	$mas_menesiai = array("Sausio","Vasario","Kovo","Baland&#382;io","Gegu&#382;&#279;s","Bir&#382;elio","Liepos","Rugpju&#269;io","Rugs&#279;jo","Spalio","Lapkri&#269;io","Gruod&#382;io");	
	$data = date('Y\m. ');
	$data .= $mas_menesiai[$menesis-1];
	$data .= date(' j\d. ');
	return $data;
	}	
	function diena_lt()
	{
	$sav_diena = date ('w');
	$mas_diena = array("Pirmadienis","Andradienis","Tre&#269;iadienis","Ketvirtadienis","Penktadienis","&#352;e&#353;tadienis","Sekmadienis");
	$dataa .= $mas_diena[$sav_diena-1];
	return $dataa;
	}
	$dato=date('H:i');
	echo "Dabar: <b>$daa</br>";
	echo data_lt(); 
	echo diena_lt();
	echo "</b><br>";
	?>