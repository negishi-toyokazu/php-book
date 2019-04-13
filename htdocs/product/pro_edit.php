<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php
      try
      {
        $pro_id = $_GET['id'];

        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh= new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT name,price FROM mst_product where id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_id;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];
        $dbh = null;

      } catch(EXCEPTION $e)
      {
        print 'ただいま障害により大変ご迷惑をおかけしています。';
        exit();
      }
      ?>

      商品の修正<br />
      <br />
      商品ID<br />
      <?php print $pro_id; ?>
      <br />
      <form action="pro_edit_check.php" method="post">
        <input type="hidden" name="id" value="<?php print $pro_id; ?>">
        商品名<br />
        <input type="text" name="name" value="<?php print $pro_name; ?>" style="width:200px"><br />
        パスワードを入力してください<br/>
        <input type="text" name="price" value="<?php print $pro_price; ?>" style="width:50px">円<br />

        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
      </form>
  </body>
</html>
