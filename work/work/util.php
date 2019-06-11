<?php
  function redirect_to($url) {
    header("Location: ${url}");
  }

  /*
  商品を登録する。
  */
  function write_csv_for_item($file, $item) {
    if ( ($fp = fopen($file, 'ab')) ) {
      $csv = [
        $item->id,
        $item->name,
        $item->code,
        $item->price,
        $item->filepath,
        $item->color,
        $item->size
      ];
      fputcsv($fp, $csv);
      fclose($fp);
    }
  }

  function read_csv_for_item($file) {
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

  function add_cart_for_item_id($item_id) {
    $cart_item_ids = [];
    if ( isset($_SESSION['cart_items']) ) {
      $cart_item_ids = $_SESSION['cart_items'];
    }
    $cart_item_ids[] = $item_id;
    $_SESSION['cart_items'] = $cart_item_ids;
  }

  function get_item_ids_from_cart() {
    if ( isset($_SESSION['cart_items']) ) {
      return $_SESSION['cart_items'];
    } else {
      return [];
    }
  }
