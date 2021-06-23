<?php include('dealRequest.php'); ?>
<?php include('sqlProvider.php'); ?>

<?php
$GLOBALS['SERVER_VERSION'] = '0523_1b'; 

session_start();
$postdata = file_get_contents("php://input",'r');
$data = json_decode($postdata,true);

// setup mysql ------------------------------------------------------
setMySQL();

if ($data['type'] == NULL){ 
    error_and_logout('No command provided!');
    die('Dealing Unknown Request!');
}
$type = $data['type'];

// dealing command----------------------------------------------------
switch($type){
    case 'get_reservoir_data':
        apiGetReservoirData();
        break;
    case 'get_reservoir_data_area':
        $area = $data['area'];
        apiGetReservoirDataByArea($area);
        break;
    case 'get_city':
        apiGetCity();
        break;
    case 'get_rainfall_data':
        $time = $data['time'];  //daily weekly monthly
        apiGetRainfallData($time);
        break;
    case 'get_rainfall_data_area':
        $time = $data['time'];  //daily weekly monthly
        $city = $data['city'];
        apiGetRainfallDataByArea($time,$city);
        break;
    case 'register':
        $postUSER = $data['ID'];
        $postPWD = $data['password'];
        apiRegister($postUSER,$postPWD);
        break;
    case 'login':
        $postUSER = $data['ID'];
        $postPWD = $data['password'];
        apiLogin($postUSER,$postPWD);
        break;
    default: //work
        error_and_logout('Not support command!');
        break;
}

function error_and_logout($message){
    $respond = array();
    $respond['sucess'] = 'false';
    $respond['error'] = $message;
    $respond['version'] = $GLOBALS['SERVER_VERSION'];
    echo json_encode($respond);
    exit();
}

?>
