<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <title>요리방 보기</title>

</head>
<body>
    <?php
        include "../include/header.php";
    ?>
    <main id="main" class="aggro">
        <div class="boardV__inner">
            <div class="container">
                <h1>맛있는 우리네 레시피</h1>
                <div class="boardV__wrap">
                    <h2>당근스프 레시피 공유합니다 !</h2>
                    <div class="boardV__info">
                        <span>작성자 아이디</span>
                        <span>23.05.09 18:02</span>
                        <span>조회수 1352</span>
                    </div>
                    <h3>음식종류</h3>
                    <div class="board__contents">
                        <h4>당근스프</h4>
                    </div>
                    <h3>재료</h3>
                    <div class="board__contents">
                        <span>당근 2개, 양파 1개, 감자 1개, 채소스톡 또는 치킨스톡 3컵, 생크림 1/2컵, 올리브오일 1큰술, 소금약간, 후추 약간</span>
                    </div>
                    <div class="board__contents">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="../../assets/img/boardview01.png" alt="업로드이미지">
                                    <span>당근, 양파, 감자는 깨끗이 씻어서 껍질을 벗긴 후 1cm 크기로 송송 썰어줍니다.<br>
                                        냄비에 올리브오일을 두르고 당근, 양파, 감자를 넣고 볶아줍니다.<br>
                                        채소가 약간 노릇해질 때까지 볶아주다가 채소스톡 또는 치킨스톡을 넣고 끓입니다.<br>
                                        채소가 완전히 익을 때까지 중불에서 끓입니다.<br>
                                        끓인 스프에 소금과 후추로 간을 맞춘 후 블렌더를 이용해 곱게 갈아줍니다.<br>
                                        갈아낸 스프에 생크림을 넣고 한번 더 끓입니다.
                                    </span>
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/img/boardview01.png" alt="업로드이미지">
                                    <span>당근, 양파, 감자는 깨끗이 씻어서 껍질을 벗긴 후 1cm 크기로 송송 썰어줍니다.<br>
                                        냄비에 올리브오일을 두르고 당근, 양파, 감자를 넣고 볶아줍니다.<br>
                                        채소가 약간 노릇해질 때까지 볶아주다가 채소스톡 또는 치킨스톡을 넣고 끓입니다.<br>
                                        채소가 완전히 익을 때까지 중불에서 끓입니다.<br>
                                        끓인 스프에 소금과 후추로 간을 맞춘 후 블렌더를 이용해 곱게 갈아줍니다.<br>
                                        갈아낸 스프에 생크림을 넣고 한번 더 끓입니다.
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/img/boardview01.png" alt="업로드이미지">
                                    <span>당근, 양파, 감자는 깨끗이 씻어서 껍질을 벗긴 후 1cm 크기로 송송 썰어줍니다.<br>
                                        냄비에 올리브오일을 두르고 당근, 양파, 감자를 넣고 볶아줍니다.<br>
                                        채소가 약간 노릇해질 때까지 볶아주다가 채소스톡 또는 치킨스톡을 넣고 끓입니다.<br>
                                        채소가 완전히 익을 때까지 중불에서 끓입니다.<br>
                                        끓인 스프에 소금과 후추로 간을 맞춘 후 블렌더를 이용해 곱게 갈아줍니다.<br>
                                        갈아낸 스프에 생크림을 넣고 한번 더 끓입니다.
                                </div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="board_btn mb100">
                    <a href="#" class="btnStyle4">삭제</a>
                    <a href="#" class="btnStyle4">수정</a>
                    <a href="board.html" class="btnStyle4">목록</a>
                </div>
            </div>
        </div>
    </main>
    <?php
        include "../include/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>