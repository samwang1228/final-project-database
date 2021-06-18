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
		if(isset($_POST['argi-submit'])){   //限制圖片型別格式，大小
			$area=$_POST['area'];
			$year=$_POST['year'];
			$irrigation=$_POST['irrigation'];
			$aquaculture=$_POST['aquaculture'];
			$livestock=$_POST['livestock'];
			$sql_argi="INSERT INTO agriculture_water( area, year,irrigation,aquaculture,livestock) VALUES ('$area','$year','$irrigation','$aquaculture','$livestock')";
			$insert_argi=mysqli_query($link,$sql_argi);
			if($insert_argi){
				change_record($link,6,1);
				die("<script> alert(\"農業用水已新增成功\"); location.href=\"insertwater.html\"; </script>"); 
			}else 
				echo "農業用水新增失敗"; 
				echo $sql_argi;
				echo $area;
				echo $year;
				echo $irrigation; 
				echo $aquaculture;
   		}
   		else if(isset($_POST['live-submit'])){   //限制圖片型別格式，大小
			$city=$_POST['city'];
			$year=$_POST['year'];
			$tapwater_population=$_POST['tapwater_population'];
			$tapwater_used=$_POST['tapwater_used'];
			$selftake_population=$_POST['selftake_population'];
			$selftake_used=$_POST['selftake_used'];
			$sql_live="INSERT INTO living_water( city, year,tapwater_population,tapwater_used,selftake_population,selftake_used) VALUES ('$city','$year','$tapwater_population','$tapwater_used','$selftake_population','$selftake_used')";
			$insert_live=mysqli_query($link,$sql_live);
			if($insert_live){
				change_record($link,7,1);
				die("<script> alert(\"生活用水已新增成功\"); location.href=\"insertwater.html\"; </script>"); 
			}else 
				echo "生活用水新增失敗"; 
				echo $sql_live;
   		}
   		else if(isset($_POST['indu-submit'])){   //限制圖片型別格式，大小
			$city=$_POST['city'];
			$year=$_POST['year'];
			$industrial_project=$_POST['industrial_project'];
			$industrial_project_area=$_POST['industrial_project_area'];
			$industrial_project_used=$_POST['industrial_project_used'];
			$sql_indu="INSERT INTO industrial_water( city, year,industrial_project,industrial_project_area,industrial_project_used) VALUES ('$city','$year','$industrial_project','$industrial_project_area','$industrial_project_used')";
			$insert_indu=mysqli_query($link,$sql_indu);
			if($insert_indu){
				change_record($link,8,1);
				die("<script> alert(\"工業用水已新增成功\"); location.href=\"insertwater.html\"; </script>"); 
		   	}else 
				echo "工業用水新增失敗"; 
				echo $sql_indu;
   		}
	?> 
</body>
</html>
