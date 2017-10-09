<?php 
// na stranici session2 čitamo podatak iz $_SESSION arraya sa strane session1.php
// VAŽNO! na svakoj stranici koja piše ili čita session mora biti uključen session_start()
session_start();

echo $_SESSION['greeting'];
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