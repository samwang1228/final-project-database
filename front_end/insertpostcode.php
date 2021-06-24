<!DOCTYPE html>
<?php session_start(); 
require_once 'connect.php';
include_once('./php/database_record.php');
?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
	$city=$_POST["city"];
	$district=$_POST["district"];
	echo $city;
	// if(isset($_POST['area']))
	// {
	// 	$area=$_POST['area'];
	// 	$sql_city = "INSERT INTO city_area( city, area) VALUES ('$city','$area')";
	// 	echo $sql_city;
	// }
	// $insert_city=mysqli_query($link,$sql_city);
	// if (!$insert_city){	
	// 	echo '縣市插入失敗可能已存在或格式不符合';
	// }
		// city_area change finish
	change_record($link,3,1,"Insert");

		//插入時可能縣市已經存在，只是加入新的區域
	$sql_postcode="INSERT INTO postcode_area( city, district) VALUES ('$city','$district')";
	echo $sql_postcode;
	$insert_postcode=mysqli_query($link,$sql_postcode);
	if($insert_postcode){			
		change_record($link,2,1,'Insert');
		die("<script> alert(\"已新增成功\"); location.href=\"insertpostcodeframe.php\"; </script>"); 
	}
	else 
		echo '鄉鎮插入失敗可能已存在或格式不符合';
	?> 
	</body>
	</html>
