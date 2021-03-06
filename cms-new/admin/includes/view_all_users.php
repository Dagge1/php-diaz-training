<!-- tabla iz posts.php za prikaz postova (defaultni krikaz) -->

<table class="table table-striped table-condensed table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>

<?php // prikaz usera u users.php
$query = "SELECT * FROM users"; 
$select_users = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];

    //  echo "<tr>";
    echo "<td>{$user_id}</td>";
    echo "<td>{$username}</td>";
    echo "<td>{$user_firstname}</td>";

    // query za prikaz kategorije
/*
$query = "SELECT * FROM categories WHERE cat_id = '$post_category_id' "; 
    $select_categories_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
}
    echo "<td>{$cat_title}</td>";
 */
 // *** end of dio za prikaz kategorije

    echo "<td>{$user_lastname}</td>";
    echo "<td>{$user_email}</td>";
    echo "<td>{$user_role}</td>";


    echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
    echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
    echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
    echo "</tr>";
} // end of while
?>
        </tbody>
</table>

<?php
// change user to Admin   
if (isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];
    
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id} ";
    $change_to_admin_query = mysqli_query($connection, $query); 
    header("Location: users.php"); // mora refreshati stranu da se vidi bez deletanog
}

// change user to subscriber   
if (isset($_GET['change_to_sub'])) {
    $the_user_id = $_GET['change_to_sub'];
    
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id} ";
    $change_to_sub_query = mysqli_query($connection, $query); 
    header("Location: users.php"); // mora refreshati stranu da se vidi bez deletanog
}


// delete user   
if (isset($_GET['delete'])) {
  if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == 'admin') {  // da ne deletaju iz url-a sa sql injection

        $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
        
        $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
        $delete_user_query = mysqli_query($connection, $query); 
        header("Location: users.php"); // mora refreshati stranu da se vidi bez deletanog
    } 
}
}


/*
if (isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = '$the_comment_id' ";
    $delete_query = mysqli_query($connection, $query); 
    header("Location: comments.php"); // mora refreshati stranu da se vidi bez deletanog
}
*/
?>