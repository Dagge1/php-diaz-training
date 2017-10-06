<?php 
echo $_POST['name'];  // treba kliknuti Submit da ne bude error jer nema aaaa uvjeta za if isset()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POST superglobal</title>
</head>
<body>

<form action="post.php" method="POST">
    <h4>Unesi nešto</h4>
    <input type="text" name="name">
    <input type="submit" name="submit" value="Submit">
</form>

</body>    
</html>