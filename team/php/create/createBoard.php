<?php
    include "../connect/connect.php";

    $sql = "create table board(";
    $sql .= "boardID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "memberID int(10) NOT NULL,";
    $sql .= "boardName varchar(100) NOT NULL,";
    $sql .= "boardTitle varchar(100) NOT NULL,";
    $sql .= "boardIngre varchar(100) NOT NULL,";
    $sql .= "boardContents1 longtext NOT NULL,";
    $sql .= "boardContents2 longtext DEFAULT NULL,";
    $sql .= "boardContents3 longtext DEFAULT NULL,";
    $sql .= "boardContents4 longtext DEFAULT NULL,";
    $sql .= "boardContents5 longtext DEFAULT NULL,";
    $sql .= "ImgSrc varchar(40) DEFAULT NULL,";
    $sql .= "ImgSrc2 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSrc3 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSrc4 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSrc5 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize2 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize3 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize4 varchar(40) DEFAULT NULL,";
    $sql .= "ImgSize5 varchar(40) DEFAULT NULL,";
    $sql .= "boardView int(10) NOT NULL,";
    $sql .= "Modtime int(40) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY(boardID)";
    $sql .= ") charset=utf8";

    $connect -> query($sql);
?>