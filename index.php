<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index</title>
</head>
	<body>
    	<form action="mid.php" method="post">
		帳號:
		<input type="text" name="account">
        <br>
        <br>
        密碼:
        <input type="password" name="pwd">
        <br>
        <br>
        以何種身分登入
        <br>
        <input type ="radio" name="type" value="sell" checked>賣家
		<input type ="radio" name="type" value="buy">買家
        <input type ="submit" value="登入">
        </form>
        <input type="button" value="註冊" onclick="window.location.href='http://127.0.0.1/lab/enroll.php'"/>
	</body>
</html>