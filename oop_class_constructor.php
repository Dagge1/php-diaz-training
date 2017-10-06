<?php  // OOP PHP
// constructor je class method koji se izvrši čim napravimo novu instancu class-e tj novi object

class Car {
    var $name = 'BMW';  // propety
    var $country = 'Germany';
    
    function __construct($name) {   
        echo 'New instance is created - ' . $name . '<br>';
    }
}

$bmw = new Car('BMW');  // odmah će se izvršiti class constructor method
$vw = new Car('VW');  // opet se izvršava class constructor



?>