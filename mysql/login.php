<?php 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect('localhost', 'root', '', 'loginapp');  // spajanje na bazu    
    if ($connection) {    // provjera konekcije
        echo 'We are connected';
    } else {
        echo 'Connection failed';
    }

/*
    if ($username && $password) {
        echo $username . ' ' . $password;
    } else {
        echo 'No user input';
    }
*/    
}
?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login to database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="col-sm-2">
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
    </div>
</div> <!-- end of container -->

</body>    
</html>