<!--送られた情報をphpmyadminに登録する-->
<?php
//new.phpから送られた情報を受け取る
  $user_id = $_POST["user_id"];
  $user_name = $_POST["user_name"];
  $start = $_POST["start"];
  $size = $_POST["size"];

  $product_id = $_POST["message_01"];
  $type = $_POST["message_02"];
  $name = $_POST["message_03"];
  $price = $_POST["message_04"];
  $order_date = $_POST["message_05"];
  $order_status = $_POST["message_06"];

  try {

    $pdo = new PDO(

        'mysql:host=localhost;dbname=order;charset=utf8;',

        'root',

        '',

        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]

    );    

    $query = 'INSERT INTO products (product_id, type, name, price, order_date, order_status) VALUES (:message_01, :message_02, :message_03, :message_04, :message_05, :message_06)';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':message_01', $product_id, PDO::PARAM_INT);
    $stmt->bindParam(':message_02', $type, PDO::PARAM_INT);
    $stmt->bindParam(':message_03', $name);
    $stmt->bindParam(':message_04', $price, PDO::PARAM_INT);
    $stmt->bindParam(':message_05', $order_date, PDO::PARAM_INT);
    $stmt->bindParam(':message_06', $order_status, PDO::PARAM_INT);

    $stmt->execute();

    $query = 'SELECT * FROM products order by product_id limit :begin, :size';


    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':begin', $start, PDO::PARAM_INT);
    $stmt->bindParam(':size', $size, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();
  }
    catch (PD0Exception $e) {

    require_once 'exception_tpl.php';
    echo $e->getMessage();
    exit();
    }

    require_once 'viewSelect_tpl.php';


?>
