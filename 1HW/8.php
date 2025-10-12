<?php

class Product {
    public $name;
    public $price;
    
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$p = new Product("Молоко", 65.5);

echo("Название: $p->name");
echo("Цена: $p->price");

?>
