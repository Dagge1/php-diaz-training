<?php 
include "db.php";  // includaj connection to database

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

// sanitizacija user inputa prije slanja u bazu (protiv db injection-a). Sada možeš unositi i dav's
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

// password encryption sa crypt(). $2y$ je početni kod na blowfish enc., 10$ je koliko x će se
// ponoviti enkriptiranje, svaki put drukčije (kao loto loptice), iza toga ide moj salt - min 22 znaka
$hashFormat = "$2y$10$";
$salt = "iusesomecrazystrings22";  // min 22 karaktera, bilo koji string koji želim 
$hash_and_salt = $hashFormat . $salt; // spajamo ih zajedno u jedan simplexml_load_string
$password = crypt($password, $hash_and_salt);  // enkriptirani user password

    $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";  // query komanda
    $result = mysqli_query($connection, $query);  // šalji query u bazu
    if (!$result) {
        die('Query failed' . mysqli_error());
    }
}
?>    
<?php include"includes/header.php"; ?>  <!--  includaj cijeli header -->


<div class="container-fluid">
    <div class="col-sm-2">
    <h4>Create New entry</h4>
        <form action="login_create.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
    </div>

<?php include"includes/footer.php"; ?>  <!--  includaj footer -->