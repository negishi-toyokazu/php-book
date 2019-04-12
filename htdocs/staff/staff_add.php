<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <h2>スタッフ追加</h2>
    <form action="staff_check.php" method="post">
      <h4>スタッフ名を入力してください</h4>
      <input type="text" name="name" style="width:200px">
      <h4>パスワードを入力してください</h4>
      <input type="password" name="pass" style="width:200px">
      <h4>パスワードをもう一度入力してください</h4>
      <input type="password" name="pass2" style="width:200px">
      <br />
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>
