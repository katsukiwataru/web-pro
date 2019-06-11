<?php
  // カート機能はセッションを使う
  session_start();
  require_once 'initialize.php';

  if ( isset($_POST['product_id']) ) {
    if ( isset($_SESSION['cart']) ) {
      $shopping_cart = unserialize($_SESSION['cart']);
    } else {
      $shopping_cart = new ShoppingCart();
    }
    $product = Product::find_by_id($_POST['product_id']);
    $shopping_cart->add($product);

    $_SESSION['cart'] = serialize($shopping_cart);
    redirect_to('cart.php');
  } else {
    echo '商品を選択してください。';
  }
