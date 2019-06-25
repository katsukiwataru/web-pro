<?php
  $category = $_POST['category'];
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webpro_books',
      'myuser',
      'password'
    );

    // プリペアドステートメントを使う
    $stmt = $dbh->prepare('insert into category (name) values(?)');
    $stmt->execute([$category]);

    header('Location: category_new.php');

  } catch (PDOException $e) {
    var_dump($e);
  }
