<?php
$GLOBALS['SERVER_VERSION'] = '0421_1b'; 

session_start();
$postdata = file_get_contents("php://input",'r'); 
$data = json_decode($postdata,true);

$type = $data['type'];
if ($type == NULL){ 
    error_and_logout('No command provided!');
    die('Dealing Unknown Request!');
}

//Open a new connection to the MySQL server
$mysqli = new mysqli('localhost', 'root', '', 'table_name');
//Output any connection error
if ($mysqli->connect_error) {
    error_and_logout('SQL Not Respond!');
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$login_certification = '0000000000000000000';
if(array_key_exists('validation',$data)){
    $login_certification = $data['validation'];
    if(!verify_login_validation($mysqli,$login_certification)){
        return;
    }
}else{
    switch($type){
        // the following request are acceptable without validation-info
        case 'info':
            break;
        default:
            error_and_logout('No validation provided!');
            return;
    }
}

switch($type){  
    case 'info': //insert function code hear
        // dealing_info_request();
        break;    
    default: //work
        error_and_logout('Not support command!');
        break;
}


function verify_login_validation($mysqli,$login_certification){
    $validation_time = (int)substr($login_certification,0,10);
    if(abs(time()-$validation_time) > $GLOBALS['LOGIN_TIME_LIMIT']){ 
        error_and_logout('Reach login time limit!');
        return false;
    }
    return true;
}

function error_and_logout($message){
    $respond = array();
    $respond['type'] = 'logout';
    $respond['sucess'] = 'false';
    $respond['error'] = $message;
    $respond['version'] = $GLOBALS['SERVER_VERSION'];
    echo json_encode($respond);
    exit();
}

?>