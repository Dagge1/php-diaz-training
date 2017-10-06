<?php     // default db connection file
$connection = mysqli_connect('localhost', 'root', '', 'loginapp');  // spajanje na bazu    

$query = "SET CHARSET utf8";  // ovo mora da bi u bazi bila naša slova
mysqli_query($connection, $query);

    if (!$connection) {
        die('Query failed' . mysqli_error());
    }
?>    