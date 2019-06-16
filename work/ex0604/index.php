<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8" />
  </head>
  <body>
    <div>
    <form action="create.php" method="POST">
      <div>
        <label>学籍番号</label>
        <input type="text" name="code">
      </div>
      <div>
        <label>氏名</label>
        <input type="text" name="name">
        </div>
      <div>
        <label>学年</label>
        <select name="grade">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
      <button>登録</button>
    </form>
  </div>

  <hr />

  <div>
    <h3>検索</h3>
    <div>
      <form action="index.php" method="GET">
        <label>学籍番号</label>
        <input type="text" name="code" value="<?= h($_GET['code']) ?>">
        <button>検索</button>
      </form>
    </div>

    <hr />

    <table border="1">
      <tr>
        <th>学籍番号</th>
        <th>氏名</th>
        <th>学年</th>
      </tr>
<?php

  // プリペアドステートメント

  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }

  try {
    $dbh = new PDO('mysql:host=db;dbname=webprodb','myuser', 'password');

    $sql = 'SELECT * FROM students';
    if (isset($_GET['code'])) {
      $sql .= ' WHERE code = ?';
    }
    $stmt = $dbh->prepare($sql);
    $params = array();
    if (isset($_GET['code'])) {
      array_push($params, $_GET['code']);
    }
    $stmt->execute($params);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
      <tr>
        <td><?= h($row['code']) ?></td>
        <td><?= h($row['name']) ?></td>
        <td><?= h($row['grade']) ?></td>
      </tr>
<?php
    }
  } catch (PDOException $e) {
    var_dump($e);
    exit;
  }
?>

    </table>
  </div>
  </body>
</html>
