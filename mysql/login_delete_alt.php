<?php // deleting database - varijanta koja refactorira html kod u html.php
include "db.php";  // included connection to db
include "functions.php"; 
include "html.php";

if (isset($_POST['submit'])) {
   deleteRows();
}
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - delete records from database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="col-sm-2">
<
<?php formDelete(); ?>  <!-- forma za deletanje je u html.php -->
<?php showAllData(); ?> <!-- podaci za pulldown id (iz functions.php) -->
                
            </select>    
            </div>    
            <input type="submit" class="btn btn-danger" name="submit" value="Delete">
        </form>
    
    </div>
</div> <!-- end of container -->

</body>    
</html>