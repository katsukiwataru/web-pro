<?php
  /** 商品クラス */
  class Product {
    public $id;
    public $name;
    public $code;
    public $price;
    public $filepath;
    public $color;
    public $size;

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
          $item->code = $row[2];
          $item->price = $row[3];
          $item->filepath = $row[4];
          $item->color = $row[5];
          $item->size = $row[6];
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
          $this->code,
          $this->price,
          $this->filepath,
          $this->color,
          $this->size
        ];
        fputcsv($fp, $csv);
        fclose($fp);
      }
    }
  }
