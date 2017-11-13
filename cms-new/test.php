<?php 

echo password_hash('secret', PASSWORD_BCRYPT, ['cost' => 10]);
?>