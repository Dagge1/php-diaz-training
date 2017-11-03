<?php  // forma za unos posta na view_all_posts.php bazirano na switch()
if (isset($_POST['create_post'])) {
    
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['author'];
    $post_status = $_POST['post_status'];
   
    $post_image = $_FILES['image']['name'];           // ime slike
    $post_image_temp = $_FILES['image']['tmp_name'];  // slika, kada odaberemo stavlja je u tmp

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "../images/{$post_image}"); // funkc. za ubacivanje imagea iz tmp u naš direktorij

$query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image,
 post_content, post_tags, post_status) ";
$query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', ";
$query .= "'$post_content', '$post_tags', '$post_status') "; 

$create_post_query = mysqli_query($connection, $query);

confirm($create_post_query, $post_category_id); // funkcija za potvrdu queryja, u functions.php
header("Location: ./posts.php");
}
?>


<form action="" method="POST" enctype="multipart/form-data"> <!-- multipart je za unos slika -->

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">    
</div>
<!--
<div class="form-group">
    <label for="post_category">Post Category Id (number)</label>
    <input type="text" class="form-control" name="post_category_id">    
</div>
-->

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

    echo "<option value='$cat_id'>$cat_title</option>";   
      
}
?>
    </select>
</div>







<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">    
</div>

<!-- select forma za odabir post statusa -->
<div class="form-group">
    <select name="post_status" id="">
        <option value="draft">Post Status</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
    </select>
</div>


<div class="form-group">
    <label for="image">Post Image</label>
    <input type="file" class="form-control" name="image">    
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">    
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="6"></textarea>    
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>

</form>
