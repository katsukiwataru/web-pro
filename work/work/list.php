<?php
  require_once 'initialize.php';
  $items = Product::read_csv('data/items.csv');
?>
<!doctype html>
<html>
<head>
<meta content="utf-8">
</head>
<body>
<h1>商品一覧画面</h1>
<div>
<form action="add_cart.php"
      method="POST">
<?php
  if (count($items) == 0) {
    echo '商品を登録してください。';
  } else {
    include '_items.tpl.php';
  }
?>
<button>カートに追加</button>
</form>

<?php include_once '_menu.tpl.php'; ?>

</div>
</body>
</html>
