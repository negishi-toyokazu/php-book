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
    <?php
      try {
          $staff_id = $_GET['id'];

          $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
          $user = 'root';
          $password = 'root';
          $dbh= new PDO($dsn, $user, $password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = 'SELECT name FROM mst_staff where id=?';
          $stmt = $dbh->prepare($sql);
          $data[] = $staff_id;
          $stmt->execute($data);

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $staff_name = $rec['name'];

          $dbh = null;
      } catch (EXCEPTION $e) {
          print 'ただいま障害により大変ご迷惑をおかけしています。';
          exit();
      }
      ?>

      スタッフ情報参照<br />
      <br />
      スタッフID<br />
      <?php print $staff_id; ?>
      <br />
      スタッフ名<br />
      <?php print $staff_name; ?>
      <br>
      <br>
      <form>
        <input type="button" onclick="history.back()" value="戻る">
      </form>
  </body>
</html>
