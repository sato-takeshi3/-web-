<?php
  $product_id = $_POST["product_id"];
  $user_id = $_POST["user_id"];
  $user_name = $_POST["user_name"];
  $start = $_POST["start"];
  $size = $_POST["size"];

  $name = $_POST["message_01"];
  $price = $_POST["message_02"];

  try {

    $pdo = new PDO(

        'mysql:host=localhost;dbname=order;charset=utf8;',

        'root',

        '',

        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]

    );
    $query = 'UPDATE products SET name = :message_01, price = :message_02 WHERE product_id = :product_id';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':message_01', $name);
    $stmt->bindParam(':message_02', $price, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
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
