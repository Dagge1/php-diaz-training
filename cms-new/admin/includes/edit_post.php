<?php // kod za editiranje posta, kod se ubacuje nakon klika Edit na stranu posts.php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}
// odaber post za editiranje na osnovu p_id poslanom u adresi sa GET
$query = "SELECT * FROM posts WHERE post_id = '$the_post_id' "; 
$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_user = $row['post_user'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
}

// ako je kliknuo Update updataj post
if (isset($_POST['update_post'])) {
    
    $post_title = $_POST['post_title'];
    $post_user = $_POST['post_user'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_tags = $_POST['post_tags'];

move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {  // ako nisam odabrao novi image, updataj stari iz baze
        $query = "SELECT * FROM posts";
        $select_image =mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '$post_title', ";
    $query .= "post_category_id = '$post_category_id', ";
    $query .= "post_date = now(), ";
    $query .= "post_user = '$post_user', ";
    $query .= "post_status = '$post_status', ";
    $query .= "post_tags = '$post_tags', ";
    $query .= "post_content = '$post_content', ";
    $query .= "post_image = '$post_image' ";
    $query .= "WHERE post_id = '$the_post_id' ";

    $update_post = mysqli_query($connection, $query);
    confirmQuery($update_post);
    header("Location: ./posts.php");
};
?>


<form action="" method="POST" enctype="multipart/form-data"> <!-- multipart je za unos slika -->

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">    
</div>

<!-- pulldown menu -->
<div class="form-group">
    <select name="post_category" id="">
<?php
$query = "SELECT * FROM categories"; 
    $select_categories = mysqli_query($connection, $query);

    confirmQuery($select_categories);  // za potvrdu queryja

while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title']; 

    echo "<option value='$cat_id' >$cat_title</option>";   
      
}
?>
    </select>
</div>

<!-- pulldown za odabir usera -->
<div class="form-group">
<label for="users">Users</label>
    <select name="post_user" id="">
<?php
// prvo prikaži default unos u pulldown meniju (iz baze)...
echo "<option value='$post_user'>{$post_user}</option>";   

$query = "SELECT * FROM users"; 
    $select_users = mysqli_query($connection, $query);

    confirmQuery($select_users);  

while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username']; 

// .. zatim ga izostavi, da ne ponovi pulldown prikaz već unesenog default usera
    if($username !== $post_user) {
        echo "<option value='$username'>{$username}</option>";   
    }  
}
?>
    </select>
</div>

<!--
<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" value="<?php echo $post_user; ?>" class="form-control" name="author">    
</div>
-->

<div class="form-group">
<select name="post_status" id="">
    <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>

<?php // select za odabrati 'draft' ili 'published' meni u editiranju posta
if ($post_status== 'published') {
    echo "<option value='draft'>draft</option>";
} else {
    echo "<option value='published'>publish</option>";
}

?>

</select>
</div>


<div class="form-group">
    <label for="image">Post Image</label>
    <img src="../images/<?php echo $post_image; ?>" class="img-responsive" style="max-height: 80px">
    <input type="file" value="" class="form-control" name="image">   
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">    
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="6">
    <?php echo $post_content; ?></textarea>    
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
</div>

</form>