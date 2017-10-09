<?php  // OOP PHP
// static property pripada samo toj classi i možemo ga zvati direkt iz classe sa ::
// obične propertyje ne možemo koristiti direkt iz classe, bez da napravimo instance object, sa static možemo 

class Car {
    static $name = 'BMW <br>';  // static property
    static $wheels = 4;
    var $country = ' Germany';  // dostupno samo u klasi i njenim extended subklasama

    static function drive() {
        Car::$wheels = 6;  // način korištenja static propertyja u funkciji
        echo Car::$wheels;
    }
    

}

$bmw = new Car();
echo Car::$name;  // zovemo ga direktno iz class-e a ne iz objekta nastalog iz class-e
echo $bmw::$name;

Car::drive();  // pozivanje static funkcije direktno iz class-e
?>