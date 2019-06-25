<?php
  $tag = $_POST['tag'];
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webpro_books',
      'myuser',
      'password'
    );

    // プリペアドステートメントを使う
    $stmt = $dbh->prepare('insert into tag (name) values(?)');
    $stmt->execute([$tag]);

    header('Location: tag_new.php');

  } catch (PDOException $e) {
    var_dump($e);
  }
