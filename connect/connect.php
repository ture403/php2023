<?php
    
//$host = "localhost";
//$user = "ture403";
//$pw = "a!QAZ2wsx";
//$db = "ture403";
//$connect = new mysqli($host, $user, $pw, $db);
//$connect -> set_charset("utf-8");

//if(mysqli_connect_errno()){
//    echo "database Connect false";
//} else {
//    echo "database Connect ture";
//}
?>


<?php
    // phpinfo()
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "phpClass";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "database Connect false";
    } else {
        //echo "database Connect ture";
    }
?>