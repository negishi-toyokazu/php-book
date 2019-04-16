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
    try{
      $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = 'root';
      $dbh= new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT id,name FROM mst_staff where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print 'スタッフ一覧<br>';

      print '<form method="post" action="staff_branch.php">';
      while(true)
      {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false)
        {
          break;
        }
        print '<input type="radio" name="id" value=" '.$rec['id'].' ">';
        print $rec['name'];
        print '<br>';
      }
      print '<input type="submit" name="disp" value="参照">';
      print '<input type="submit" name="add" value="追加">';
      print '<input type="submit" name="edit" value="修正">';
      print '<input type="submit" name="delete" value="削除">';
      print '</form>';

    }
    catch(EXCEPTION $e)
    {
      print 'ただいま障害により大変ご迷惑をおかけしています。';
      exit();
    }
    ?>
    <a href="../staff_login/staff_top.php">トップメニューへ</a>
    <br>
  </body>
</html>
