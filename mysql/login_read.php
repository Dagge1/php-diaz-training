<?php // reading from database

    $connection = mysqli_connect('localhost', 'root', '', 'loginapp');  // spajanje na bazu    
    
    $query = "SELECT * FROM users";  // query komanda za read
    $result = mysqli_query($connection, $query);  // šalji query u bazu
    if (!$result) {
        die('Query failed' . mysqli_error());
    }

?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - read from database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="col-sm-6">
<?php

    while($row = mysqli_fetch_assoc($result)) {   // returna assoc array
?>
<pre class="card">
    <?php    
        print_r($row);
    ?>
</pre>    
<?php } ?>
    
    </div>
</div> <!-- end of container -->

</body>    
</html>