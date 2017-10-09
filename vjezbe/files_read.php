<?php 
// pčitanje iz fajla 
$file = "example.txt";

if ($handle = fopen($file, 'r')) {

    echo $content = fread($handle, filesize($file));  // filesize() čita cijeli fajl, inače broj char npr 10
    fclose($handle);   
} else {
    echo 'File cannot be read';
}


?>
