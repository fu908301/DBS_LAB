<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>競標</title>
</head>
<body>
<?php
	session_start();
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "auction";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die('Error with MySQL connection');
	mysqli_query($conn,"SET NAMES 'utf8'");
	$item_id = $_POST['buy'];
	$sql_show = "SELECT * FROM item WHERE I_num='$item_id'";
	$result = mysqli_query($conn,$sql_show);
	$row = mysqli_fetch_assoc($result);
	echo "商品名稱:" . $row["i_name"] . "<br>";
	echo "商品分類:" . $row["i_class"] . "<br>";
	echo "起標價:" . $row["s_price"] . "<br>";
	echo "<br>";
	echo "你的出價:";
	echo "<form action='buy3.php' method='post'>";
    echo "<input type='text' name='price'>";
    echo "<input type='hidden' name='item' value='$item_id'>";
	echo "<br>";
	echo "想對賣家說的話";
	echo "<input type='text' name='message' cols='40' rows='5' style='width:200px; height:50px;'>";
    echo "<input type ='submit' value='競標'>";
?>
	
</body>
</html>