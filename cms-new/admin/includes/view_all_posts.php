<!-- tabla iz posts.php za prikaz postova (defaultni krikaz) -->

<table class="table table-striped table-condensed table-hover">
        <thead>
            <tr>
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
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>";

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

<?php   // kod za deletanje posta u posts.php (koji u switch() defaultno ubacuje stranicu view_all_posts.php) 
if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = '$the_post_id' ";
    $delete_query = mysqli_query($connection, $query); 
    header("Location: ./posts.php"); // mora refreshati stranu da se vidi bez deletanog
}

?>