<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessioncheck.php";
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
        <div class="intro_inner center">
            <div class="intro_images small">
                <!-- <img src="assets/img/intro01.png" alt="소개이미지"> -->
                <picture>
                    <source srcset="../assets/img/board01.png , ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                    <img src="../assets/img/board01.png" alt="소개이미지">
                </picture>
            </div>
            <h2>게시글 보기</h2>
            <p class="intro_text">
                웹디자이너, 웹퍼블리셔,프론트엔드 개발자를 위한 게시판입니다.
                <br>관련된 문의사항은 여기서 확인하세요.
            </p>
        </div>
        <!-- intro_inner -->

        <div class="board_inner">
            <div class="board_view">
                <table>
                    <colgroup>
                        <col  style="width: 20%;">
                        <col  style="width: 80%;">
                    </colgroup>
                    <tbody>
                       <!--  <tr>
                            <th>제목</th>
                            <td>게시판 제목입니다.</td>
                        </tr>
                        <tr>
                            <th>등록자</th>
                            <td>홍길동</td>
                        </tr>
                        <tr>
                            <th>등록일</th>
                            <td>2023-04-24</td>
                        </tr>
                        <tr>
                            <th>조회수</th>
                            <td>99</td>
                        </tr>
                        <tr>
                            <th>내용</th>
                            <td>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam non debitis sed esse dolor eum voluptates odit nihil! Ipsum atque similique sed. Similique placeat beatae omnis asperiores alias molestias vero ab aperiam itaque a reprehenderit,  harum quasi mollitia tempore rerum facilis minima? Magni enim, voluptatibus itaque delectus pariatur id consectetur.
                            </td>
                        </tr> -->
<?php

    $boardID = $_GET['boardId'];

    //보드뷰 + 1 (조회수)
    $sql = "UPDATE board SET boardView = boardView + 1 WHERE boardID = {$boardID}";
    $connect -> query($sql);


    if (isset($_GET['boardId'])) {

    $sql = "SELECT b.boardContents, b.boardTitle, m.youName, b.regTime, b.boardView FROM board b JOIN mymember m ON(m.memberID = b.memberID) WHERE b.boardID = {$boardID}";

    $result = $connect -> query($sql);

    if ($result) {
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        echo "<tr>";
        echo "<th>제목</th>";
        echo "<td>".$info['boardTitle']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>등록자</th>";
        echo "<td>".$info['youName']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>등록일</th>";
        echo "<td>".date('Y-m-d',$info['regTime'])."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>조회수</th>";
        echo "<td>".$info['boardView']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>내용</th>";
        echo "<td>".$info['boardContents']."</td>";
        echo "</tr>";
    } else {
        echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
}

?>
                    </tbody>
                </table>
            </div>
            <div class="board_btn mb100">
                <?php if (isset($_GET['boardId'])): ?>
                    <a href="boardModify.php?boardID=<?= $_GET['boardId'] ?>" class="btnStyle3">수정하기</a>
                    <a href="boardRemove.php?boardID=<?= $_GET['boardId'] ?>" class="btnStyle3" onclick="if(!confirm('정말 삭제하시겠습니까?', '')) { return false; }">삭제하기</a>
                <?php endif; ?>
                <a href="board.php" class="btnStyle3">목록보기</a>
            </div>
        </div>
        <!-- join_inner -->

    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
</body>
</html>

