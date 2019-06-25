<?php
    $dbh = new PDO(
      'mysql:host=db;dbname=webpro_books',
      'myuser',
      'password'
    );
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form action="book_tag_create.php" method="post">
<h1>タグ設定</h1>

<div>
<label>本</label>
<?php
      $stmt = $dbh->prepare('select * from book');
    ?>
    <select name="book_id">
      <?php
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
      <?php
        }
      ?>
    </select>
</div>

<div>
<label>タグ</label>
<?php
      $stmt = $dbh->prepare('select * from tag');
    ?>
    <select name="tag_id">
      <?php
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
      <?php
        }
      ?>
    </select>
</div>

<div>
<button>登録</button>
</div>
</form>
</body>
</html>
