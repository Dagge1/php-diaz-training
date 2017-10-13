<?php // kod za editiranje posta, kod se ubacuje nakon klika Edit na stranu posts.php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = '$the_post_id' "; 
$select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
}

?>


<form action="" method="POST" enctype="multipart/form-data"> <!-- multipart je za unos slika -->

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title">    
</div>

<div class="form-group">
    <select name="" id="">
<?php
$query = "SELECT * FROM categories"; 
    $select_categories = mysqli_query($connection, $query);

    confirmQuery($select_categories);  // za potvrdu queryja

while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title']; 

    echo "<option value=''>$cat_title</option>";   
      
}
?>
    </select>
</div>

<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="author">    
</div>

<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="post_status">    
</div>

<div class="form-group">
    <label for="image">Post Image</label>
    <img src="../images/<?php echo $post_image; ?>" class="img-responsive" style="max-height: 80px">
    <input type="file" value="<?php echo $post_image; ?>" class="form-control" name="image">    
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
<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>

</form>