<?php
    $respond = array();
    $respond['sucess'] = 'true';

    function apiGetReservoirList($mysqli){
        $area_list = ['north','south','east','west'];
        for($i=0 ; $i<4 ; $i++){
            $query = "SELECT title FROM news WHERE city.area=".$area_list[$i];
            $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            $num_row = mysqli_num_rows($result);

            $respond['count_'.$area_list[$i]] = $num_row;            
            for($x = 0; $x < $num_row; $x++) {
                $row = mysqli_fetch_array($result);
                $respond[$area_list[$i].'_'.$x] = $row['title'];
            }
        }
        // structurelize data        
    
    echo json_encode($respond);
    }

    function apiGetReservoirData($mysqli,$range){

    }

    function apiGetRainfallData($mysqli,$time){

    }
?>