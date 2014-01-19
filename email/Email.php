<?php
#RewriteRule ^(.*)\.png$ Email.php?text=$1

header ("Content-type: image/png");

$text = filter_var($_GET['text'], FILTER_SANITIZE_ENCODED);

$img = imagecreate (imagefontwidth(5) * strlen($text), imagefontheight(5));
imagecolorallocate ($img, 255, 255, 255);
ImageString ($img, 5, 0, 0, $text, ImageColorAllocate($img, 0, 0, 0));
ImagePNG ($img);
?>