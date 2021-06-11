<?php
    $GLOBALS['RESPOND'] = array();
    $GLOBALS['RESPOND']['sucess'] = 'true';

    function apiGetReservoirData(){
        $GLOBALS['RESPOND']['data'] = array();

        $area_list = ['北','中','南','東'];
        for($i=0 ; $i<4 ; $i++){
            array_push($GLOBALS['RESPOND']['data'],['area_name'=>$area_list[$i],'reservoir'=>[]]);

            // $query = "SELECT reservoir_id, reservoir_name 
            // FROM reservoir,postcode_area 
            // WHERE reservoir.city=postcode_area.city AND reservoir.district=postcode_area.district AND postcode_area.area='".$area_list[$i]."'";
            
            $query = "SELECT date,reservoir.reservoir_id ,reservoir_name,effective_water_storage,effective_capacity 
            FROM reservoir_water_condition r1,reservoir,city_area 
            WHERE r1.reservoir_id=reservoir.reservoir_id 
            AND reservoir.city=city_area.city 
            AND city_area.area='".$area_list[$i]."' 
            AND date=(SELECT MAX(date) FROM reservoir_water_condition r2 
                WHERE r1.reservoir_id=r2.reservoir_id)";

            [$result,$num_row] = sendServerRequest($query);
            
            for($x = 0; $x < $num_row; $x++) {
                $row = mysqli_fetch_array($result);
                array_push($GLOBALS['RESPOND']['data'][$i]['reservoir'],[
                    'reservoir_name'=>$row['reservoir_name'],
                    'reservoir_id'=>$row['reservoir_id'],
                    'effective_water_storage'=>$row['effective_water_storage'],
                    'effective_capacity'=>$row['effective_capacity'],
                    ]
                );
                // array_push($GLOBALS['RESPOND']['data'][$i]['reservoir'],['reservoir_id'=>$row['reservoir_id']]);
            }
        }
        // echo($GLOBALS['RESPOND']);
        echo json_encode($GLOBALS['RESPOND']);

    }

    function apiGetRainfallData($time){

    }

    function apiLogin($postUSER,$postPWD){
        $usename="1234";
		$password="1234";
        if(strcmp($postUSER,$usename)!=0 || strcmp($postPWD,$password)){
            // login failed
            $GLOBALS['RESPOND']['sucess'] = 'false';
            echo json_encode($GLOBALS['RESPOND']);
            return;
		} //失敗時跳轉fail.php
        
		//login sucess
        echo json_encode($GLOBALS['RESPOND']);
    }
?>