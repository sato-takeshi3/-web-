<!--新規登録-->
<?php
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
  <!--登録するデータをadd.phpに送る-->
<form action ="add.php" method="post">
<p>新規登録</p>
<p>プロダクトID:</p><input type="text" name="message_01"><br/>
<p>タイプ:</p><input type="text" name="message_02"><br/>
<p>プロダクト情報:</p><input type="text" name="message_03"><br/>
<p>価格:</p><input type="text" name="message_04"><br/>
<p>注文年:</p><input type="text" name="message_05"><br/>
<p>注文ID:</p><input type="text" name="message_06"><br/>
<input type ="submit" value="登録">
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
         <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
         <input type="hidden" name="start" value="<?php echo $start; ?>">
         <input type="hidden" name="size" value="<?php echo $size; ?>">


</form>

<form action="select.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="start" value="<?php echo $start; ?>">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
  </form>