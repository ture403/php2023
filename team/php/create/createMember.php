<?php
    include "../connect/connect.php";
    
    $sql = "create table Member(";
    $sql .= "MemberID int(10) unsigned auto_increment,";
    $sql .= "Name varchar(10) NOT NULL,";
    $sql .= "Nick varchar(10) NOT NULL,";
    $sql .= "ID varchar(10) NOT NULL,";
    $sql .= "Pass varchar(40) NOT NULL,";
    $sql .= "Email varchar(40) UNIQUE NOT NULL,";
    $sql .= "Phone varchar(40) NOT NULL,";
    $sql .= "Age varchar(40) NOT NULL,";
    $sql .= "Sex varchar(40) NOT NULL,";
    $sql .= "ImgSrc varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize varchar(40) DEFAULT NULL,";
    $sql .= "Regtime int(40) NOT NULL,";
    $sql .= "Modtime int(40) DEFAULT NULL,";
    $sql .= "PRIMARY KEY(MemberID)";
    $sql .= ") charset=utf8;";
    $result = $connect -> query($sql);
    if($result){
        echo "create tables complete";
    } else {
        echo "create tables false";
    }
?>