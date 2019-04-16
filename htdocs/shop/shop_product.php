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
      try {
          $pro_id = $_GET['procode'];

          $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
          $user = 'root';
          $password = 'root';
          $dbh= new PDO($dsn, $user, $password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = 'SELECT name,price,gazou FROM mst_product where id=?';
          $stmt = $dbh->prepare($sql);
          $data[] = $pro_id;
          $stmt->execute($data);

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $pro_name = $rec['name'];
          $pro_price = $rec['price'];
          $pro_gazou_name = $rec['gazou'];

          $dbh = null;

          if($pro_gazou_name == "")
          {
            $disp_gazou = "";
          }else{
            $disp_gazou = '<img src="../product/gazou'.$pro_gazou_name.'">';
          }
          print'<a href="shop_cartin.php?procode='.$pro_id.'">カートに入れる</a><br><br>';

      } catch (EXCEPTION $e) {
          print 'ただいま障害により大変ご迷惑をおかけしています。';
          exit();
      }
      ?>

      商品情報参照<br />
      <br />
      商品ID<br />
      <?php print $pro_id; ?>
      <br />
      商品名<br />
      <?php print $pro_name; ?>
      <br>
      価格<br />
      <?php print $pro_price; ?>
      円
      <br>
      <?php print $disp_gazou; ?>
      <br>
      <form>
        <input type="button" onclick="history.back()" value="戻る">
      </form>
  </body>
</html>
