<?php
    // include "../connect/connect.php";

    // $sql = "create table category(";
    // $sql .= "categoryID int(10) unsigned NOT NULL auto_increment,";
    // $sql .= "category varchar(100) NOT NULL,";
    // $sql .= "categoryTitle varchar(100) NOT NULL,";
    // $sql .= "categoryName varchar(100) NOT NULL,";
    // $sql .= "categoryMessages longtext NOT NULL,";
    // $sql .= "categoryMessages1 longtext DEFAULT NULL,";
    // $sql .= "categoryMessages2 longtext DEFAULT NULL,";
    // $sql .= "categoryMessages3 longtext DEFAULT NULL,";
    // $sql .= "categoryMessages4 longtext DEFAULT NULL,";
    // $sql .= "ImgSrc varchar(40) DEFAULT NULL,";
    // $sql .= "PRIMARY KEY(categoryID)";
    // $sql .= ") charset=utf8";

    // $connect -> query($sql);
?>

<?php
    include "../connect/connect.php";

    $sql = "INSERT INTO category(category,categoryTitle,categoryName,categoryMessages,categoryMessages1,categoryMessages2,categoryMessages3,categoryMessages4,ImgSrc) VALUES('eye','눈','당근','비타민 A는 주로 노랑, 주황, 붉은색 계열의 과일이나 채소에 주로 함유되어 있습니다.대표적으로 당근이 있는데 당근에는 비타민A뿐만 아니라 눈에 좋은 영양소인 알파/베타카로틴이라는 항산화 물질이 풍부하게 들어있습니다. 베타카로틴은 비타민 A와 같이 야맹증, 안구건조증, 각막 연화증 등의 안구 질환을 예방하는데 도움을 줍니다.','뇌 건강을 개선합니다: 고등어는 오메가-3 지방산인 DHA와 EPA가 풍부한 식품 중 하나입니다. 이러한 지방산은 뇌 기능을 개선하고 기억력을 향상시키는 데 도움이 됩니다.','심장 건강을 지원합니다: 고등어는 건강한 혈액 순환을 돕는 효능이 있습니다. 특히, 오메가-3 지방산은 심장 건강을 지원하고 고혈압, 혈전, 뇌졸중 및 심장병과 같은 질환의 위험을 줄이는 데 도움이 됩니다.','염증을 줄입니다: 고등어에 포함된 DHA와 EPA는 염증을 줄이는 데 도움이 됩니다. 염증은 신체의 여러 부분에서 발생할 수 있는 질병의 주요 원인 중 하나이므로, 고등어는 이러한 질환의 예방과 치료에도 도움이 될 수 있습니다.','뼈 건강을 지원합니다: 고등어는 칼슘과 비타민 D와 같은 뼈 건강에 필요한 영양소가 풍부합니다. 이러한 영양소는 고등어를 먹는 것이 뼈 건강을 지원하고 골다공증과 같은 질병의 위험을 줄이는 데 도움이 됩니다.','01-05.png')";

    $connect -> query($sql);
?>