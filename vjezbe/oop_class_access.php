<?php  // OOP PHP
// tri vrste pristupa class propertijima: public, private i 

class Car {
    public $name = 'BMW';  // jednako kao var, available u cijelom programu
    protected $country = ' Germany';  // dostupno samo u klasi i njenim extended subklasama
    private $price = 22000;  // dostupno samo u ovoj klasi
    

    function displayProtected() {  // da bi prikazao protected treba biti unutar funkcije i sa $this
        echo $this->country;
    }
}

$bmw = new Car();
var_dump($bmw); 

echo $bmw->name;
// echo $bmw->country;   // nije dostupno
// echo $bmw->price;   // nije dostupno

/*
class European extends Car {  // jdan način prikaza protected, ne treba u class biti ova funkcija
    function displayProtected() {  // da bi prikazao protected treba biti unutar funkcije i sa $this
        echo $this->country;
    }
}
*/

class European extends Car {
  function parent() {  // alternativno sa parent::
        echo parent::displayProtected();
  }
}

$cabrio = new European();
echo $cabrio->parent();  // sada prikazuje iako je protected

?>