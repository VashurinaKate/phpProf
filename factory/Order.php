<?php
include("Factory.php");

class Order{
    private $cars = [];
    private $sumOrder = 0;

    function __construct($count) {
        $this->createOrder($count);
        $this->info();
    }

    function info() {
        foreach ($this->cars as $car) {
            echo "Auto {$car->getTitle()} costs {$car->getPrice()}<hr>";
        }
        echo "Total price: {$this->sumOrder}";
    }

    function createOrder($count) {
        $marki = ['Audi', 'VW', 'Skoda', 'BMW'];
        $factory = new Factory();
        for($i = 0; $i < $count; $i++) {
            $this->cars[$i] = $factory->createCar($marki[rand(0, (count($marki)-1))]);
            $this->sumOrder += $this->cars[$i]->getPrice();
        }
    }
}

new Order(rand(20,50));
?>