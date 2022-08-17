<?php
  $user_id = $_GET["user_id"];
  $password = $_GET["password"];
  $start = $_GET["start"];
  $size = $_GET["size"];

  
  try {

    $pdo = new PDO(

        'mysql:host=localhost;dbname=order;charset=utf8;',

        'root',

        '',

        [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
    );



    $query = 'SELECT * FROM user WHERE user_id = :user_id AND password = :password';


    $stmt = $pdo->prepare($query);


    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':password', $password);


    $stmt->execute();


    $result = $stmt->fetchAll();
    if(empty($result)) {
      require_once 'login.html';
    } else {
      $user_name = $result[0]["name"];

      $query = 'SELECT * FROM products order by product_id limit :begin, :size';

      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':begin', $start, PDO::PARAM_INT);
      $stmt->bindParam(':size', $size, PDO::PARAM_INT);
      $stmt->execute();
      $result = $stmt->fetchAll();

      require_once 'viewSelect_tpl.php';
    }

  } catch (PD0Exception $e) {

    require_once 'exception_tpl.php';
    echo $e->getMessage();
    exit();
  }
?>