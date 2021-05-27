<?php include('dealRequest.php'); ?>
<?php include('sqlProvider.php'); ?>

<?php
$GLOBALS['SERVER_VERSION'] = '0523_1b'; 

session_start();
$postdata = file_get_contents("php://input",'r');
$data = json_decode($postdata,true);

if ($data['type'] == NULL){ 
    error_and_logout('No command provided!');
    die('Dealing Unknown Request!');
}
$type = $data['type'];

// setup mysql ------------------------------------------------------
$mysqli = new mysqli('localhost', 'root', '534*#876aA', 'reservior_project');
//Output any connection error
if ($mysqli->connect_error) {
    error_and_logout('SQL Not Respond!');
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
setMySQL($mysqli);

// dealing command----------------------------------------------------
switch($type){
    case 'get_reservoir_data':
        apiGetReservoirData();
        break;
    case 'get_rainfall_data':
        $time = $data['time'];  //one_day week month
        apiGetRainfallData($time);
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
