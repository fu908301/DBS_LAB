<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊完成</title>
</head>

<body>
	<?php
		$dbhost = "localhost";
    	$dbuser = "root";
    	$dbpass = "";
    	$dbname = "auction";
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die('Error with MySQL connection');
		
		$account=$_REQUEST['account'];
		$pwd=$_REQUEST['pwd'];
		$phone=$_REQUEST['phone'];
		$mail=$_REQUEST['mail'];
		
		mysqli_query($conn,"SET NAMES 'utf8'");
		$sql_judge = "SELECT nickname FROM user WHERE nickname='$account'";
		$sql_insert = "INSERT INTO user(nickname,pwd,phone,mail) VALUES('$account','$pwd','$phone','$mail')";
		
		$result = mysqli_query($conn,$sql_insert);
		$name = mysqli_query($conn, $sql_judge);
		$row = mysqli_fetch_assoc($name);
		if($row['nickname'] != ""){
			echo "帳號重複";
			header("Location:http://127.0.0.1/lab/enroll.php");
			exit;
		}
		if(!$result){
			echo "SQL insert error";
			exit;
		}
		echo "註冊成功 即將回到首頁";	
		sleep(3);
		header("Location:http://127.0.0.1/lab/index.php");
		
	?>
</body>
</html>