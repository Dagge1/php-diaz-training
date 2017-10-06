<?php // updating database
include "db.php";  // included connection to db
include "functions.php"; 

if (isset($_POST['submit'])) {
    updateTable();
}
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - update database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="col-sm-2">
    <h4>Update entry</h4>

        <form action="login_update.php" method="POST">
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
            <input type="submit" class="btn btn-primary" name="submit" value="Update">
        </form>
    
    </div>
</div> <!-- end of container -->

</body>    
</html>