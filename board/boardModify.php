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
        <div class="intro_inner center bmStyle">
            <div class="intro_images small">
                <!-- <img src="assets/img/intro01.png" alt="소개이미지"> -->
                <picture>
                    <source srcset="../assets/img/board01.png , ../assets/img/board01@2x.png 2x, ../assets/img/board01@3x.png 3x">
                    <img src="../assets/img/board01.png" alt="소개이미지">
                </picture>
            </div>
            <h2>게시글 수정하기</h2>
            <p class="intro_text">
                웹디자이너, 웹퍼블리셔,프론트엔드 개발자를 위한 게시판입니다.
                <br>관련된 문의사항은 여기서 확인하세요.
            </p>
        </div>
        <!-- intro_inner -->

        <div class="board_inner">
            <div class="board_write">
                <form action="boardModifySave.php" name="#" method="post">
                    <fieldset>
                        <legend class="blind">게시글 수정하기</legend>

<?php
    $userID = $_SESSION['memberID'];
    $boardID = $_GET['boardID'];
    $sql = "SELECT boardID, boardTitle, boardContents, memberID  FROM board WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        if($info['memberID'] == $userID){
            echo "<div style='display:none'><label for='boardID'>번호</label><input type='text' id='boardID' name='boardID' class='inputStyle' value='".$info['boardID']."'></div>";
            echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value='".$info['boardTitle']."'></div>";
            echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";
            echo "<div class='mt50'><label for='boardPass'>비밀번호</label><input type='password' id='boardPass' name='boardPass' class='inputStyle' autocomplete='off' requied placeholder='글을 수정할려면 로그인 비밀번호를 입력하셔야 합니다.'></div>";
            echo "<button type='submit' class='btnStyle3' style='margin-right: 10px;'>수정하기</button>";
        } else {
            echo "<span style= font-size:20px; color:red;>권한이 없습니다.<span>";
        }
    }
?>
                        <!-- <div>
                            <label for="boardTitle">제목</label>
                            <input type="text" id="boardTitle" name="boardTitle" class="inputStyle">
                        </div>
                        <div>
                            <label for="boardContents">내용</label>
                            <textarea name="" id="boardContents" rows="20" class="inputStyle"></textarea>
                        </div> -->
                        <button type="submit" class="btnStyle3" style="margin-right:5px;">목록보기</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- join_inner -->

    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
</body>
</html>