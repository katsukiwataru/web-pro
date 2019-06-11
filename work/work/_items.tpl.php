<table border="1">
<tr>
  <th> </th>
  <th>ID</th>
  <th>商品名</th>
  <th>商品コード</th>
  <th>商品価格</th>
  <th>商品画像</th>
  <th>カラー</th>
  <th>サイズ</th>
</tr>
<?php
  foreach ($items as $item) {
    include '_item.tpl.php';
  }
?>
</table>
