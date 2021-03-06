﻿<?php
#<meta charset="utf-8" />

header ("Content-type: image/png");
		
recenttracks("Der-Eddy");

function recenttracks($user)  
{  
// location on server where the cached file will be located (it must be absolute and the folder must have full (777) permission)  
$cache = $_SERVER[DOCUMENT_ROOT]. "/webdev/recenttracks.txt";   
  
// you could add here the ability to only cache ever 30 min or so, but I like it live  
#filemtime($cache);  
$update = @file_get_contents("http://ws.audioscrobbler.com/1.0/user/". $user . "/recenttracks.txt");  
$f = fopen($cache, "w");  
fwrite($f, $update);  
fclose($f);  
  
$cache = file_get_contents($cache);  
$cache = str_replace( '–', '-', $cache ); // replaces en dash with regular dash (thanks MrSomeone - http://www.last.fm/user/MrSomeone/)  
$cache = explode("\n", $cache);  

$tracks = 5;
$listingto_old = 0;
$listnigto = array();
$track_num = 1; // starting track number (you could change to count($cache) and count down)  
foreach($cache as $data)
{  
if(!empty( $data ))
{  
$info = explode(",", $data, 2); // sperates date by only seperating at fist instance of a comma (since some artist/track have comma in their names
  
$played_time = $info[0];  
$info_track = explode(" - ", $info[1]); // seperates artist and title  
  
$artist = $info_track[0];  
$title = $info_track[1];  
if (strlen($title) > 29){$title = substr($title, 0, 27) . "...";}

$listingto[$track_num] = $track_num . ". ". $title . ' - ' . $artist;
if (strlen($listingto[$track_num]) > strlen($listingto_old)){$listingto_old = $listingto[$track_num];}

if ($track_num == $tracks){break;}
$track_num++; // adds 1 to track number
}  
}
#$imwidth = imagefontwidth(5) * strlen($listingto_old);
#$imheight  = imagefontheight(5) * $tracks + 3;
$im = imagecreatetruecolor (400, 130);

$wm = ImageCreateFromPNG ("./images/lastfm.png");
imagealphablending($wm, true);
imagecolorallocate ($wm, 255, 255, 255);
$almostblack = imagecolorallocate($wm,254,254,254);
imagefill($wm,0,0,$almostblack);
$black = imagecolorallocate($wm,0,0,0);
imagecolortransparent($wm,$almostblack);
imagesavealpha($wm, true);
imagealphablending($wm, false);

imagecolorallocate ($im, 255, 255, 255);
$almostblack = imagecolorallocate($im,254,254,254);
imagefill($im,0,0,$almostblack);
$black = imagecolorallocate($im,0,0,0);
imagecolortransparent($im,$almostblack);

#imagecopymerge($im, $wm, imagesx($im) - imagesx($wm), imagesy($im) - imagesy($wm), 0, 0, 400, 130, 90);
imagecopy($im, $wm, imagesx($im) - imagesx($wm), imagesy($im) - imagesy($wm), 0, 0, 400, 130);

ImageTTFText ($im, 14, 0, 0, 20, ImageColorAllocate($im, 0, 0, 0), "arialuni.ttf", "Zuletzt über iTunes gehört:");
for ($i = 0; $i <= $tracks; $i++){
	#ImageString ($im, 4, 0, ($i - 1) * imagefontheight(5), $listingto[$i], ImageColorAllocate($im, 0, 0, 0));
        ImageTTFText ($im, 14, 0, 0, ($i + 1) * 20, ImageColorAllocate($im, 0, 0, 0), "arialuni.ttf", $listingto[$i]);
}

#imagealphablending($im, false);
#imagesavealpha($im, true);

imagepng ($im);
imagedestroy($im);
imagedestroy($wm);
#return $listingto;
}
?>