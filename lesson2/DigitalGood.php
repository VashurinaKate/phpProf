<?php
include("Product.php");

class DigitalGood extends Product {
    const PRICE = 100;
    private $amount;

    public function __construct($amount)
    {
        self::setAmount($amount);
    }

    public function getPrice() {
        return PRICE;
    }

    public function getAmount() {
        return $this->amount = $amount;
    }
    public function setAmount($amount=0) {
        $this->amount = $amount;
    }

    public function totalPrice() {
        return self::PRICE * $this->amount;
    }

    public function calcProfit() {
        return $this->totalPrice() / 100 * parent::PROFIT_PERCENT;
    }
}
$digitalGood = new DigitalGood(5);
echo $digitalGood->calcProfit();
