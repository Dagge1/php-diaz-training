<!-- tabla iz posts.php za prikaz postova (defaultni krikaz) -->
<?php 
if (isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $postValueId) {
        $bulk_options = $_POST['bulk_options'];

    switch($bulk_options) {
        case 'published':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
        $update_to_published_status = mysqli_query($connection, $query);
        confirmQuery($update_to_published_status);
        break;

        case 'draft':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
        $update_to_draft_status = mysqli_query($connection, $query);
        confirmQuery($update_to_draft_status);
        break;

        case 'delete':
        $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
        $update_to_delete_status = mysqli_query($connection, $query);
        confirmQuery($update_to_delete_status);
        break;

    }    
    }   
}

?>


<form action="" method="POST">
<table class="table table-striped table-condensed table-hover">

<div id="bulkOptionsContainer" class="col-xs-2" style="padding: 0px">
    
    <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>    
        <option value="published">Publish</option>    
        <option value="draft">Draft</option>    
        <option value="delete">Delete</option>    
    </select>
</div>

<div class="col-xs-4">
<input type="submit" name="submit" class="btn btn-success" value="Apply">
<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
</div>

        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

<?php // prikaz postova u posts.php
$query = "SELECT * FROM posts"; 
$select_posts = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];

    echo "<tr>";
    ?>
<!-- name=checkBoxArray mora biti sa [] jer je to array, ali kad se name koristi može bez [] -->
<td><input type="checkbox" class="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>

    <?php 
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
    
    
    // query za prikaz kategorije
$query = "SELECT * FROM categories WHERE cat_id = '$post_category_id' "; 
    $select_categories_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_categories_id)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
}
    echo "<td>{$cat_title}</td>";
 // *** end of dio za prikaz kategorije

    echo "<td>{$post_status}</td>";
    echo "<td><img src='../images/{$post_image}' class='img-responsive' style='max-height: 80px'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "</tr>";
}
?>
        </tbody>
</table>
</form>

<?php   // kod za deletanje posta u posts.php (koji u switch() defaultno ubacuje stranicu view_all_posts.php) 
if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = '$the_post_id' ";
    $delete_query = mysqli_query($connection, $query); 
    header("Location: ./posts.php"); // mora refreshati stranu da se vidi bez deletanog
}

?>