<?php
    include "../connect/connect.php";
    $type = $_POST['type'];
    $jsonResult = "bad";


    if( $type == "isEmailCheck"){
        $email = $_POST['youEmail'];
        $youEmail = $connect -> real_escape_string(trim($email));
        $sql = "SELECT adminEmail FROM adminMembers WHERE adminEmail = '{$youEmail}'";
    }
    if( $type == "isNickCheck"){
        $nick = $_POST['youNick'];
        $youNick = $connect -> real_escape_string(trim($nick));
        $sql = "SELECT adminNick FROM adminMembers WHERE adminNick = '{$youNick}'";
    }
    $result = $connect -> query($sql);
    if( $result -> num_rows == 0 ){
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>