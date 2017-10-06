<?php 
// otvara fajl, ako ne postoji generira ga 
$file = "example.txt";

// funkc. za otvaranje fajla sa namjerom pisanja w, returna handle da li je moguće ili ne otvoriti
$handle = fopen($file, 'w');  // ako ne postoji fajl onda ga kreira

fclose($handle);  // nakon korištenja trebamo zatvoriti

?>
