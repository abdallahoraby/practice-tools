<?php


$file = fopen("./ncode.txt", "r");

$templine = "";

while (!feof($file)) {

    $line = fgets($file);
    if (count(explode(" ", $line)) == 1) {
        $templine = $templine . $line;
        echo $templine . "<br />";

        $templine = "";
    } else {
        $templine = $line;
    }
}
// print("<pre>".print_r($baseline,true)."</pre>");

fclose($file);
