<?php
echo '<pre>', print_r($_GET), '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GET superglobal associative array</title>
</head>
<body>
<?php $id = 123; ?>
<a href="get.php?id=<?php echo $id ?>">Click</a>
<!-- <a href="get.php?id=10">Click</a>   ovo je isto ali nije dinamički -->

</body>    
</html>