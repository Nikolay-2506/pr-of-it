<?php

namespace App\Models;


class Item implements HasPriceInterface
{
    protected $price;


    public function getPrice()
    {
        return $this->price;
    }
}