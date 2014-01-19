<?php
for ($i = 0; $i < 10; $i++) {
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
#echo $serial;
file_put_contents('keys.txt', $serial . "\n", FILE_APPEND);
}
echo "gratz";
?>
