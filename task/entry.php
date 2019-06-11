<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>商品登録画面</h1>
<div>
  <form action="action.php"
        method="POST"
        enctype="multipart/form-data">
    <div>
      <label>商品名</label>
      <input type="text" name="product_name">
    </div>
    <div>
    <div>
      <label>価格</label>
      <input type="text" name="price">
    </div>
    <label>著者</label>
    <select name="author">
      <option value="">選択してください</option>
      <option value="Cory">コーリー・アルソフ</option>
      <option value="Mana">Mana</option>
    </select>
    </div>
    <div>
      <label>カテゴリー</label>
      <select name="category">
        <option value="">選択してください</option>
        <option value="desgin">デザイン</option>
        <option value="programming">プログラミング</option>
      </select>
    </div>
    <div>
      <label>タグ</label>
        <input type="checkbox" name="tag" value="easy">わかりやすい
        <input type="checkbox" name="tag" value="interesting">面白い
        <input type="checkbox" name="tag" value="required">必須
        <input type="checkbox" name="tag" value="python">python
        <input type="checkbox" name="tag" value="self-study">独学シリーズ
    </div>
    <div>
      <button>登録</button>
    </div>
  </form>
</div>
</body>
</html>
