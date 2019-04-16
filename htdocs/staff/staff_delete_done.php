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
        $staff_id = $_POST['id'];


        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh= new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ='DELETE FROM mst_staff WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_id;
        $stmt->execute($data);

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしています。';
        exit();
    }
    ?>
    削除しました。<br>
    <br>
    <a href="staff_list.php">戻る</a>
  </body>
</html>
