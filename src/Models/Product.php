<?php

namespace App\Models;

class Product {
    public $name;
    public $price;
    
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
    
    public function getInfo() {
        return "Товар: " . $this->name . " - " . $this->price . " руб.";
    }
}

?>
