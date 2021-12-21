<?php
class Package{
    private $type;
    private $weight;

    public function getType()
    {
        return $this->type;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function getPrice($type, $weight)
    {
        switch($type) {
            case 'fast': return 0.2*$weight;
                break;
            case 'slow': return 0.1*$weight;
                break;
            default: echo("incorrect data<hr>");
        }
    }

    function __construct($type, $weight)
    {
        $this->type = $type;
        $this->weight = $weight;
    }
}
