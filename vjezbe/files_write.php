<?php 
// pisanje u fajl 
$file = "example.txt";

if ($handle = fopen($file, 'w')) {

    fwrite ($handle, 'I love PHP');  // upisivanje u fajl
    fclose($handle);  // nakon korištenja trebamo zatvoriti
} else {
    echo 'File cannot be written';
}


?>
