<?php 

session_start();

header('Content-type: image/gif');
$image = imagecreate(100,30); //Paveiksliuko fonas

$kod = '0123456789aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPrRsStTuUvVzZ';
$kod = str_shuffle($kod);
$kod = substr($kod,0,6);
$_SESSION["code"] = $kod;

$font = '5667.ttf';
imagecolorallocate($image,15,15,15);
$a=0;

for($i=0; $i < 6; $i++) {
$arr[$i] = substr($kod,$i,1);
$color1=rand(0,255);
$color2=rand(0,255);
$color3=rand(0,255);
$color=imagecolorallocate($image,$color1,$color2,$color3);
imagettftext($image, 15, rand(20,-19), $a+=14, rand(20,25), $color, $font, $arr[$i]);

//size, text-size, rotation, spacing, height ,color,font,text
}
imagegif($image);
imagedestroy($image); 


?>