<?php  // forma za unos usera na view_all_posts.php bazirano na switch()
if (isset($_POST['create_user'])) {
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
   /*
    $post_image = $_FILES['image']['name'];           // ime slike
    $post_image_temp = $_FILES['image']['tmp_name'];  // slika, kada odaberemo stavlja je u tmp
*/
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');

//    move_uploaded_file($post_image_temp, "../images/{$post_image}"); // funkc. za ubacivanje imagea iz tmp u naš direktorij

$query = "INSERT INTO users (user_firstname, user_lastname, user_role, username,
 user_email, user_password, user_image) ";
$query .= "VALUES ('$user_firstname', '$user_lastname', '$user_role', ";
$query .= "'$username', '$user_email', '$user_password', '') "; // user image mora imati unos

$create_user_query = mysqli_query($connection, $query);

confirmQuery($create_user_query); // funkcija za potvrdu queryja, u functions.php

}
?>


<form action="" method="POST" enctype="multipart/form-data"> <!-- multipart je za unos slika -->

<div class="form-group">
    <label for="author">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">    
</div>

<div class="form-group">
    <label for="post_status">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">    
</div>

<!-- pulldown menu -->
<div class="form-group">
    <select name="user_role" id="">
    
        <option value="subscriber">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
</div>


<!-- <div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" class="form-control" name="image">    
</div> -->

<div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text" class="form-control" name="username">    
</div>

<div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" class="form-control" name="user_email">    
</div>

<div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" class="form-control" name="user_password">    
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
</div>

</form>
