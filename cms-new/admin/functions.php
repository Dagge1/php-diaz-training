<?php // funkcije za pojedine radnje u kodu - refactoring da bude kod na stranama čistiji


// ubaci kategorije u Admin/categories.php
function insert_categories() {
    global $connection;  // mora biti deklarirana var kao global jer je unutar funkcije sve lokalno
    if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];

    if ($cat_title == "" || empty($cat_title)) {
        echo 'This field should not be empty';
    } else {
        $query = "INSERT INTO categories (cat_title) VALUE ('$cat_title')";

        $create_category_query = mysqli_query($connection, $query);

        if(!$create_category_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
    }
    }
} // end of insert_categories()


// funkcija nađi sve kategorije u Admin/categories.php
function findAllCategories() {
    global $connection;

    $query = "SELECT * FROM categories"; // limitiraj prikaz na 4 kategorije
        $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo '<tr><td>' . $cat_id . '</td>';   // <tr> table row, stavlja svaki unos u novi red
        echo '<td>' . $cat_title . '</a></td>'; // <tr>..</tr> ide na početak i kraj redova
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</td>"; // drugi način insertanja HTML-a u PHP, sa {} i "
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</td></tr>";  // link za edit kategorije
    }
}  // end of findAllCategories()


// funkcija za brisanje kategorija u Admin/categories.php
function deleteCategories() {
    global $connection;

    if (isset($_GET['delete'])) {    // ako je kliknuo link 'delete'..
        $the_cat_id = $_GET['delete'];   // ubaci vrijednost iz global arraya GET['delete'] u $the_cat_id..

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";  // napiši query za deletanje..
        $delete_query = mysqli_query($connection, $query);     // i pošalji u bazu na izvršenje
        header("Location: categories.php");  // ponovo učitava stranicu da vidimo promjenu. 
    // header() šalje na stranu koju hoćemo ali na vrhu mora biti uključeno ob_start() (output buffer)
    }
} // end of deleteCategories()



?>