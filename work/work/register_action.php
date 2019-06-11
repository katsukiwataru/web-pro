<?php
  require_once 'model/product.php';
  require_once 'util.php';

  // 登録データは item で管理する
  // アップロード画像は images フォルダへ。
  // 商品には一意になる ID をつける。
  // とりあえず、登録日時を ID に。

  $id = date('YmdHis');
  $filepath = null;

  if ( isset($_FILES['product_image']) ) {
    $path = pathinfo($_FILES['product_image']['name']);
    $ext = $path['extension'];
    $filepath = "data/images/${id}.${ext}";
    move_uploaded_file(
      $_FILES['product_image']['tmp_name'],
      $filepath
    );
  }

  $item = new Product();
  $item->id = $id;
  $item->name = $_POST['product_name'];
  $item->code = $_POST['product_code'];
  $item->price = $_POST['product_price'];
  $item->filepath = $filepath;
  $item->color = $_POST['product_color'];
  $item->size = $_POST['product_size'];
  $item->write_csv('data/items.csv');
  // write_csv_for_item('data/items.csv', $item);

  // リダイレクト
  redirect_to('register.php');
