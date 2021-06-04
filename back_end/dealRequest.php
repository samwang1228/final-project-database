<?php
    $GLOBALS['RESPOND'] = array();
    $GLOBALS['RESPOND']['sucess'] = 'true';

    function apiGetReservoirData(){
        $GLOBALS['RESPOND']['data'] = array();

        $area_list = ['北','中','南','東'];
        for($i=0 ; $i<4 ; $i++){
            array_push($GLOBALS['RESPOND']['data'],['area_name'=>$area_list[$i],'reservoir'=>[]]);

            $query = "SELECT reservoir_id, reservoir_name 
            FROM reservoir,postcode_area 
            WHERE reservoir.city=postcode_area.city AND reservoir.district=postcode_area.district AND postcode_area.area='".$area_list[$i]."'";
            [$result,$num_row] = sendServerRequest($query);
            
            for($x = 0; $x < $num_row; $x++) {
                $row = mysqli_fetch_array($result);
                array_push($GLOBALS['RESPOND']['data'][$i]['reservoir'],[
                    'reservoir_name'=>$row['reservoir_name'],
                    'reservoir_id'=>$row['reservoir_id']
                    ]
                );
                // array_push($GLOBALS['RESPOND']['data'][$i]['reservoir'],['reservoir_id'=>$row['reservoir_id']]);
            }
        }
        // echo($GLOBALS['RESPOND']);
        echo json_encode($GLOBALS['RESPOND']);

    }

    function apiGetRainfallData($time){
        $GLOBALS['RESPOND']['data'] = array();

        $area_list = ['北','中','南','東'];
        for($i=0 ; $i<4 ; $i++){
            array_push($GLOBALS['RESPOND']['data'],['area_name'=>$area_list[$i],'reservoir'=>[]]);

            $query = "SELECT reservoir_id, reservoir_name 
            FROM reservoir,postcode_area 
            WHERE reservoir.city=postcode_area.city AND reservoir.district=postcode_area.district AND postcode_area.area='".$area_list[$i]."'";
            [$result,$num_row] = sendServerRequest($query);
            
            for($x = 0; $x < $num_row; $x++) {
                $row = mysqli_fetch_array($result);
                array_push($GLOBALS['RESPOND']['data'][$i]['reservoir'],[
                    'reservoir_name'=>$row['reservoir_name'],
                    'reservoir_id'=>$row['reservoir_id']
                    ]
                );
                // array_push($GLOBALS['RESPOND']['data'][$i]['reservoir'],['reservoir_id'=>$row['reservoir_id']]);
            }
        }
        // echo($GLOBALS['RESPOND']);
        echo json_encode($GLOBALS['RESPOND']);
    }

    function apiLogin($postUSER,$postPWD){
        $usename="1234";
		$password="1234";

		if(strcmp($postUSER,$usename)!=0 || strcmp($postPWD,$password)!=0){
			// die("<script>  location.href=\"fail.php\"; </script>"); 
            $GLOBALS['RESPOND']['sucess'] = 'false';
            echo json_encode($GLOBALS['RESPOND']);	
            return;
		}

		$_SESSION['usename']=$postUSER;
		$_SESSION['password']=$postPWD;
		// header ('Location: insertreservoir.html');	
        echo json_encode($GLOBALS['RESPOND']);	
    }
    
?>