<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>

    <?php include "../include/head.php"?>
    <!-- link -->
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->
    <main id="main" class="container">
        <div class="blog_search bmStyle">
            <h2>개발자 블로그 입니다.</h2>
            <p>Lorem, ipsum dolor.</p>
            <div class="search ">
                <form action="#" name="#" method="post">
                    <legend class="blind">블로그 검색</legend>
                    <input type="search" name="searchKeyword" aria-label="검색" placeholder="검색어를 입력하세요!" class="inputStyle2">
                    <button type="submit" class="btnStyle4 ml20" >검색하기</button>
                    <?php if(isset($_SESSION['memberID'])){ ?>
                        <div class="mt20">
                            <a href="blogWrite.php" class="btnStyle4 white">글쓰기</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="blog_inner">
            <div class="left">
                <div class="blog_wrap">
                    <h2>All post</h2>
                    <div class="cards_inner col4 line3">
                        <!-- <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog1.png , ../assets/img/blog1@2x.jpg 2x , ../assets/img/blog1@3x.jpg 3x">
                                <img src="../assets/img/blog1.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>호흡 연습을 해보세요</h3>
                                <p>노래를 부르는 동안 적절한 호흡은 매우 중요합니다. 제대로된 호흡은 가장 좋은 음악을 만드는 기술 중 하나입니다. 호흡 연습을 통해 효과적인 호흡 기술을 습득할 수 있습니다. 이를 위해서는 복식호흡, 흉부호흡 등 다양한 호흡 기술을 익히고 이를 노래에 적용해 보세요.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div> -->
<?php
    $sql = "SELECT * FROM blog WHERE blogDelete = 0 ORDER BY blogID DESC";
    $result = $connect -> query($sql);
    
    foreach($result as $blog){?>
        <div class="card">
            <figure class="card_img">
                <a href="blogView.php?blogID=<?=$blog['blogID']?>">
                <img src="../assets/blog/<?=$blog['blogImgFile'] ?>" alt="<?=$blog['blogTitle'] ?>">
                </a>
            </figure>
            <div class="card_titile">
                <h3><?=$blog['blogTitle'] ?></h3>
                <p><?=$blog['blogContents'] ?></p>
            </div>
            <div class="card_info">
                <a href="#" class="more">더보기</a>
            </div>
        </div>
    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="right mt100" >
                <div class="blog_aside">
                    <?php include "../include/blogTitle.php"?>

                    <?php include "../include/blogCate.php"?>

                    <?php include "../include/blogLatest.php"?>

                    <?php include "../include/blogPopular.php"?>

                    <?php include "../include/blogComment.php"?>
                </div>
            </div>
        </div>
        <!-- 
            <div class="sliders_inner"></div> 각 페이지 소개 배너
            <div class="join_inner"></div> 회원가입 페이지
            <div class="login_inner"></div> 로그인 페이지
            <div class="board_inner"></div> 계시판 페이지
            <div class="blog_inner"></div> 블로그 메인


            <div class="joinAdmin1_inner"></div> 관리자 회원가입 이용약관
            <div class="joinAdmin2_inner"></div> 관리자 회원가입 페이지
            <div class="joinAdmin3_inner"></div> 관리자 회원가입 완료

        <div class="banners_inner"></div>
        <div class="cards_inner"></div>
        <div class="images_inner"></div>
        <div class="ads_inner"></div>
        <div class="texts_inner"></div>
        <div class="login_inner"></div>
        -->
    </main>

    <?php include "../include/footer.php" ?>
    <!-- footer -->


</body>
</html>