<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login']) == false)
{
  print 'ようこそゲスト様';
  print '<a href="member_login.html">会員ログイン</a><br>';
  print '<br>';
}else{
  print 'ようこそ';
  print $_SESSION['member_name'];
  print '様';
  print '<a href="member_logout.php">ログアウト</a><br>';
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

      $sql = 'SELECT id,name,price FROM mst_product where 1';
      $stmt = $dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      print '商品一覧<br>';

      print '<form method="post" action="pro_branch.php">';
      while(true)
      {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false)
        {
          break;
        }
        print '<a href="shop_product.php?procode='.$rec['id'].'">';
        print $rec['name'].'---';
        print $rec['price'].'円';
        print '<br>';

      }
      print '<br>';
      print '<a href="shop_cartlook.php">カートをみる</a><br>';

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
