<?php 
// connection to database
$connection = mysqli_connect('localhost', 'root', '', 'cms-new');

if ($connection) {
    echo 'We are connected';
}

?>