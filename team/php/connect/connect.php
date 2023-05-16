<?php
$host = "localhost";
$user = "root";
$pw = "root";
$db = "teamclass";
$connect = new mysqli($host, $user, $pw, $db);
$connect -> set_charset("utf-8");

// if(mysqli_connect_errno()){
//     echo "database Connect false";
// } else {
//     echo "database Connect ture";
// }
?>