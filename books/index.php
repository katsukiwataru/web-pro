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
<h3>メニュー</h3>
<ul>
  <li><a href="category_new.php">カテゴリ登録</a></li>
  <li><a href="author_new.php">著者登録</a></li>
  <li><a href="book_new.php">本登録</a></li>
  <li><a href="tag_new.php">タグ登録</a></li>
  <li><a href="book_tag_new.php">タグ設定</a></li>
</ul>

<h1>本</h1>
<table border=1>
<tr>
  <th>カテゴリ</th>
  <th>タイトル(ISBN)</th>
  <th>著者</th>
  <th>価格</th>
  <th>タグ</th>
</tr>
<?php
  $stmt = $dbh->prepare(
    'select book.id, book.isbn, book.title, book.price,' .
    '       category.name as category_name, author.name as author_name from book ' .
    '  join category on book.category_id = category.id' .
    '  join author on book.author_id = author.id'
  );

  $stmt->execute();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td><?= $row['category_name'] ?></td>
    <td><?= $row['title'] ?>(<?= $row['isbn'] ?>)</td>
    <td><?= $row['author_name'] ?></td>
    <td><?= $row['price'] ?></td>
    <td>
    <?php
      $_stmt = $dbh->prepare(
        'select * from tag ' .
        '  join book_tag on tag.id = book_tag.tag_id' .
        ' where book_tag.book_id = ?'
      );
      $_stmt->execute([$row['id']]);
      while ($_row = $_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
      <?= $_row['name'] ?><br />
    <?
      }
    ?>
    </td>
  </tr>
<?php
  }
?>
</table>
</body>
</html>
