<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $sql = "SELECT count(boardID) FROM board";
    $result = $connect -> query($sql);
    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <?php include "../include/head.php"?>
    <!-- link -->
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro_inner center bmStyle">
                <div class="intro_images small">
                    <!-- <img src="assets/img/intro01.png" alt="소개이미지"> -->
                    <picture>
                        <source srcset="../assets/img/board01.png , ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                        <img src="../assets/img/board01.png" alt="소개이미지">
                    </picture>
                </div>
                <h2>게시판</h2>
                <p class="intro_text">
                    웹디자이너, 웹퍼블리셔,프론트엔드 개발자를 위한 게시판입니다.
                    <br>관련된 문의사항은 여기서 확인하세요.
                </p>
        </div>

        <div class="board_inner">
            <div class="board_search">
                <div class="left">
                    * 총 <em><?=$boardTotalCount;?></em>건의 게시물이 등록되어 있습니다.
                </div>
                <div class="right">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력하세요" required>
                            <select name="searchOption" id="searchOption">
                                <option value="title">제목</option>
                                <option value="content">내용</option>
                                <option value="name">등록자</option>
                            </select>
                            <button type="submit" class="btnStyle3 white" required>검색</button>
                            <a href="boardWrite.php" class="btnStyle3">글쓰기</a>
                        </fieldset>
                    </form>
                </div>
            </div>
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
                        <!-- <tr>
                            <td>1</td>
                            <td><a href="boardView.html">게시판 제목 영역입니다. 아직 제목이 없어요!</a></td>
                            <td>전윤기</td>
                            <td>2023-04-24</td>
                            <td>100</td>
                        </tr> -->
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page =1;
    }

    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;


    $sql = "SELECT b.boardID , b.boardTitle, m.youName, b.regTime, b.boardView  FROM board b JOIN mymember m ON(b.memberID = m.memberID) ORDER BY boardID DESC LIMIT {$viewLimit},{$viewNum}";
    $result = $connect -> query($sql);
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
        } else {
            echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                    </tbody>
                </table>
            </div>
            <div class="board_pages">
                <ul>
<?php
    // 게시글 총 갯수
    // 몇 페이지가 나오는지?
    // $page = 1;

    //1~20 desc limit 0, 20 --> page1  (viewNUm*1) -viewNum
    //21~40 desc limit 20, 20 -->page2 (viewNUm*2) -
    //41~60 desc limit 40, 20 -->page3 (viewNUm*3)
    //61~80 desc limit 60, 20 -->page4 (viewNUm*4)

    // $sql = "SELECT count(boardID) FROM board";
    // $result = $connect -> query($sql);
    // $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    // $boardTotalCount = $boardTotalCount['count(boardID)'];
    $boardTotalCount = ceil($boardTotalCount/$viewNum);
    
    // 1 2 3 4 5 6 [7] 8 9 10 11 12 13
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    //처음페이지 초기화    //마지막페이지 초기화
    if($startPage < 1) $startPage =1;
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    //처음으로/이전
    if($page != 1 && $page <= $boardTotalCount ){
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
        $prevPage = $page-1;
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
    }
    //페이지 
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";
        echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }

    //마지막으로 /다음
    if($page != $boardTotalCount && $page <= $boardTotalCount){
        $nextPage = $page+1;
        echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
        echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
    } 
    //게시글이 없을때
?>
                    <!-- <li><a href="#">처음으로</a></li>
                    <li><a href="#">이전으로</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">다음</a></li>
                    <li><a href="#">마지막으로</a></li> -->
                </ul>
            </div>
            
        </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->


</body>
</html>