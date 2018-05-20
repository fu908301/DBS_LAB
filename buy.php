<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>買家</title>
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
		
		$sql_show = "SELECT * FROM item";
		$result = mysqli_query($conn,$sql_insert);
		$row = mysqli_fetch_assoc($result);
		if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					$id = $row["sell_num"]; 
					$sql_get_name = "SELECT nickname FROM user WHERE Num = '$id'";
					$get_name = mysqli_query($conn,$sql_get_name);
					echo "賣家姓名:" . $get_name["nickname"] . "<br>";
					echo "商品名稱:" . $row["i_name"] . "<br>";
					echo "商品分類:" . $row["i_class"] . "<br>";
					echo "起標價:" . $row["s_price"] . "<br>";
				}
		}
		else {
			echo "目前沒有商品上架";	
		}
?>
</body>
</html>