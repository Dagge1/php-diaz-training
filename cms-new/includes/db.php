<?php 
// connection to database
$connection = mysqli_connect('localhost', 'root', '', 'cms-new');

if (!$connection) {
    die('Connection error ' . mysqli_error($connection));
}

?>