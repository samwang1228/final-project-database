<?php include('dealRequest.php'); ?>

<?php
$GLOBALS['SERVER_VERSION'] = '0523_1b'; 

session_start();
$postdata = file_get_contents("php://input",'r'); 
$data = json_decode($postdata,true);

$type = $data['type'];
if ($type == NULL){ 
    error_and_logout('No command provided!');
    die('Dealing Unknown Request!');
}

//Open a new connection to the MySQL server
// $mysqli = new mysqli('localhost', 'root', '', 'table_name');
// //Output any connection error
// if ($mysqli->connect_error) {
//     error_and_logout('SQL Not Respond!');
//     die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
// }

switch($type){  
    case 'get_reservoir_list':
        apiGetReservoirList($mysqli);
        break;
    case 'get_reservoir_data':
        $range = $data['range'];    //area:N/E/W/S all
        apiGetReservoirData($mysqli,$range);
        break;
    case 'get_rainfall_data':
        $time = $data['time'];  //one_day week month
        apiGetRainfallData($mysqli,$time);
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
