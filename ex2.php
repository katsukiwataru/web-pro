<?php
  $product1 = new Product();
  $product1->name = 'スマートウォッチ';
  $product1->price = 20000;

  $product2 = new Product();
  $product2->name = '携帯電話';
  $product2->price = 50000;

  $cart = new ShoppingCart();
  $cart->add($product1);
  $cart->add($product2);
  $total_price = 50000;

  class Product {
    public $name;
    public $price;
  }

  class ShoppingCart {
    public $products = [];

    function add($products) {
      array_push($this -> products, $product);
    }

    function total_price() {
      $total = 0;
      foreach ($this->$products as $product) {
        $total += $product->price;
      }
    }
  }
