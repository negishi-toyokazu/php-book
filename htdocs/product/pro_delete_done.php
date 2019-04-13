<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ろくまる農園</title>
  </head>
  <body>
    <?php
    try {
        $pro_id = $_POST['id'];


        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh= new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ='DELETE FROM mst_product WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_id;
        $stmt->execute($data);

        $dbh = null;

    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしています。';
        exit();
    }
    ?>
    削除しました。<br>
    <br>
    <a href="pro_list.php">戻る</a>
  </body>
</html>