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
		
		$name = $_POST['i_name'];
		$class = $_POST['i_class'];
		$price = $_POST['i_price'];
		$id = $_SESSION['id'];
		$num = $_SESSION['num'];
		//以下圖片處理
		// 取得上傳圖片
		$src = imagecreatefromjpeg($_FILES['image']['tmp_name']);

		// 取得來源圖片長寬
		$src_w = imagesx($src);
		$src_h = imagesy($src);

		// 假設要長寬不超過90
		if($src_w > $src_h){
  			$thumb_w = 90;
  			$thumb_h = intval($src_h / $src_w * 90);
		}else{
  			$thumb_h = 90;
  			$thumb_w = intval($src_w / $src_h * 90);
		}
		// 建立縮圖
		$thumb = imagecreatetruecolor($thumb_w, $thumb_h);

		// 開始縮圖
		imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);

		// 儲存縮圖到指定 thumb 目錄
		imagejpeg($thumb, "thumb/".$_FILES['image']['name']);

		move_uploaded_file($_FILES["image"]["tmp_name"],"image/".$_FILES["image"]["name"]);
		
		$image_loc = "thumb/".$_FILES['image']['name'];
		mysqli_query($conn,"SET NAMES 'utf8'");
		$sql_insert = "INSERT INTO item(sell_num, i_name ,i_class ,s_price,image) VALUES('$num', '$name', '$class', '$price', '$image_loc')";
		$result = mysqli_query($conn,$sql_insert);
		if(!$result){
			echo "SQL insert error";
			exit;
		}
		header("Location:http://127.0.0.1/lab/sell.php");
	?>
</body>
</html>