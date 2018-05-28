<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>使用者你好</title>
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
	$id = $_SESSION['id'];
	$num = $_SESSION['num'];
	$get_info = "SELECT * FROM user WHERE nickname='$id'";
	$result = mysqli_query($conn,$get_info);
	$row = mysqli_fetch_assoc($result);
	echo "您的帳號是 : " . $id . "<br>";
	echo "您的密碼是 : " . $row["pwd"] . "<br>";
	echo "您的EMAIL : " . $row["mail"] . "<br>";
	echo "您的電話號碼 : " . $row["phone"] . "<br>";
	$get_mess = "SELECT buy_num,message FROM message WHERE sell_num='$num'";
	$result2 = mysqli_query($conn,$get_mess);
	if (mysqli_num_rows($result) > 0){
		echo "<table width='300' border='1'>";
		while($row2 = mysqli_fetch_assoc($result2)){
			$buy_mes = $row2["buy_num"];
			$get_name = "SELECT nickname FROM user WHERE Num='$buy_mes'";
			$result3 = mysqli_query($conn,$get_name);
			$row3 = mysqli_fetch_assoc($result3);
			$mess = $row2["message"];
			$mess_name = $row3["nickname"];
			echo "<tr>";
			echo "<td>";
			echo "留言者 : " . $mess_name;
			echo "</td>";
			echo "<td>";
			echo "留言內容 : " . $mess;
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
	<input type="button" value="賣東西" onclick="window.location.href='http://127.0.0.1/lab/sell.php'"/>
    <input type="button" value="買東西" onclick="window.location.href='http://127.0.0.1/lab/buy.php'"/>
    <input type="button" value="登出" onclick="window.location.href='http://127.0.0.1/lab/logout.php'"/>
</body>
</html>