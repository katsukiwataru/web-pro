<?php
class Product {
  public $name;
  public $code;
  public $price;

  function printDetail () {
    print $this->name. "<br />";
    print $this->code. "<br />";
    print $this->price. "<br />";
  }

  function taxPrice($rate) {
    return $this->price * $rate;
  }

}

$ucc_coffee = new Product();
$ucc_coffee->name = 'UCC 珈琲';
$irohasu = new Product();
$irohasu->name = 'いろはす';
$ucc_coffee->printDetail();
$irohasu->printDetail();

$ucc_coffee->price = 120;
$tax_price = $ucc_coffee -> taxPrice(1.08);
print $tax_price;
