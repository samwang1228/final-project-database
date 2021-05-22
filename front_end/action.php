<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$usename="1234";
		$password="1234";
		if($_POST["ID"]!=$usename || $_POST["password"]!=$password){
			die("<script>  location.href=\"fail.php\"; </script>"); 
		} //失敗時跳轉fail.php
		if ( $_POST["ID"]==$usename || $_POST["password"]==$password ){
			$_SESSION['usename']=$_POST['ID'];
			$_SESSION['password']=$_POST['password'];
			header ('Location: success.php');
		}
	?>
</body>
</html>
