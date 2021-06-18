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
		$number=$_POST["number"];
		$name=$_POST["name"];
		$city=$_POST["city"];
		$district=$_POST['district'];
		$date=$_POST['date'];
		$today_rainfall=$_POST['today_rainfall'];
		echo $city;
		$sql_rain_station = "INSERT INTO rain_station( number, name,city,district) VALUES ('$number','$name','$city','$district')";
		$insert_rain_station=mysqli_query($link,$sql_rain_station);
		if ($insert_rain_station){
			// rain_station change finish
			change_record($link,5,1);

			$sql_rainfall="INSERT INTO rainfall( number, date,today_rainfall) VALUES ('$number','$date','$today_rainfall')";
			$insert_rainfall=mysqli_query($link,$sql_rainfall);
			if($insert_rainfall){
				change_record($link,4,1);
				die("<script> alert(\"已新增成功\"); location.href=\"insertpostcode.html\"; </script>"); 
			}
			else 
				echo '日期插入失敗可能已存在或格式不符合';
				echo $sql_rainfall;
		}	
		else {
			echo '測站編號插入失敗可能已存在或格式不符合';
			echo $sql_rain_station;
		}
	?> 
</body>
</html>
