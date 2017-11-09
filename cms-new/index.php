<?php include "includes/db.php";  ?>
<?php include "includes/header.php";  ?>

<!-- navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

<?php // query za post + pagination code start

// ako dolje klikne na broj stranice poslao je GET request koji obrađuje ovdje
$per_page = 2;  // koliko postova po stranici

if (isset($_GET['page']))  {
    $page = $_GET['page'];
} else {
    $page = "";
}
// ako nije kliknuo link na stranicu, page je 0 ili 1
if ($page == "" || $page == 1) {
    $page_1 = 0;
} else {  
    $page_1 = ($page * $per_page) - $per_page;
}

// query za brojanje postova
$post_query_count = "SELECT * from posts";
$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count);

// ukupno postova / broj postova po strani (ceiling zaokruži na veći broj)
$count = ceil($count / $per_page); 



$query = "SELECT * FROM posts  LIMIT $page_1, $per_page";
$select_all_posts_query = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'], 0, 250);
          $post_status = $row['post_status'];
      
    //   ako je status 'published' prikaži    
      if ($post_status == 'published') {
?>

<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>


                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo $post_date ?></p>
                <hr>

                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                </a>

                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> <!-- crta -->

<?php  } }?> <!-- end of while loop + post + end of if 'published' -->

<?php  // ako nema postova sa statusom 'published'
$query = "SELECT * FROM posts WHERE post_status = 'published' ";
$select_all_approved = mysqli_query($connection, $query);
$no_posts = mysqli_num_rows($select_all_approved);

if ($no_posts == 0) {
    echo "<h3 class='text-center'>No posts sorry</h3>";
}
?>


               
            </div> <!-- end of div col md-8 -->

<!-- sidebar -->
<?php include "includes/sidebar.php";  ?>


        </div>
        <!-- /.row -->

        <hr>

<!-- pagination -->
<ul class="pager">
<?php    
    for ($i = 1; $i <= $count; $i++) {

        if ($i == $page) { // za css dekoraciju odabrane strane (u styles.css)
         echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
        } else {
            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
        }    
    }

?>
</ul>


<!-- footer -->        
<?php include "includes/footer.php";  ?>

        