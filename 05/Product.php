<?php

class Product
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}