<!-- $_POST je superglobal assoc. array varijabla u koju su spremljeni podaci koje šaljemo putem forme -->
<?php  // ovaj kod Apache server učitava prije svega (prije renderiranja html stranice)
if (isset($_POST['submit'])) {
     echo $_POST['ime'] . ' ';  // podatak u $_POST identificiramo sa 'name' indeksom $_POST arraya..
     echo $_POST['pass'];       // koji je identičan vrijednosti 'name' polja u formi
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms</title>
</head>
<body>
<form action="forms.php" method="POST">     <!-- action šalje podatke na drugu stranicu na obradu, method je način slanja -->
    <input type="text" name="ime" placeholder="Enter name">
    <input type="password" name="pass" placeholder="Enter password">
    <input type="submit" name="submit">  <!-- 'name' je keyword pomoću koje šaljemo i identificiramo ovaj unos u $_POST-u-->

</body>    
</html>