<!DOCTYPE html>
<?php session_start(); 
require_once 'connect.php';
?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<!-- ok ii -->
	<?php
	$reservoir_id=$_POST["reservoir_id"];
	$date=$_POST["date"];
	$effective_water_storage=$_POST["effective_water_storage"];
	$effective_capacity=$_POST["effective_capacity"];
	$outflow=$_POST['outflow'];
	$inflow=$_POST['inflow'];
	$reservoir_rainfall=$_POST["reservoir_rainfall"];
	echo $city;
	$sql = "INSERT INTO reservoir_water_condition( reservoir_id, date ,effective_water_storage, effective_capacity,outflow,inflow,reservoir_rainfall) VALUES ('$reservoir_id','$date','$effective_water_storage','$effective_capacity','$outflow','$inflow','reservoir_rainfall')";	
	$result = mysqli_query($link, $sql);
	echo $sql;
	die("<script> alert(\"已新增成功\"); location.href=\"insertreservoir.html\"; </script>"); 
	?> 
</body>
</html>
