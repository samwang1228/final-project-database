<!DOCTYPE html>
<?php session_start(); ?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(isset($_POST["data-submit"])){
		$link = mysqli_connect('localhost', 'root', 'password', 'reservoir_project');

		if ($link)
		{
			//若傳回正值，就代表已經連線
			//設定連線編碼為UTF-8
			//mysqli_query(資料庫連線, "語法內容") 為執行sql語法的函式
			mysqli_query($link, "SET NAMES utf8");
			echo "已正確連線";
		}
		else
		{
			//否則就代表連線失敗 mysqli_connect_error() 是顯示連線錯誤訊息
			echo '無法連線mysql資料庫 :<br/>' . mysqli_connect_error();
		}
		$city=$_POST["city"];
		$district=$_POST["district"];
		$area=$_POST["area"];
		echo $city;
		$sql = "INSERT INTO user( userid, password, nickname) VALUES ('$city','$district','$area')";	
		$result = mysqli_query($link, $sql);
		echo $sql;
		die("<script> alert(\"已新增成功\"); location.href=\"insertpostcode.html\"; </script>"); 
	}
	else{
		echo "fail";
	}
	?> 
</body>
</html>
