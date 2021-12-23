<?php

abstract class Product {
    const PROFIT_PERCENT = 10;

    abstract public function totalPrice();
    abstract public function calcProfit();
}
