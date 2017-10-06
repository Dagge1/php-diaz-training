<?php // deleting database - varijanta koja refactorira html kod u html.php
include "db.php";  // included connection to db
include "functions.php"; 

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
    <h4>Delete entry</h4>

        <form action="login_delete.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
            <select name="id" id="">

<?php
       showAllData();  // podaci za id (iz functions.php)
?>
                
            </select>    
            </div>    
            <input type="submit" class="btn btn-danger" name="submit" value="Delete">
        </form>
    
    </div>
</div> <!-- end of container -->

</body>    
</html>