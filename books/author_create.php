<?php
  $author = $_POST['author'];
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webpro_books',
      'myuser',
      'password'
    );

    // プリペアドステートメントを使う
    $stmt = $dbh->prepare('insert into author (name) values(?)');
    $stmt->execute([$author]);

    header('Location: author_new.php');

  } catch (PDOException $e) {
    var_dump($e);
  }
