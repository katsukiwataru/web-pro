<?php
  // 登録処理
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webprodb',
      'myuser',
      'password'
    );
    $stmt = $dbh->prepare(
    'INSERT INTO students (code, name, grade) VALUES (?,?,?)'
    );

    $code = $_POST['code'];
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $stmt->execute(array($code, $name, $grade));

    header('Location: index.php');
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
