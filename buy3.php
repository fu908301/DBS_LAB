<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>標價處理</title>
</head>
<body>
<?php
	session_start();
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "auction";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die('Error with MySQL connection');
	$id = $_SESSION['num'];
	$item_id = $_POST['item'];
	$price = $_POST['price'];
	$sql_insert = "INSERT INTO price(price, buy_num, i_num) VALUES('$price', '$id', '$item_id')";
	$sql_get_price = "SELECT s_price FROM item WHERE I_num='$item_id'";
	mysqli_query($conn,"SET NAMES 'utf8'");
	$result = mysqli_query($conn,$sql_insert);
	$result2 = mysqli_query($conn,$sql_get_price);
	$row = mysqli_fetch_assoc($result2);
	$price_new = (int)$price;
	$price_old = (int)$row['s_price'];
	if($price_new > $price_old){
		$sql_update = "UPDATE item set s_price='$price_new' WHERE I_num='$id'";	
		$result3 = mysqli_query($conn,$sql_update);
		header("Location:http://127.0.0.1/lab/enroll.php");
	}
	if(!result){
		header("Location:http://127.0.0.1/lab/index.php");
		exit;	
	}
	else{
		header("Location:http://127.0.0.1/lab/buy.php");
		exit;
	}
	
?>
</body>
</html>