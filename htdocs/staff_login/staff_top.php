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
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <h2>ショップ管理トップメニュー</h2>
    <br>
    <a href="../staff/staff_list.php">スタッフ管理</a>
    <br>
    <a href="../product/pro_list.php">商品管理</a>
    <br>
    <a href="staff_logout.php">ログアウト</a>
    <br>
  </body>
</html>
