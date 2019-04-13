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

      スタッフ削除<br />
      <br />
      スタッフ名<br />
      <?php print $staff_name; ?>
      <br />
      <br>
      このスタッフを削除してよろしいですか？<br />
      <br>
      <form action="staff_delete_done.php" method="post">
        <input type="hidden" name="id" value="<?php print $staff_id; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
      </form>
  </body>
</html>
