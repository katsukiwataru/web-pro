<?php
  // ショッピングカートクラス
  class ShoppingCart {
    private $products = [];

    function add($product) {
      $this->products[] = $product;
    }

    function get_products() {
      // ※厳密にやるときはコピーを返すこと
      // なぜなら、private で宣言しているにもかかわらず
      // 参照で返すと呼び出し元で private フィールドを
      // 触られてしまうから。
      // 参照(ポインタ)の仕組みを要確認
      return $this->products;
    }
  }
