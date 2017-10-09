<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Array functions</title>
</head>
<body>
<?php 
$list = [23, 4, 54, 132, 'Zagreb', 54];

echo max($list);  // najveći broj
echo '<br>';

sort($list);
print_r($list);

?>

</body>    
</html>