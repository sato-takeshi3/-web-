
<?php
$user_name = $_GET["user_name"];
$start = $_GET["start"];
$size = $_GET["size"];
$name = $_GET["name"];
$name = "%".$name."%";

?>
<?php
    try {

        $pdo = new PDO(
    
            'mysql:host=localhost;dbname=order;charset=utf8;',
    
            'root',
    
            '',
    
            [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]
        );
        $query = 'SELECT * FROM products WHERE name LIKE :name';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':name', $name);
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