<?php
  $book_id = $_POST['book_id'];
  $tag_id = $_POST['tag_id'];
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webpro_books',
      'myuser',
      'password'
    );

    // プリペアドステートメントを使う
    $stmt = $dbh->prepare('insert into book_tag (book_id, tag_id) values(?, ?)');
    $stmt->execute([$book_id, $tag_id]);

    header('Location: book_tag_new.php');

  } catch (PDOException $e) {
    var_dump($e);
  }
