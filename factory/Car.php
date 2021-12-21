<?php
class Car{
    private $title;
    private $price;

    public function getPrice()
    {
        return $this->price;
    }
    public function getTitle()
    {
        return $this->title;
    }
    function __construct($title, $price)
    {
        $this->price = $price;
        $this->title = $title;
    }
    
}
?>

