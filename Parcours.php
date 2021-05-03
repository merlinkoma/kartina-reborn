<?php

class Parcours
{
    public $pictureid;
    public $pictureprice;
    public $format = 0;
    public $finition = 0;
    public $frame = 0;
    public $price = [];

    public function __construct($pictureid, $pictureprice)
    {
        $this->pictureid = $pictureid;
        $this->pictureprice = $pictureprice;
    }
}

?>