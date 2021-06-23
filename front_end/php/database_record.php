<?php
    include_once('connect.php');

    function change_record($link,$table,$amount,$type){
        // table:
        // reservoir:0 reservoir_water_condiction:1
        // postcode_area:2 city_area:3
        // rainfall:4 rain_station:5
        // agriculture_water:6 
        // living_water:7
        // industrial_water:8
        
        $date_str = date('Y-m-d').' 00:00:00';
        $updatesql="INSERT INTO history(date,userid,affect_table,affect_rows,type) 
                    VALUE('".$date_str."','".$_COOKIE["user"]."','".$table."','".$amount."','".$type."')";
        if(mysqli_query($link,$updatesql)){
            echo "紀錄資料更新成功!.<br />";
        }else{
            echo "紀錄資料更新失敗!.<br />";
        }
    }

?>