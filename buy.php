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
		$sql_get_class = "SELECT DISTINCT i_class FROM item";
		$result4 = mysqli_query($conn,$sql_get_class);
		echo "選擇分類";
		//下拉選單
		echo "<form action='buy.php' method='post'>";
		echo "<select name='YourChoise'>";
		echo "<option value='all'>all</option>";
		while($row4 = mysqli_fetch_assoc($result4)){
			$class = $row4["i_class"];
			echo "<option value='$class'>$class</option>";
		}
		echo "</select>";
		echo "<input type ='submit' value='選擇'>";
		echo "</form>";
		echo "<br>";
		$select = "";
		if($_POST['YourChoise'] == null){
			$select = "all";
		}
		else{
			$select = $_POST['YourChoise'];
		}
		$sql_show = "SELECT * FROM item";
		if($select == "all"){
			$sql_show = "SELECT * FROM item";
		}
		else{
			$sql_show = "SELECT * FROM item WHERE i_class='$select'";
		}
		$result = mysqli_query($conn,$sql_show);
		//印出商品
		if (mysqli_num_rows($result) > 0){
			echo "<table width='300' border='1'>";
			while($row = mysqli_fetch_assoc($result)){
				echo "<form action='buy2.php' method='post'>";
				$id = $row["sell_num"]; 
				$item_id = $row["I_num"];
				$sql_get_name = "SELECT nickname FROM user WHERE Num = '$id'";
				$get_name = mysqli_query($conn,$sql_get_name);
				$row2 = mysqli_fetch_assoc($get_name);
				$image = $row["image"];
				echo "<tr>";
				echo "<td>";
				echo "<img src='$image'>";
				echo "</td>";
				echo "<td>";
				echo "<input type='hidden' name='buy' value='$item_id'>";
				echo "賣家姓名:" . $row2["nickname"] . "<br>";
				echo "商品名稱:" . $row["i_name"] . "<br>";
				echo "商品分類:" . $row["i_class"] . "<br>";
				echo "起標價:" . $row["s_price"] . "<br>";
				echo "</td>";
				echo "<td>";
				echo "<input type ='submit' value='點我競標'>";
				echo "</td>";
				echo "</tr>";
				echo "</form>";
			}
			echo "</table>";
		}
		else {
			echo "目前沒有商品上架";	
		}
?>
</body>
</html>