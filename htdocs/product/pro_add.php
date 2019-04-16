<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false)
 {
   print 'ログインされていません<br>';
   print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
   exit();
 }else{
   print $_SESSION['staff_name'];
   print 'さんログイン中';
   print '<br>';
 }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <h2>商品追加</h2>
    <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
      <h4>商品名を入力してください</h4>
      <input type="text" name="name" style="width:200px">
      <h4>価格を入力してください</h4>
      <input type="text" name="price" style="width:200px">
      <br />
      <h4>画像を選んでください</h4>
      <input type="file" name="gazou" style="width:400px">
      <br />
      <br>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  </body>
</html>
