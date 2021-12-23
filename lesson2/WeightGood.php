<?php
include("Product.php");

class WeightGood extends Product {
    private $price;
    private $weight;

    public function __construct($price, $weight) {
        self::setPrice($price);
        self::setWeight($weight);
    }

    public function setPrice($price = 0) {
        $this->price = $price;
    }

    public function setWeight($weight = 0) {
        $this->weight = $weight;
    }

    public function totalPrice() {
        return $this->price * $this->weight;
    }

    public function calcProfit() {
        return $this->price * $this->weight / 100 * parent::PROFIT_PERCENT;
    }
}
$weightGood = new WeightGood(15, 100);
echo $weightGood->calcProfit();
