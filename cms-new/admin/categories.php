<!-- Admin/categories.php -->
<?php include "includes/admin_header.php"; ?>  <!-- header je maknut u includes/header.php -->

    <div id="wrapper">


        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>         

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                        <h1 class="page-header">Welcome to Admin
                            <small>Author</small>
                        </h1>

         <div class="col-xs-6">  

<?php insert_categories(); // unos nove kategorije (kod je u Admin/functions.php) ?>

         <!-- forma za unos kategorije -->   
         <form action="" method="POST">
            <div class="form-group">
            <label for="cat_title">Add Category</label>
            <input type="text" class="form-control" name="cat_title">
            </div>
            <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
            </div>         
         </form>   


        <!--  query za edit/update kategorije --> 
<?php 
if(isset($_GET['edit'])) {     // ako je kliknuo na 'edit' link

    include "includes/update_categories.php";
}
?>        
         </div>   

         <div class="col-xs-6"> <!-- tabela desno -->

         <table class="table table-striped table-condensed table-hover">
             <thead>
                 <tr>
                     <th>Id</th>
                     <th>Category Title</th>
                 </tr>
             </thead>
             <tbody>

<?php findAllCategories();  // find all categories query ?>

<?php deleteCategories();  // deletanje kategorije  - query ?>

             </tbody>
         </table>
         </div> <!-- end of tabela desno -->


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>