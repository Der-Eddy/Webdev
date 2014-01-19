<?php 
header ("Content-type: image/png");

$user = "Der-Eddy";
$tracks = 5;

// folder need full (777) permissions
$tmp = $_SERVER[DOCUMENT_ROOT]. "/webdev/recenttracks.txt";

$src = @file_get_contents("http://ws.audioscrobbler.com/1.0/user/". $user . "/recenttracks.txt");
$file = fopen($tmp, "w");
fwrite($file, $src);
fclose($file);

$content = file_get_contents($tmp);
$content = str_replace( '–', '-', $content ); 
$content = explode("\n", $content);

$played = false;
$listingto_old = 0;
$listnigto = array();
$track_num = 1; // starting track number (you could change to count($cache) and count down)  
foreach($content as $data)
{  
if(!empty( $data ))
{  
$info = explode(",", $data, 2); // sperates date by only seperating at fist instance of a comma (since some artist/track have comma in their names
  
$played_time = $info[0];  
$info_track = explode(" - ", $info[1]); // seperates artist and title  

$date = date_create();

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
$imwidth = 400;
#$imheight  = imagefontheight(5) * $tracks + 3;
$imheight = 130;
$im = imagecreatetruecolor ($imwidth, $imheight);

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

imagecopy($im, $wm, imagesx($im) - imagesx($wm), imagesy($im) - imagesy($wm), 0, 0, $imwidth, $imheight);

switch (mt_rand(1, 5)){
    case 1:
        $color = ImageColorAllocate($im, 25, 115, 205);
        break;
    case 2:
        $color = ImageColorAllocate($im, 205, 50, 50);
        break;
    case 3:
        $color = ImageColorAllocate($im, 35, 140, 35);
        break;
    case 4:
        $color = ImageColorAllocate($im, 240, 120, 0);
        break;
    case 5:
        $color = ImageColorAllocate($im, 255, 70, 0);
        break;
}

$fick = date_timestamp_get($date) - 900;
ImageTTFText ($im, 14, 0, 0, 20, ImageColorAllocate($im, 0, 0, 0), "arialuni.ttf", "Last heard on iTunes:");
for ($i = 0; $i <= $tracks; $i++){
    if (date_timestamp_get($date) - 5000 < $played_time && !$played){
        ImageTTFText ($im, 14, 0, 0, ($i + 1) * 20, ImageColorAllocate($im, 255, 0, 0), "arialuni.ttf", $listingto[$i]);
        $played = true;
    }
    ImageTTFText ($im, 14, 0, 0, ($i + 1) * 20, $color, "arialuni.ttf", $listingto[$i]);
}

imagepng ($im);
imagedestroy($im);
imagedestroy($wm);
?>