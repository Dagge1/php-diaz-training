<?php // prikazue podatke poslane iz forme na forms_validation.php
if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];  
    $password = $_POST['pass']; 
    echo $ime . '<br>';
    
    $checkName = ['peter', 'mike', 'davor']; // za provjeru da li postoji username u bazi

    if (strlen($ime) < 4) {  // validacija user inputa. Ako je dužina kraća od 5..
        echo 'Username treba biti duži od 4 slova <br>';
    }
    if (!in_array($ime, $checkName)) {  // ako ne postoji $ime u bazi $checkName, ulaz je zabranjen
        echo 'Ulaz odbijen, username ne postoji u bazi';
    } else {
        echo 'Dobrodošli ' . $ime;
    }
}
?>
