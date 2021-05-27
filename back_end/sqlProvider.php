<?php 
    $GLOBALS['mysqli'] = NULL;

    function sendServerRequest($query){
        $result = mysqli_query($GLOBALS['mysqli'], $query) or die(mysqli_error($GLOBALS['mysqli']));
        // change die() to error function
        $num_row = mysqli_num_rows($result);
        return [$result,$num_row];
    }

    function setMySQL($mysqli){
        $GLOBALS['mysqli'] = $mysqli;
    }

?>