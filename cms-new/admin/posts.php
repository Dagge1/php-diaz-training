<!-- Admin/posts.php -->
<?php include "includes/admin_header.php"; ?>  <!-- header je maknut u includes/header.php -->

    <div id="wrapper">


        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>         

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

    <h1 class="page-header">Welcome to Posts<small> Author</small></h1>


 <!-- ovdje ide u sredinu strane table iz view_all_posts.php -->
<?php 
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = ''; // ako nije izabrao $source je prazno, da switch ne daje grešku
}

switch($source) {
    case 'add_post':
    include"includes/add_post.php";
    break;

    case 'edit_post':
    include"includes/edit_post.php";
    
    break;

    default:
    include 'includes/view_all_posts.php'; // default ako ne izabere drugo
}

?>


                    </div>    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>