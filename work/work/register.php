<!doctype html>
<html>
<head>
<meta content="utf-8">
</head>
<body>
<h1>商品登録画面</h1>
<div>
<form action="register_action.php"
      method="POST"
      enctype="multipart/form-data">
  <div>
    <label>商品名</label>
    <input type="text" name="product_name">
  </div>
  <div>
    <label>商品コード</label>
    <input type="text" name="product_code">
  </div>
  <div>
    <label>商品画像</label>
    <input type="file" name="product_image">
  </div>
  <div>
    <label>本体価格(税抜き)</label>
    <input type="text" name="product_price">
  </div>
  <div>
    <label>カラー</label>
    <select name="product_color">
      <option value="">選択してください</option>
      <option value="red">赤</option>
      <option value="blue">青</option>
      <option value="white">白</option>
      <option value="black">黒</option>
    </select>
  </div>
  <div>
    <label>サイズ</label>
    <select name="product_size">
      <option value="">選択してください</option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
    </select>
  </div>
  <div>
    <button>登録</button>
  </div>
</form>

<?php include_once '_menu.tpl.php'; ?>

</div>
</body>
</html>
