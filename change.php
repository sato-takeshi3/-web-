<!--情報の変更-->
<?php
  $product_id = $_GET["product_id"];
  $user_id = $_GET["user_id"];
  $user_name = $_GET["user_name"];
  $start = $_GET["start"];
  $size = $_GET["size"];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title></title>
</head>
<body>
<p>データベース変更</p>
<p>見本　:  プロダクトID（0）、名前(null)、価格(0)
</p>
<p></p>
<form action ="change_2.php" method="post">
     <input type="text" name="message_01">,<input type="text" name="message_02">
     <input type="submit" name="submitBtn" value="変更">
     <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
     <input type="hidden" name="name" value="<?php echo $name; ?>">
     <input type="hidden" name="price" value="<?php echo $price; ?>">
         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
         <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
         <input type="hidden" name="start" value="<?php echo $start; ?>">
         <input type="hidden" name="size" value="<?php echo $size; ?>">


</form>