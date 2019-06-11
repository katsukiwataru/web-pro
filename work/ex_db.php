<?php
  // http://192.168.99.100:8080/ex_db.php
  try {
    $dbh = new PDO(
      'mysql:host=db;dbname=mysql',
      'myuser',
      'password'
    );
    // SELECT 文
    $stmt  = $dbh->query('SELECT user, host FROM user');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      print_r($row);
      print('<br />');
    }
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
