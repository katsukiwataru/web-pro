<?php
  $category_id = $_POST['category_id'];
  $author_id = $_POST['author_id'];
  $isbn = $_POST['isbn'];
  $title = $_POST['title'];
  $price = $_POST['price'];

  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webpro_books',
      'myuser',
      'password'
    );

    // プリペアドステートメントを使う
    $stmt = $dbh->prepare(
      'insert into book (category_id, author_id, isbn, title, price)
                   values(?, ?, ?, ?, ?)'
    );
    // TODO: category と author の存在チェック
    // select してみてあるかどうか
    $stmt->execute([$category_id, $author_id, $isbn, $title, $price]);

    header('Location: book_new.php');

  } catch (PDOException $e) {
    var_dump($e);
  }
