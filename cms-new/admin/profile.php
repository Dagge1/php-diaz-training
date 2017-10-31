<!-- Admin/posts.php -->
<?php include "includes/admin_header.php"; ?>  <!-- header je maknut u includes/header.php -->

<?php // ako je logiran user, ubaci njegove podatke za editiranje user profila 
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$username' ";
    $select_user_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
} // end of if
?>


<?php // kod za update user profile
if (isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

$query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_role = '$user_role', ";
    $query .= "username = '$username', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_password = '$user_password' ";
    $query .= "WHERE username = '$username' ";

    $edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);
    
    header("Location: users.php");
   
} // end of if    


?>




    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>         

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

    <h1 class="page-header">Welcome to Profile<small> Author</small></h1>


 <!-- ovdje ide u sredinu strane tabla ovisno o izboru dolje -->
 
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
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">    
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
</div>

</form>



                    </div>    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>