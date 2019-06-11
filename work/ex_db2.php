<?php
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=webprodb',
      'myuser',
      'password'
    );
    // INSERT
    // プリペアドステートメント
    $stmt = $dbh->prepare(
      'INSERT INTO students (code, name, grade) VALUES (?, ?, ?)'
    );
    // プリペアドステートメントの置き換えしたい箇所を ? で記述しておき
    // execute の引数に配列（順番大事！）で渡す
    $stmt->execute(array('A17DC999', 'Syougo Hamada', 3));
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
