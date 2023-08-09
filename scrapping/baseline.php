<?php


$file = fopen("./baseline/b9.txt", "r");

while(! feof($file)) {

    $line = fgets($file);
    $line = preg_replace('/\d+/', '', $line );
    $line = preg_replace('/\./', '', $line );
    $line = preg_replace('/\./', '', $line );

    $stmt = explode(" ", $line);
    $baseline[$stmt[0]] = $stmt[1];
}
print("<pre>".print_r($baseline,true)."</pre>");

fclose($file);

