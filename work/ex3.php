<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=webprodb;charset=utf8;', 'root', '');
    $stmt = $pdo->query('SELECT * FROM students');

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo implode(', ', $row) . PHP_EOL . '<br />';
    }
} catch (PDOException $e) {
    var_dump($e->getMessage());
}

$pdo = null;
