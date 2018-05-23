<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loading...</title>
</head>

<body>
<?php
	session_start();
	$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "auction";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die('Error with MySQL connection');
	
	$account=$_REQUEST['account'];
	$pwd=$_REQUEST['pwd'];
	
	
	mysqli_query($conn,"SET NAMES 'utf8'");
	$sql="SELECT pwd FROM user WHERE nickname='$account'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	
	if($row['pwd'] != $pwd){
		header("Location:http://127.0.0.1/lab/loginerror.php");
		exit;	
	}
	else if($row['pwd'] == $pwd){
		echo "登入成功";
	}
	$_SESSION['id'] = $account;
	$sql2="SELECT Num FROM user WHERE nickname='$account'";
	$result2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_assoc($result2);
	$_SESSION['num'] = $row2['Num'];
	
	$jump=$_POST['type'];
	if($jump=="sell"){
		header("Location:http://127.0.0.1/lab/sell.php");
		exit;
	}
	else if($jump=="buy"){
		header("Location:http://127.0.0.1/lab/buy.php");
		exit;
	}
	else {
		echo "好像出了問題";
	}

?>
</body>
</html>