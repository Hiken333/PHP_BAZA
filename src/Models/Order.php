<?php

namespace App\Models;

class Order {
    public $orderId;
    public $user;
    private $products = array();
    
    public function __construct($orderId, $user) {
        $this->orderId = $orderId;
        $this->user = $user;
    }
    
    public function addProduct($product) {
        $this->products[] = $product;
    }
    
    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }
        return $total;
    }
    
    public function getInfo() {
        return "Заказ №" . $this->orderId . " для " . $this->user->name;
    }
}

?>
