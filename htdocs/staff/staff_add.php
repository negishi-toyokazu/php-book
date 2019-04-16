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
    <h2>スタッフ追加</h2>
    <form action="staff_add_check.php" method="post">
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
