<?php 
// session pohranjujemo na našem serveru sa session_start(). $_SESSION sadrži podatke za pohranu
// kada user posjeti stranu aktivira se session start i na serveru pohrani podatke, u referenci sa cookies
// sa session se mogu podaci prenositi na drugu stranu (npr username ili shopping cart)
session_start();

$_SESSION['greeting'] = 'Hello Student';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions</title>
</head>
<body>


</body>    
</html>