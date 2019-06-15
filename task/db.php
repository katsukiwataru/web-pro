<?php
    try  {
        // SELECT 文
        $dbh = new PDO('mysql:host=db;dbname=booklist', 'myuser', 'password');
        $stmt = $dbh->query('SELECT * FROM students');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
            echo '<br />';
        }
    } catch (PDOException $e) {
        var_dump($e);
        exit;
    }


    try {
        // INSERT 文
        // プリペアドステートメント
        $dbh = new PDO('mysql:host=db;dbname=webprodb', 'myuser', 'password');
        $stmt = $dbh->prepare('INSERT INTO students ("code", "name", "grade") VALUES (:code, :name, :grade)';
        $stmt->execute(array(':code' => 'A17DC000', ':name' => 'YAMADA TARO', ':grade' => 3));
    } catch (PDOException $e) {
        var_dump($e);
        exit;
    }
