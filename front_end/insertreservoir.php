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
	<!-- ok ii -->
	<?php
	$reservoir_id=$_POST["reservoir_id"];
	$reservoir_name=$_POST["reservoir_name"];
	$city=$_POST["city"];
	$district=$_POST["district"];
	$file_name=$_FILES["file"]["name"];
	$file_type=$_FILES["file"]["type"];
	$file_size=$_FILES["file"]["size"];
    if(isset($_POST['data-submit'])){   //限制圖片型別格式，大小

    	$filename='img/reservoir/'.$reservoir_id.'.jpg';
    	echo $filename;
    }
    else {
    	echo "fail";
    }
    if ((($file_type == "image/gif")
    	|| ($file_type == "image/jpeg")
    	|| ($file_type == "image/jpg"))
    	&& ($file_size < 2000000)) {
    	if ($_FILES["file"]["error"] > 0) {
    		echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    	} 
    	else {
    		echo "檔名: " . $file_name . "<br />";
    		echo "檔案型別: " . $file_type . "<br />";
    		echo "檔案大小: " . ($file_size / 1024) . " Kb<br />";
                    // echo "快取檔案: " . $file_name . "<br />";
                //設定檔案上傳路徑，選擇指定資料夾
    		if (file_exists($filename)) {
    			echo $reservoir_name . " already exists. ";
    		} 
    		else {
    			move_uploaded_file($_FILES['file']['tmp_name'], $filename);
                        echo "儲存於: " . $filename;//上傳成功後提示上傳資訊
                    }
                }
            } 
            else {
                echo "上傳失敗！";//上傳失敗後顯示錯誤資訊
                echo "檔名: " . $file_size . "<br />";
                echo "檔案型別: " . $file_type . "<br />";
                echo "檔案大小: " . ($file_size / 1024) . " Kb<br />";
                echo "快取檔案: " . $file_name . "<br />";

            }
	echo $city;
	$sql = "INSERT INTO reservoir( reservoir_id, reservoir_name, city,district) VALUES ('$reservoir_id','$reservoir_name','$city','$district')";	
	$result = mysqli_query($link, $sql);
	echo $sql;
	change_record($link,0,1);
	die("<script> alert(\"已新增成功\"); location.href=\"insertreservoircondition.html\"; </script>"); 
	?> 
</body>
</html>
