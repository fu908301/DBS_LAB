<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>賣東西處理</title>
</head>
<body>
	<?php
		session_start();
		$dbhost = "localhost";
    	$dbuser = "root";
    	$dbpass = "";
    	$dbname = "auction";
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die('Error with MySQL connection');
		
		$name = $_REQUEST['i_name'];
		$class = $_REQUEST['i_class'];
		$price = $_REQEST['i_price'];
		$id = $_SESSION['id'];
		$num = $_SESSION['num'];
		
		mysqli_query($conn,"SET NAMES 'utf8'");
		$sql_insert = "INSERT INTO item(`sell_num`, i_name ,i_class ,`s_price`) VALUES('$num', '$name', '$class', '$price')";
		$result = mysqli_query($conn,$sql_insert);
		if(!$result){
			echo "SQL insert error";
			exit;
		}
		header("Location:http://127.0.0.1/lab/sell.php");
	?>
</body>
</html>