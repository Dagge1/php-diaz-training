<?php  // edit usera

if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id"; 
    $select_users_query = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_db_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }   

} // end of if

// ako je kliknuo na izmjene
if (isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


$hashed_password = password_hash($user_password, PASSWORD_BCRYPT, ['cost' => 10]);


if ($user_password !== $user_db_password) {
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_role = '$user_role', ";
    $query .= "username = '$username', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_password = '$hashed_password' ";
    $query .= "WHERE user_id = $the_user_id ";
} else {
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_role = '$user_role', ";
    $query .= "username = '$username', ";
    $query .= "user_email = '$user_email' ";
    $query .= "WHERE user_id = $the_user_id ";
}

$edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);

    header("Location: users.php");
   
} // end of if    
?>


<form action="" method="POST" enctype="multipart/form-data"> <!-- multipart je za unos slika -->

<div class="form-group">
    <label for="author">Firstname</label>
    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">    
</div>

<div class="form-group">
    <label for="post_status">Lastname</label>
    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">    
</div>

<!-- pulldown menu -->
<div class="form-group">
    <select name="user_role" id="">
 
    <option value="<?php echo $user_role; ?>"><?php echo $user_role ?></option>
<?php 
if ($user_role == 'admin') {
    echo "<option value='subscriber'>Subscriber</option>";
} else {
    echo "<option value='admin'>Admin</option>";
//ako je više opcija dodaj npr if (admin) {<option selected>}
}
?>    
    </select>
</div>


<!-- <div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" class="form-control" name="image">    
</div> -->

<div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">    
</div>

<div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">    
</div>

<div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" value="<?php echo $user_db_password; ?>" class="form-control" name="user_password">    
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
</div>

</form>
