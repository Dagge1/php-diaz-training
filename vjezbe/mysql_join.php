<!-- MySQL JOIN komanda - prikaz podataka iz dvije tabele, te tri tabele -->

<?php 
$connection = mysqli_connect('localhost', 'root', '', 'mysql_join');

if (!$connection) {
    die('Connection failed' . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQL JOIN samples</title>
</head>
<body>
<?php 
// ** INNER JOIN - prikaži iz dvije tabele samo recorde koji imaju isti id.
// NApomena: ne mora biti isti broj unosa u tabelama (tabela lastname ima jedan unos više)
// $query = "SELECT * FROM firstname INNER JOIN lastname ON firstname.id = lastname.id_firstname";

// ** LEFT JOIN - prikaži sve iz prve tabele i samo one iz druge koji imaju isti id.
// $query = "SELECT * FROM firstname LEFT JOIN lastname ON firstname.id = lastname.id_firstname";

// ** RIGHT JOIN - prikaži sve iz druge tabele i samo one iz prve koji imaju isti id.
// $query = "SELECT * FROM firstname RIGHT JOIN lastname ON firstname.id = lastname.id_firstname";

// ** INNER JOIN tri tabele, glavna je prva. Može i više tabela, poželjno da je LEFT JOIN
$query = "SELECT * FROM firstname LEFT JOIN lastname ON firstname.id = lastname.id_firstname ";
$query .= "LEFT JOIN job ON lastname.id_firstname = job.id_firstname";


$all_posts = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($all_posts)) {
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $job = $row['job'];

    echo $firstname . ' ' . $lastname .  ' - '  . $job .'<br>';
}

?>    

</body>
</html>