<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()]) ==true)
{
  setcookie(session_name(),'',time()-42000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    ログアウトしました。
    <br>
    <a href="../staff_login/staff_login.html">ログイン画面へ</a>
  </body>
</html>
