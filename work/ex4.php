<?php
  try {
    $dbh = new PDO('mysql:host=db;dbname=webprodb', 'myuser', 'password');
    $stmt = $dbh->query('SELECT * FROM students');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      print_r($row);
      echo '<br />';
    }
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
