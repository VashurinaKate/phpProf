<?php
include("DigitalGood.php");

class PieceGoods extends DigitalGood {

    public function getPrice() {
        return parent::PRICE * 2;
    }

    public function totalPrice() {
        return $this->getPrice() * parent::getAmount();
    }

    public function calcProfit() {
        return $this->getPrice() * parent::getAmount() / 100 * parent::PROFIT_PERCENT;
    }
}
$pieceGood = new PieceGoods(2);
echo $pieceGood->calcProfit();
