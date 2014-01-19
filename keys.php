<?php
$tokens = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

$serial = '';

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $serial .= $tokens[rand(0, 35)];
    }

    if ($i < 3) {
        $serial .= '-';
    }
}

If (!isset($_GET['key'])){
    echo $serial;
    die;
}
header ("Content-type: image/png");

$text = $serial;

$img = imagecreate (imagefontwidth(5) * strlen($text), imagefontheight(5));
imagecolorallocate ($img, 255, 255, 255);
ImageString ($img, 5, 0, 0, $text, ImageColorAllocate($img, 0, 0, 0));
ImagePNG ($img);
?>
