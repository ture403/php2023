<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page =1;
    }

    $searchKeyword = $_GET['searchKeyword'];
    $searchOption = $_GET['searchOption'];

    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));


    $sql = "SELECT b.boardID, b.boardTitle, b.boardContents, b.regTime, m.youName, b.boardView FROM board b JOIN mymember m ON(b.memberID = m.memberID) ";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardConetents, m.youName, b.boardView FROM board b JOIN mymember m ON(b.memberID = m.memberID) WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardConetents, m.youName, b.boardView FROM board b JOIN mymember m ON(b.memberID = m.memberID) WHERE b.boardConetents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
    // $sql = "SELECT b.boardID, b.boardTitle, b.boardConetents, m.youName, b.boardView FROM board b JOIN mymember m ON(b.memberID = m.memberID) WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";

    switch($searchOption){
        case "title":
            $sql .=  "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "content":
            $sql .=  "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
        case "name":
            $sql .= "WHERE m.youName LIKE '%{$searchKeyword}%' ORDER BY boardID DESC ";
            break;
    }

    $result = $connect -> query($sql);

    $totalCount = $result -> num_rows;

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>결과 게시판</title>

    <?php include "../include/head.php"?>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro_inner center">
                <div class="intro_images small">
                    <!-- <img src="assets/img/intro01.png" alt="소개이미지"> -->
                    <picture>
                        <source srcset="../assets/img/board01.png , ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                        <img src="../assets/img/board01.png" alt="소개이미지">
                    </picture>
                </div>
                <h2>결과 게시판</h2>
                <p class="intro_text">
                    웹디자이너, 웹퍼블리셔,프론트엔드 개발자를 위한 게시판입니다.
                    <br>관련된 문의사항은 여기서 확인하세요.<br>
                    총 <em><?=$totalCount?></em>건의 게시물이 등록되어 있습니다.
                </p>
        </div>

        <div class="board_inner">
        <div class="board_table">
                <table>
                    <colgroup>
                        <col style="width: 5%;">
                        <col>
                        <col style="width: 10%;">
                        <col style="width: 15%;">
                        <col style="width: 7%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>동록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql .= "LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect ->query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);

                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                echo "<td><a href='boardView.php?boardId={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y m d',$info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
                
            }
        }else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                        <!-- <tr>
                            <td>1</td>
                            <td><a href="boardView.html">게시판 제목 영역입니다. 아직 제목이 없어요!</a></td>
                            <td>전윤기</td>
                            <td>2023-04-24</td>
                            <td>100</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
            <div class="board_pages">
                    <ul>
<?php
    //총 페이지 갯수
    $boardTotalCount = ceil($totalCount/$viewNum);

    // 1 2 3 4 5 6 7 8 9 10 11
    $pageView = 4;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //처음페이지 초기화 
    if($startPage < 1) $startPage =1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

     //처음으로/이전
    if($page != 1 && $page <= $boardTotalCount ){
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>처음으로</a></li>";
        $prevPage = $page-1;
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>이전</a></li>";
    }
    //페이지 
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
    }

    //마지막으로 /다음
    if($page != $boardTotalCount && $page <= $boardTotalCount){
        $nextPage = $page+1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>다음</a></li>";
        echo "<li><a href='boardSearch.php?page={$boardTotalCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>마지막으로</a></li>";
    } 
?>
                </ul>
            </div>
        </div>

    <?php include "../include/footer.php" ?>
    <!-- footer -->
</body>
</html>


