<?php

    $file_name=$_FILES["file"]["name"];
    $file_type=$_FILES["file"]["type"];
    $file_size=$_FILES["file"]["size"];
    if(isset($_POST['reservoir-submit'])){   //限制圖片型別格式，大小

        $filename='img/reservoir/'.$file_name;
        echo $filename;
    }
    else if(isset($_POST['postcode-submit'])){
       $filename='img/postcode/'.$file_name;
       echo $filename;
    }
    else {
    echo "fail";
    }
    if ((($file_type == "image/gif")
        || ($file_type == "image/jpeg")
        || ($file_type == "image/jpg")
        || ($file_type == "image/png"))
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
                echo $file_name . " already exists. ";
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
?>