<?php
header('Content-Type: text/html; charset=UTF-8');
try  {
  // SELECT 文
  $dbh = new PDO('mysql:host=db;dbname=booklist;charset=utf8;', 'myuser', 'myuser');
  $dbh->query("set names utf8");
  $stmt_book = $dbh->query('SELECT * FROM book');
  $stmt_category = $dbh->query('SELECT * FROM category');
  $stmt_author = $dbh->query('SELECT * FROM author');
  $stmt_tag = $dbh->query('SELECT * FROM tag');
  $stmt_book_tag = $dbh->query('SELECT * FROM book_tag');
  $rows_book = array();
  while($tmp = $stmt_book->fetch(PDO::FETCH_ASSOC)){
    $rows_book[] =$tmp;
  }
  while($tmp = $stmt_category->fetch(PDO::FETCH_ASSOC)){
    $rows_category[] =$tmp;
  }
  while($tmp = $stmt_author->fetch(PDO::FETCH_ASSOC)){
    $rows_author[] =$tmp;
  }
  while($tmp = $stmt_tag->fetch(PDO::FETCH_ASSOC)){
    $rows_tags[] =$tmp;
  }
  // while($tmp = $stmt_book_tag->fetch(PDO::FETCH_ASSOC)){
  //   $rows_book_tags[] =$tmp;
  // }
?>

<!DOCTYPE html>
<html lang="ja-JP">
<head>
  <meta charset="UTF-8">
  <title>本一覧</title>
</head>
<body>
  <h1>本一覧</h1>
    <table border=1>
    <tr>
      <th>カテゴリ</th>
      <th>書籍名(ISBN)</th>
      <th>著者</th>
      <th>価格</th>
      <th>タグ</th>
    </tr>
    <?php
    foreach ($rows_book as $row_books){
      foreach ($rows_category as $row_categ) {
        if($row_categ['id'] == $row_books['category_id']){
          $category_value = $row_categ['name'];
          break;
        }
      }
      foreach ($rows_author as $row_author) {
        if($row_author['id'] == $row_books['author_id']){
          $author_value = $row_author['name'];
          break;
        }
      }
      // foreach ($rows_book_tags as $row_books_tags) {
      //   if($row_books_tags['book_id'] == $row_books['id']){
      //     foreach ($rows_tags as $row_tags){
      //       if($row_tags['id'] == $row_books_tags['tag_id']){
      //         $tag_values[] = $row_tags['name'];
      //         break;
      //       }
      //     }
      //   }
      // }
    ?>
    <tr>
      <td><?=$category_value?></td>
      <td><?=$row_books['name']?><br />(<?=$row_books['isbn']?>)</td>
      <td><?=$author_value?></td>
      <td><?=$row_books['price']?><br />円</td>
      <td>
      <?php foreach ($tag_values as $tag_value) {?>
        <p><?=$tag_value?></p>
      <?php
        }
        $tag_values = array();
      ?>
      </td>
    </tr>
    <?php } ?>
    </table>
</body>
</html>
<?php
} catch (PDOException $e) {
  var_dump($e);
  exit;
}
?>
