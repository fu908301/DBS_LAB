<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>賣家你好</title>
</head>
<body>
	<?php
		session_start();
		$id = $_SESSION['id'];
		$num = $_SESSION['num'];
		echo "賣家 " . $id . " 你好" . "<br>";
	?>
	<form action="sell2.php" method="post" enctype="multipart/form-data">
    請輸入以下商品資料
    <br>
    商品名稱:
	<input type="text" name="i_name">
    <br>
    類別
    <input type="text" name="i_class">
    <br>
    起標價
    <input type="text" name="i_price">
    圖片
    <br>
    <input type="file" name="image">
    <input type ="submit" value="上架">
    </form>
    <br>
    <input type="button" value="登出" onclick="window.location.href='http://127.0.0.1/lab/index.php'"/>
</body>
</html>