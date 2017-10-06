<?php
// primjer kako maknuti html kod sa stranice i ubaciti u funkciju
// sa echo i "", unutar moraju biti '' a ne ""

function formDelete () {
echo "<form action='login_delete_alt.php' method='POST'>
            <div class='form-group'>
                <label for='username'>Username</label>
                <input type='text' name='username' class='form-control'>
            </div>
            <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' name='password' class='form-control'>
            </div>
            <div class='form-group'>
            <select name='id' id=''>";
};
?>