<?php 
    $GLOBALS['mysqli'] = NULL;

    function sendServerRequest($query){
        $result = mysqli_query($GLOBALS['mysqli'], $query);
        if(!$result){
            //error happened
            $GLOBALS['RESPOND']['sucess'] = 'false';
            echo json_encode($GLOBALS['RESPOND']);

            die(mysqli_error($GLOBALS['mysqli']));
        }
        $num_row = mysqli_num_rows($result);
        return [$result,$num_row];
    }

    function sendServerInsertRequest($query){
        $result = mysqli_query($GLOBALS['mysqli'], $query);
        if(!$result){
            //error happened
            $GLOBALS['RESPOND']['sucess'] = 'false';
            $GLOBALS['RESPOND']['error_msg'] = mysqli_error($GLOBALS['mysqli']);
            echo json_encode($GLOBALS['RESPOND']);
            die();
        }
        return $result;
    }

    function setMySQL(){        
        // 'ec2-3-92-133-135.compute-1.amazonaws.com'
          $mysqli = new mysqli('ec2-3-92-133-135.compute-1.amazonaws.com', 'databaseaws', 'databaseaws', 'reservoir_project');
        mysqli_query($mysqli,("SET NAMES UTF8"));
        //Output any connection error
        if ($mysqli->connect_error) {
            error_and_logout('SQL Not Respond!');
            die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }
        $GLOBALS['mysqli'] = $mysqli;
    }

?>