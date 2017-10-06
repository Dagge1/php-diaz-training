<?php 
// info o useru na našoj stranici je pohranjena u superglobal assoc. arrayu $_COOKIE
// Cookie pohranjujemo u userov browser sa setcookie(), sa 3 parametra. 
// Prvi je ime kolačića, drugi value, treći kada cookie ističe
$name = "someName";
$value = 100;
$expiration = time() + (60*60*24*7);  // sec. od 1970 do sada + sec do isteka (60sec * 60min * 24h * 7dana)

setcookie($name, $value, $expiration); // snimiti će se u userov browser kod svake njegove posjete stranici
setcookie('jedanCookie', 'Zagreb, Croatia', $expiration); // jedna strana može slati više cookiea

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>
<?php 
// ako se korisnik vratio i $_COOKIE['someName'] u njegovom browseru ima vrijednost (100) ... 
if (isset($_COOKIE['someName'])) {
    $someOne = $_COOKIE['someName'];
    echo $someOne;
} else {
    $someOne = "";
}
?>

</body>    
</html>