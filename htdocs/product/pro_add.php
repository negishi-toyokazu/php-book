<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <h2>商品追加</h2>
    <form action="pro_add_check.php" method="post">
      <h4>商品名を入力してください</h4>
      <input type="text" name="name" style="width:200px">
      <h4>価格を入力してください</h4>
      <input type="text" name="price" style="width:200px">
      <br />
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>
