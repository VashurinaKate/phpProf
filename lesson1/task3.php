<?php

include("task2.php");

class Dispatch{
    private $packages = [];
    private $sum = 0;

    function __construct($count) {
        $this->createDispatch($count);
        $this->info();
    }

    function info() {
        foreach ($this->packages as $package) {
            echo "Package of weight: {$package->getWeight()} gramms will be send by method: {$package->getType()}; <hr>";
        }
        echo "Total price: {$this->sum} rub";
    }

    function createDispatch($count) {
        $types = ['fast', 'slow'];
        $post = new Post();
        for($i = 0; $i < $count; $i++) {
            $this->packages[$i] = $post->createPackage($types[rand(0, (count($types)-1))]);
            $this->sum += $this->packages[$i]->getPrice($this->packages[$i]->getType(), $this->packages[$i]->getWeight());
        }
    }
}

new Dispatch(rand(3,10));
