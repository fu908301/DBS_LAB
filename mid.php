<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loading...</title>
</head>

<body>
<?php
	echo "這是中繼站";
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