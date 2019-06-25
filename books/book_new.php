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
<meta charset="UTF-8" />
</head>
<body>
<form action="book_create.php" method="post">
  <div>
    <?php
      $stmt = $dbh->prepare('select * from category');
    ?>
    <select name="category_id">
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
  <?php
      $stmt = $dbh->prepare('select * from author');
    ?>
    <select name="author_id">
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
    <label>ISBN</label>
    <input type="text" name="isbn" />
  </div>
  <div>
    <label>タイトル</label>
    <input type="text" name="title" />
  </div>
  <div>
    <label>価格</label>
    <input type="text" name="price" />
  </div>
  <button>登録</button>
</form>
</body>
</html>
