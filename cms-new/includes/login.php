<!-- login forma za slanje login podataka u db -->
<?php include "db.php"; ?>
<?php session_start(); ?> <!-- server uključuje session da zapamti usera koji se logirao -->
   

<?php 
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

// cleaning before sending to a db, to prevent sql injection
  $username = mysqli_real_escape_string($connection, $username); 
  $password = mysqli_real_escape_string($connection, $password); 

  $query = "SELECT * FROM users WHERE username = '$username' ";
  $select_user_query = mysqli_query($connection, $query);

  if (!$select_user_query) {
    die('Query failed' . mysqli_error($connection));
  }

  while($row = mysqli_fetch_assoc($select_user_query)) {
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
  }
// reversamo enkriptirani pass da bi unosom 
//u login našeg nekriptiranogmogli usporediti sa kriptiranim u bazi
  $password = crypt($password, $db_user_password); 

  // ako je login uspio, ubaci user podatke iz baze u session array i šalji ga u admin
  if ($username === $db_username && $password === $db_user_password) {
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;

    header("Location: ../admin"); 
    
  } else {
    header("Location: ../"); // ako nije uspjelo, šalji ga na index.php
}
}

?>