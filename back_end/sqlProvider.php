<?php 
    $GLOBALS['mysqli'] = NULL;

    function sendServerRequest($query){
        $result = mysqli_query($GLOBALS['mysqli'], $query) or die(mysqli_error($GLOBALS['mysqli']));
        // change die() to error function
        $num_row = mysqli_num_rows($result);
        return [$result,$num_row];
    }

    function setMySQL(){        
        $mysqli = new mysqli('localhost', 'root', 'password', 'reservoir_project');
        mysqli_query($mysqli,("SET NAMES UTF8"));
        //Output any connection error
        if ($mysqli->connect_error) {
            error_and_logout('SQL Not Respond!');
            die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }
        $GLOBALS['mysqli'] = $mysqli;
    }

?>