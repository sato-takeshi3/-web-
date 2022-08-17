<?php
$product_id = $_GET["product_id"];
$user_id = $_GET["user_id"];
$user_name = $_GET["user_name"];
$start = $_GET["start"];
$size = $_GET["size"];

try {

$pdo = new PDO(

    'mysql:host=localhost;dbname=order;charset=utf8;',

    'root',

    '',

    [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]

);
$query = 'DELETE FROM products WHERE product_id = :product_id';

$stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll();

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
