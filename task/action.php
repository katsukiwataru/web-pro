<?php
  try  {
    $dbh = new PDO('mysql:host=db;dbname=booklist', 'myuser', 'myuser');
    $stmt = $dbh->prepare(
      'INSERT INTO book (isbn, title, price, category_id, author_id) VALUES (?,?,?,?,?)'
    );

    $name = $_POST['name'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $tags[] = $_POST['tag'];
    $category = $_POST['category'];

    $stmt->execute(array($isbn, $name, $price, $category, $author));

    $stmt = $dbh->query('SELECT max(id) FROM book');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $max_id = $row['max(id)'];
    var_dump($name,$price,$isbn,$author,$category);
    foreach ($tags as $tag){
      $stmt = $dbh->prepare (
      'INSERT INTO book_tag (id, name) VALUES (?, ?)'
      );
      $stmt->execute(array($max_id, $tag));
      var_dump($tag);
    }
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }

// header( "Location: entry.php");
