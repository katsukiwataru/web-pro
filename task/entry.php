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
    <meta charset="UTF-8">
    <title>登録画面</title>
  </head>
<body>
  <h1>登録</h1>
  <form action="action.php" method="POST">
    <p>
      <label for="isbn">ISBN:</label>
      <input type="number" id="isbn" name="isbn">
    </p>
    <p>
      <label for="name">名前:</label>
      <input type="text" id="name" name="name">
    </p>
    <p>
      <label for="price">価格:</label>
      <input type="number" id="price" name="price">
    </p>
    <p>
      <label for="category">カテゴリ:</label>
      <select id="category" name="category">
      <?php
      $stmt = $dbh->query('SELECT * FROM category');
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <option value="<?=$row['id']?>"><?=$row['name']?></option>
      <?php
      }
      ?>
      </select>
    </p>
    <p>
      <label for="author">作者:</label>
      <select name="author" id="author">
      <?php
      $stmt = $dbh->query('SELECT * FROM author');
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <option value="<?=$row['id']?>"><?=$row['name']?></option>
      <?php
      }
      ?>
      </select>
    </p>
    <p>
      <label>タグ:</label>
      <?php
      $stmt = $dbh->query('SELECT * FROM tag');
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <input type="checkbox" name="tag[]" value="<?=$row['id']?>"><?=$row['name']?>
      <?php
      }
      ?>
    </p>
    <button type="submit">登録</button>
  </form>
</body>
</html>

<?php
} catch (PDOException $e) {
  var_dump($e);
  exit;
}
