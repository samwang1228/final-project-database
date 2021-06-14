<!DOCTYPE html>
<?php session_start(); 
require_once 'connect.php';
?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$city=$_POST["city"];
		$district=$_POST["district"];
		$area=$_POST["area"];
		echo $city;
		$sql_city = "INSERT INTO city_area( city, area) VALUES ('$city','$area')";
		$insert_city=mysqli_query($link,$sql_city);
		if ($insert_city){
			$sql_postcode="INSERT INTO postcode_area( city, district) VALUES ('$city','$district')";
			$insert_postcode=mysqli_query($link,$sql_postcode);
			if($insert_postcode){
				die("<script> alert(\"已新增成功\"); location.href=\"insertpostcode.html\"; </script>"); 
			}
			else 
				echo '鄉鎮插入失敗可能已存在或格式不符合';
		}	
		else {
			echo '縣市插入失敗可能已存在或格式不符合';
		}
	?> 
</body>
</html>
