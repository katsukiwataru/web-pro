<?php
  // クラスの定義の演習
  // ショッピングカートを表すクラスを定義してください。
  // 次のような形でプログラムが書けるようにクラスを
  // 定義してください。

  $product1 = new Product();
  $product1->name = 'スマートウォッチ';
  $product1->price = 20000;

  $product2 = new Product();
  $product2->name = '携帯電話';
  $product2->price = 50000;

  $cart = new ShoppingCart();
  // array_push($cart->products, $product1); // private フィールドには
                                             // アクセスできない
  $cart->add($product1);
  $cart->add($product2);
  // $cart->add_price(10000);    // これはエラー
  $total_price = $cart->total_price();
  print($total_price);

  $cart2  = new ShoppingCart();
  $cart2->add($product1);   // エラーにしなければならない

  // public :: 公開属性
  // private :: 非公開属性

  class Product {
    public $name;
    public $price;
  }

  class ShoppingCart {
    private $products = [];
    private $total_price = 0;

    function add($product) {
      $this->add_price($product->price);
      array_push($this->products, $product);
    }
    private function add_price($n) {
      $this->total_price += $n;
    }
    function total_price() {
      return $this->total_price;

      // $total = 0;
      // foreach ($this->products as $product) {
      //   $total += $product->price;
      // }
      // array_sum(
      //   array_map(function($p) { return $p->price; }, $this->products)
      // );
      return $total;
    }
  }
