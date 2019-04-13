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
        $pro_name = $_POST['name'];
        $pro_price = $_POST['price'];

        $pro_id = htmlspecialchars($pro_id, ENT_QUOTES, 'UTF-8');
        $pro_name =htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
        $pro_price =htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

        $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh= new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql ='UPDATE mst_product SET name=?, price=? WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_name;
        $data[] = $pro_price;
        $data[] = $pro_id;
        $stmt->execute($data);

        $dbh = null;

        print '修正しました。<br>';
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしています。';
        exit();
    }
    ?>

    <a href="pro_list.php">戻る</a>
  </body>
</html>
