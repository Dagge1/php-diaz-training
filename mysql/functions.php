<?php
include "db.php";  // included connection to db

function showAllData() {  // podaci za pulldown select id u fajlu login_update
    global $connection;  // mora biti global da bi global varijablu koristili u funkciji (local scope)

    $query = "SELECT * FROM users";  // query komanda za read
    $result = mysqli_query($connection, $query);  // šalje query u bazu

    if (!$result) {
        die('Query failed' . mysqli_error());
    }  

    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];  // ubaci id iz baze

        echo "<option value='$id'>ID $id</option>";  // ubaci id u pulldown meni
    }
};

function updateTable() {   //updata bazu sa unosima iz login_update.php
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    
    $query = "UPDATE users SET username = '$username', password = '$password' ";
    $query .= "WHERE id = $id"; 
    
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query failed' . mysqli_error($connection));
    }
};  

function deleteRows() {   // deletaj unos iz baze u login_delete.php
    global $connection;

    $id = $_POST['id'];
    
    $query = "DELETE FROM users WHERE id = $id"; 
    
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        die('Query failed' . mysqli_error($connection));
    }
};

?>