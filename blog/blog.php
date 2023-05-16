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
                    <div class="cards_inner col3 line3">
                        <div class="card">
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
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog2.png , ../assets/img/blog2@2x.jpg 2x , ../assets/img/blog2@3x.jpg 3x">
                                <img src="../assets/img/blog2.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>발성 연습을 해보세요</h3>
                                <p>발성 연습은 노래를 부르는 데 매우 중요합니다. 발성 연습을 통해 목소리를 효과적으로 다룰 수 있습니다. 발성 연습은 다양한 발음, 억양, 강세 등을 포함합니다. 이러한 발성 연습을 통해 목소리를 더욱 부드럽고 강력하게 만들 수 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog3.png , ../assets/img/blog3@2x.jpg 2x , ../assets/img/blog3@3x.jpg 3x">
                                <img src="../assets/img/blog3.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>노래를 들으면서 따라 부르세요</h3>
                                <p>다른 가수들의 노래를 들으면서 따라 부르는 것은 노래를 잘 부르기 위한 좋은 방법 중 하나입니다. 이를 통해 적절한 음높이와 감정을 살리는 방법을 익힐 수 있습니다. 이를 통해 자신만의 음악적 스타일을 찾을 수도 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog4.png , ../assets/img/blog4@2x.jpg 2x , ../assets/img/blog4@3x.jpg 3x">
                                <img src="../assets/img/blog4.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>전문적인 보컬 코칭을 받아보세요</h3>
                                <p>전문 보컬 코치의 도움을 받으면 노래를 잘 부르는 기술을 보다 빠르게 배울 수 있습니다. 보컬 코치는 개인적인 피드백과 조언을 통해 당신의 목소리를 개선할 수 있는 방법을 제공해 줄 수 있습니다. 또한 적절한 발성 기술과 호흡 기술을 가르쳐 줄 수 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                        <div class="card">
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
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog2.png , ../assets/img/blog2@2x.jpg 2x , ../assets/img/blog2@3x.jpg 3x">
                                <img src="../assets/img/blog2.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>발성 연습을 해보세요</h3>
                                <p>발성 연습은 노래를 부르는 데 매우 중요합니다. 발성 연습을 통해 목소리를 효과적으로 다룰 수 있습니다. 발성 연습은 다양한 발음, 억양, 강세 등을 포함합니다. 이러한 발성 연습을 통해 목소리를 더욱 부드럽고 강력하게 만들 수 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog3.png , ../assets/img/blog3@2x.jpg 2x , ../assets/img/blog3@3x.jpg 3x">
                                <img src="../assets/img/blog3.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>노래를 들으면서 따라 부르세요</h3>
                                <p>다른 가수들의 노래를 들으면서 따라 부르는 것은 노래를 잘 부르기 위한 좋은 방법 중 하나입니다. 이를 통해 적절한 음높이와 감정을 살리는 방법을 익힐 수 있습니다. 이를 통해 자신만의 음악적 스타일을 찾을 수도 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog4.png , ../assets/img/blog4@2x.jpg 2x , ../assets/img/blog4@3x.jpg 3x">
                                <img src="../assets/img/blog4.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>전문적인 보컬 코칭을 받아보세요</h3>
                                <p>전문 보컬 코치의 도움을 받으면 노래를 잘 부르는 기술을 보다 빠르게 배울 수 있습니다. 보컬 코치는 개인적인 피드백과 조언을 통해 당신의 목소리를 개선할 수 있는 방법을 제공해 줄 수 있습니다. 또한 적절한 발성 기술과 호흡 기술을 가르쳐 줄 수 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                        <div class="card">
                            <figure class="card_img">
                                <source srcset="../assets/img/blog4.png , ../assets/img/blog4@2x.jpg 2x , ../assets/img/blog4@3x.jpg 3x">
                                <img src="../assets/img/blog4.jpg" alt="소개이미지">
                            </figure>
                            <div class="card_titile">
                                <h3>전문적인 보컬 코칭을 받아보세요</h3>
                                <p>전문 보컬 코치의 도움을 받으면 노래를 잘 부르는 기술을 보다 빠르게 배울 수 있습니다. 보컬 코치는 개인적인 피드백과 조언을 통해 당신의 목소리를 개선할 수 있는 방법을 제공해 줄 수 있습니다. 또한 적절한 발성 기술과 호흡 기술을 가르쳐 줄 수 있습니다.</p>
                            </div>
                            <div class="card_info">
                                <span class="author">junyungi</span>
                                <span class="date">2023-05-11</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right mt100">
                <div class="blog_aside">
                    <div class="intro">
                        <picture class="img">
                            <source srcset="../assets/img/intro01.png , ../assets/img/intro01@2x.png 2x , ../assets/img/intro01@3x.png 3x">
                            <img src="../assets/img/intro01.png" alt="소개이미지">
                        </picture>
                        <p class="text">
                            어떤 일이라도 노력하고 즐기면 그 결과는 빛을 바란다고 생각합니다.
                            신입의 열정과 도전정신을 깊숙히 생각합니다.
                        </p>
                    </div>
                    <div class="cate">
                        <h4>카테고리</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 글</h4>
                    </div>
                    <div class="cate">
                        <h4>인기 글</h4>
                    </div>
                    <div class="cate">
                        <h4>최신 댓글</h4>
                    </div>
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