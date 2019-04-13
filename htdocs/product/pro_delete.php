<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php
      try {
          $pro_id = $_GET['id'];

          $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
          $user = 'root';
          $password = 'root';
          $dbh= new PDO($dsn, $user, $password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = 'SELECT name FROM mst_product where id=?';
          $stmt = $dbh->prepare($sql);
          $data[] = $pro_id;
          $stmt->execute($data);

          $rec = $stmt->fetch(PDO::FETCH_ASSOC);
          $pro_name = $rec['name'];
          $pro_price = $rec['price'];

          $dbh = null;

      } catch (EXCEPTION $e) {
          print 'ただいま障害により大変ご迷惑をおかけしています。';
          exit();
      }
      ?>

      商品削除<br />
      <br />
      商品名<br />
      <?php print $pro_name; ?>
      <br />
      <br>
      この商品を削除してよろしいですか？<br />
      <br>
      <form action="pro_delete_done.php" method="post">
        <input type="hidden" name="id" value="<?php print $pro_id; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
      </form>
  </body>
</html>
