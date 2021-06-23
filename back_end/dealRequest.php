<?php
    $GLOBALS['RESPOND'] = array();
    $GLOBALS['RESPOND']['sucess'] = 'true';

    function apiGetReservoirData(){
        $GLOBALS['RESPOND']['data'] = array();

        $area_list = ['北','中','南','東'];
        for($i=0 ; $i<count($area_list) ; $i++){
            array_push($GLOBALS['RESPOND']['data'],['area_name'=>$area_list[$i],'reservoir'=>[]]);

            $query = "SELECT date,reservoir.reservoir_id ,reservoir_name,effective_water_storage,effective_capacity,outflow  
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
                    'outflow'=>$row['outflow'],
                    ]
                );
            }
        }
        echo json_encode($GLOBALS['RESPOND']);

    }

    function apiGetReservoirDataByArea($area){
        $GLOBALS['RESPOND']['data'] = array();

        array_push($GLOBALS['RESPOND']['data'],['area_name'=>$area,'reservoir'=>[]]);

        $query = "SELECT date,reservoir.reservoir_id ,reservoir_name,effective_water_storage,effective_capacity,outflow  
        FROM reservoir_water_condition r1,reservoir,city_area 
        WHERE r1.reservoir_id=reservoir.reservoir_id 
        AND reservoir.city=city_area.city 
        AND city_area.area='".$area."' 
        AND date=(SELECT MAX(date) FROM reservoir_water_condition r2 
            WHERE r1.reservoir_id=r2.reservoir_id)";

        [$result,$num_row] = sendServerRequest($query);
        
        for($x = 0; $x < $num_row; $x++) {
            $row = mysqli_fetch_array($result);
            array_push($GLOBALS['RESPOND']['data'][0]['reservoir'],[
                'reservoir_name'=>$row['reservoir_name'],
                'reservoir_id'=>$row['reservoir_id'],
                'effective_water_storage'=>$row['effective_water_storage'],
                'effective_capacity'=>$row['effective_capacity'],
                'outflow'=>$row['outflow'],
                ]
            );
        }
        
        echo json_encode($GLOBALS['RESPOND']);

    }

    function apiGetCity(){
        $GLOBALS['RESPOND']['data'] = array();
        $city_list = [];
        $query_city = "SELECT city FROM city_area";
        [$result_city,$num_row_city] = sendServerRequest($query_city);
        for($x = 0; $x < $num_row_city; $x++) {
            $row = mysqli_fetch_array($result_city);
            array_push($city_list,['city_name'=>$row['city'],'rain_station'=>[]]);
        }
        $GLOBALS['RESPOND']['data']=$city_list;
        echo json_encode($GLOBALS['RESPOND']);
    }

    function apiGetRainfallData($time){
        $GLOBALS['RESPOND']['data'] = array();
        switch($time){
            case 'weekly':
                $date_str = date('Y-m-d', strtotime('-7 days')).' 00:00:00';
                break;
            default:
                $date_str = date('Y-m-d').' 00:00:00';
        }
        

        //get all city in taiwan
        $city_list = [];
        $query_city = "SELECT city FROM city_area";
        [$result_city,$num_row_city] = sendServerRequest($query_city);
        for($x = 0; $x < $num_row_city; $x++) {
            $row = mysqli_fetch_array($result_city);
            array_push($city_list,$row['city']);
        }

        for($i=0 ; $i<count($city_list) ; $i++){
            array_push($GLOBALS['RESPOND']['data'],['city_name'=>$city_list[$i],'rain_station'=>[]]);
            
            // get all rain_station in this city
            $query_rainstation = "SELECT name FROM rain_station WHERE city='".$city_list[$i]."'";
            [$result_rainstation,$num_row_rainstation] = sendServerRequest($query_rainstation);
            for($x = 0; $x < $num_row_rainstation; $x++) {
                $row_rain_station = mysqli_fetch_array($result_rainstation);
                array_push($GLOBALS['RESPOND']['data'][$i]['rain_station'],[
                    'rain_station_name'=>$row_rain_station['name'],
                    'rainfall'=>[],
                    ]
                );

                // get rainfall data by date of this rain_station
                $query_rainfall = "SELECT date,today_rainfall 
                                   FROM rainfall,rain_station 
                                   WHERE rain_station.number=rainfall.number 
                                   AND city='".$city_list[$i]."' 
                                   AND name='".$row_rain_station['name']."' 
                                   AND date>='".$date_str."'
                "; 
                // AND date>='2021-06-10 00:00:00'
                [$result_rainfall,$num_row_rainfall] = sendServerRequest($query_rainfall); 
                for($y = 0; $y < $num_row_rainfall; $y++) {
                    $row_rainfall = mysqli_fetch_array($result_rainfall);
                    array_push($GLOBALS['RESPOND']['data'][$i]['rain_station'][$x]['rainfall'],[
                        'date'=>$row_rainfall['date'],
                        'today_rainfall'=>$row_rainfall['today_rainfall'],
                        ]
                    );
                }

            }
        }
        echo json_encode($GLOBALS['RESPOND']);

    }

    function apiGetRainfallDataByArea($time,$city_list){
        $GLOBALS['RESPOND']['data'] = array();
        switch($time){
            case 'weekly':
                $date_str = date('Y-m-d', strtotime('-7 days')).' 00:00:00';
                break;
            default:
                $date_str = date('Y-m-d').' 00:00:00';
        }
        
        for($i=0 ; $i<count($city_list) ; $i++){
            array_push($GLOBALS['RESPOND']['data'],['city_name'=>$city_list[$i],'rain_station'=>[]]);
            
            // get all rain_station in this city
            $query_rainstation = "SELECT name,rain_station.number FROM rain_station WHERE city='".$city_list[$i]."'";
            [$result_rainstation,$num_row_rainstation] = sendServerRequest($query_rainstation);
            for($x = 0; $x < $num_row_rainstation; $x++) {
                $row_rain_station = mysqli_fetch_array($result_rainstation);
                array_push($GLOBALS['RESPOND']['data'][$i]['rain_station'],[
                    'rain_station_name'=>$row_rain_station['name'],
                    'rainfall'=>[],
                    ]
                );

                // get rainfall data by date of this rain_station
                $query_rainfall = "SELECT date,today_rainfall 
                                   FROM rainfall,rain_station 
                                   WHERE rain_station.number=rainfall.number 
                                   AND city='".$city_list[$i]."' 
                                   AND rainfall.number='".$row_rain_station['number']."' 
                                   AND date>='".$date_str."'
                "; 
                // AND date>='2021-06-10 00:00:00'
                [$result_rainfall,$num_row_rainfall] = sendServerRequest($query_rainfall); 
                for($y = 0; $y < $num_row_rainfall; $y++) {
                    $row_rainfall = mysqli_fetch_array($result_rainfall);
                    array_push($GLOBALS['RESPOND']['data'][$i]['rain_station'][$x]['rainfall'],[
                        'date'=>$row_rainfall['date'],
                        'today_rainfall'=>$row_rainfall['today_rainfall'],
                        ]
                    );
                }

            }
        }
        echo json_encode($GLOBALS['RESPOND']);

    }

    function apiLogin($postUSER,$postPWD){
        $query_user = "SELECT password FROM user WHERE userid='".$postUSER."'";
        [$result_user,$num_row_user] = sendServerRequest($query_user);
        $row_user = mysqli_fetch_array($result_user);
        if($num_row_user!=1 || strcmp($postPWD,$row_user['password'])){
            // login failed
            $GLOBALS['RESPOND']['sucess'] = 'false';
            echo json_encode($GLOBALS['RESPOND']);
            return;
		}
        
		//login sucess
        echo json_encode($GLOBALS['RESPOND']);
    }

    function apiRegister($postUSER,$postPWD){
        $query_user = "INSERT INTO user (userid,password) VALUE ('".$postUSER."','".$postPWD."')";
        $result = sendServerInsertRequest($query_user);        
        
		//register sucess
        echo json_encode($GLOBALS['RESPOND']);
    }

?>