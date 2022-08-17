
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title></title>
</head>
<body>

<p>ようこそ <?php echo $user_name; ?> さん</p>




<!--検索を押したとき-->
<p>
<form action="search.php" method="get">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="start" value="<?php echo $start; ?>">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
         <label for="products">情報検索</label>
         <input type="search"   name="name" placeholder="入力例「あ」,「0」, 「a」"/>
         <input type="submit" name="submitBtn" value="検索" class="button1">
    </form>
</p><br><br>

<?php 
foreach($result as $row) {
    echo '<p>';
    //echo $count;
    echo $row["product_id"];
    echo ",";
    echo $row["name"];
    echo ',\\';
    echo $row["price"];
    echo '<p>';
    
?>
<!--変更を押したとき-->
<form action="change.php" method="get">
    <input type="hidden" name="product_id" value="<?php echo $row["product_id"]?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="start" value="<?php echo $start; ?>">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
    <input type="submit" name="submitBtn" value="変更">
    </form>

<!--消去を押したとき-->
<form action="delete.php" method="get">
     <input type="hidden" name="product_id" value="<?php echo $row["product_id"]?>">
     <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
    <input type="hidden" name="start" value="<?php echo $start; ?>">
    <input type="hidden" name="size" value="<?php echo $size; ?>">
     <input type="submit" name="submitBtn" value="消去">
</form>
<?php
}
?>
<br>
<br>
<!--前へを押したとき-->
    <form action="select.php" method="get">
        <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="start" value ="
            <?php
                $next = $start - 5;
                if ($next < 0) {
                    $next = 0;
                }
                echo $next;
            ?>

        ">
        <input type="hidden" name="size" value="<?php echo $size; ?>">
        <input type="submit" name="submitBtn" value="前へ">
    </form>
<!--次へを押したとき-->
    <form action="select.php" method="get">
         <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
         <input type="hidden" name="start" value="<?php echo $start + 5; ?>">
         <input type="hidden" name="size" value="<?php echo $size; ?>">
         <input type="submit" name="submitBtn" value="次へ">
    </form>
<!--新規を押したとき-->
    <form action="new.php" method="get">
         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
         <input type="hidden" name="user_name" value="<?php echo $user_name; ?>">
         <input type="hidden" name="start" value="<?php echo $start; ?>">
         <input type="hidden" name="size" value="<?php echo $size; ?>">
         <input type="submit" name="submitBtn" value="新規">
    </form>


    </body>
</html>
