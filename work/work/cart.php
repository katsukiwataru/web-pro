<?php
  session_start();
  require_once 'initialize.php';

  if ( isset($_SESSION['cart']) ) {
    $shopping_cart = unserialize($_SESSION['cart']);
  } else {
    print('カートは空です。');
    exit();
  }
  $items = $shopping_cart->get_products();
?>
<!doctype html>
<html>
<head>
<meta content="utf-8">
</head>
<body>
<h1>カート画面</h1>
<div>
<?php
  if (count($items) == 0) {
    echo 'カートに商品が入っていません。';
  } else {
    include '_items.tpl.php';
  }
?>
<div>
<h3>合計金額:
<?= $total_price ?>円
</h3>
</div>

<?php include_once '_menu.tpl.php'; ?>
</div>
</body>
</html>
