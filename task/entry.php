<?php
header('Content-Type: text/html; charset=UTF-8');
try {
  $dbh = new PDO('mysql:host=db;dbname=booklist;charset=utf8;', 'myuser', 'myuser');
  $dbh->query("set names utf8");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>商品登録画面</h1>
<div>
  <form action="action.php"
        method="POST"
        enctype="multipart/form-data">
    <div>
      <label>商品名</label>
      <input type="text" name="name">
    </div>
    <div>
    <div>
      <label>価格</label>
      <input type="text" name="price">
    </div>
    <div>
      <label>ISBN</label>
      <input type="text" name="isbn">
    </div>
    <label>著者</label>
    <select name="author">
      <?php
      $stmt = $dbh->query('SELECT * FROM author');
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <option value="<?=$row['name']?>"><?=$row['name']?></option>
      <?php
      }
      ?>
    </select>
    </div>
    <div>
      <label>カテゴリー</label>
      <select name="category">
        <?php
        $stmt = $dbh->query('SELECT * FROM category');
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
        <option value="<?=$row['name']?>"><?=$row['name']?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div>
      <label>タグ</label>
      <?php
      $stmt = $dbh->query('SELECT * FROM tag');
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <input type="checkbox" name="tag[]" value="<?=$row['name']?>"><?=$row['name']?>
      <?php
      }
      ?>
    </div>
    <div>
      <button>登録</button>
    </div>
  </form>
</div>
</body>
</html>
<?php
} catch (PDOException $e) {
  var_dump($e);
  exit;
}
