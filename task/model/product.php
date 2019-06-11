<?php
  /** 商品クラス */
  class Product {
    public $id;
    public $name;
    public $price;

    static function find_by_id($id) {
      $products = Product::read_csv('data/items.csv');
      foreach ($products as $product) {
        if ($product->id == $id) {
          return $product;
        }
      }
      return null;
    }

    static function read_csv($file) {
      $csv = [];
      if ( ($fp = fopen($file, 'rb')) ) {
        while ( ($row = fgetcsv($fp)) ) {
          $item = new Product();
          $item->id = $row[0];
          $item->name = $row[1];
          $item->price = $row[3];
          $csv[] = $item;
        }
        fclose($fp);
      }
      return $csv;
    }

    function write_csv($file) {
      if ( ($fp = fopen($file, 'ab')) ) {
        $csv = [
          $this->id,
          $this->name,
          $this->price,
        ];
        fputcsv($fp, $csv);
        fclose($fp);
      }
    }
  }
