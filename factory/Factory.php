<?php
include("Car.php");
class Factory{
    function createCar($title) {
        $car = new Car($title, rand(1000,5000));
        return $car; 
    }
}
?>