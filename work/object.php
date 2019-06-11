<?php
  // object.php
  // オブジェクト指向プログラミング
  // [クラス]
  // クラスとは、データとメソッドを備えたもの
  // データは変数
  // メソッドは関数

  // 公開修飾子
  // - public :: フィールドを外部に公開
  //  クラスの外から書き換え可能
  // - private :: フィールドを外部に非公開
  //  クラスの外から書き換え不可能

  class Product {
    public $name;
    public $code;
    public $price;

    function printDetail() {
      print $this->name . "<br />";
      print $this->code . "<br />";
      print $this->price . "<br />";
    }

    function taxPrice($rate) {
      return $this->price * $rate;
    }
  }
  $ucc_coffee = new Product();
  $ucc_coffee->name = 'UCC 珈琲';
  $irohasu    = new Product();
  $irohasu->name = 'いろはす';
  $ucc_coffee->printDetail();
  $irohasu->printDetail();

  $ucc_coffee->price = 120;
  $tax_price = $ucc_coffee->taxPrice(0.08);
  print $tax_price;

  class LexusCar {
    public $model_name;
    public $price;

    static function samplePrice() {
      return '1000万円';
    }

    function totalPrice() {
      return $price * 1.08;
    }

  }

  print LexusCar::samplePrice();

  $a_car = new  LexusCar();
  $a_car->price = 8000000;
  print $a_car->totalPrice();
