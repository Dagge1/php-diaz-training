<?php  // OOP PHP

class Car {
    var $name = 'BMW';  // propety
    var $country = 'Germany';

    function message() {   // method (function inside class)
        echo 'Hello from the object, car is ' . $this->name;  // $this se referira na isti objekt
    }
}

$bmw = new Car();  // kreiramo novi object od class-a Car
var_dump($bmw);

$cabrio = new $bmw();  // class inheritance, drugi objekt nasljeđuje propertyje  i methode prvog
$cabrio->engine = 'diesel';  // dodali smo objektu novi property
$cabrio->name = 'Toyota';  // primijenili smo u novom objektu name..
var_dump($cabrio);
var_dump($bmw);   // ali je u objektu $bmw ostalo staro ime. Inherited objekt nasljeđuje stari ali je zaseban.

$cabrio->message();  // $cabrio nasljedio methodu iz $bmw

// ******* Class inheritance *****

class Plane extends Car { // class Plane ima sve propertije koje ima class Car
    var $name = 'VW';  // child class je overridao originalni value parenta sa novim 
}
$jet = new Plane();
var_dump($jet);  // ima sve što ima Car

?>