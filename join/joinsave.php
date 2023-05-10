<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료 페이지</title>

    <?php include "../include/head.php"?>
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro_inner center bmStyle">
            <div class="intro_images">
                <!-- <img src="assets/img/intro01.png" alt="소개이미지"> -->
                <picture>
                    <source srcset="../assets/img/joinEnd01.png , ../assets/img/joinEnd@2x.png 2x, ../assets/img/joinEnd@3x.png 3x">
                    <img src="../assets/img/joinEnd01.png" alt="소개이미지">
                </picture>
            </div>


                <?php
                    include "../connect/connect.php";
                    $youEmail = $_POST['youEmail'];
                    $youName = $_POST['youName'];
                    $youPass = $_POST['youPass'];
                    $youPassC = $_POST['youPassC'];
                    $youPhone = $_POST['youPhone'];
                    $regTime = time();

                    //echo $youEmail, $youName, $youPass, $youPhone;
                    
                    // $sql = "INSERT INTO mymember(youEmail,youName,youPass,youPhone,regTime) VALUES ('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";

                    // $connect -> query($sql);

                    
                    //메시지 출력
                    function msg($alert){
                        echo "<p class='intro_text'>$alert</p>";
                    }
                    //유효성 검사
                    // 이메일 유효성 검사
                    $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);

                    if($check_mail == false){
                        msg("이메일이 잘못되었습니다. 다시 한번 확인해주세요.");
                        exit;
                    }
                    // // 이름 유효성 검사
                    $check_name = preg_match("/^[가-힣]{9,15}$/",$youName);

                    if($check_name == false){
                        msg("이름은 한글만 가능합니다. 또는 3-5글자만 가능합니다.");
                        exit;
                    }

                    // //비밀번호 유효성 검사
                    if($youPass !== $youPassC){
                        msg("비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요!");
                        exit;
                    }

                    // $youPass = sha1($youPass);

                    //휴대폰 번호 유효성 검사
                    $check_number = preg_match("/^010|011|016|017|018|019-[0-9]{3,4}-[0-9]{4}$/",$youPhone);

                    if($check_number == false){
                        msg("번호가 정확하지 않습니다. 올바른 번호(000-0000-0000) 형식으로 작성해주세요!");
                        exit;
                    }

                    //이메일 중복 검사
                    $isEmailCheck = false;
                    
                    $sql = "SELECT youEmail FROM mymember WHERE youEmail = '$youEmail'";
                    $result = $connect -> query($sql);
                    
                    if($result){
                        $count = $result -> num_rows;

                        if($count == 0){
                            $isEmailCheck = true;
                        } else {
                            msg("이미 회원가입이 되어 있습니다. 로그인 해주세요!");
                            exit;
                        }
                    }else {
                        msg("에러발생1 : 관리자 일을 안함 조치점");
                    }

                    //핸드폰 중복 검사
                    $isPhoneCheck = false;
                    
                    $sql = "SELECT youEmail FROM mymember WHERE youEmail = '$youPhone'";
                    $result = $connect -> query($sql);
                    
                    if($result){
                        $count = $result -> num_rows;

                        if($count == 0){
                            $isPhoneCheck = true;
                        } else {
                            msg("이미 회원가입이 되어 있습니다. 로그인 해주세요!");
                            exit;
                        } 
                    } else {
                        msg("에러발생1 : 관리자 일을 안함 조치점");
                    }
                    //회원가입
                    if($isEmailCheck == true && $$isPhoneCheck = true){
                        // 데이터 입력하기
                        $sql = "INSERT INTO mymember(youEmail,youName,youPass,youPhone,regTime) VALUES ('$youEmail', '$youName', '$youPass', '$youPhone', '$regTime')";
                        $connect -> query($sql);

                        if($result){
                            msg("회원가입 축하!! <br><div class='intro_btn'><a href='../login/login.php'>로그인</a></div> ");
                            exit;
                        } else {
                            msg("관리자 또 일 암함");
                            exit;
                        }
                    } else{
                        msg("이미 회원가입 되어있음. 로그인 ㄱㄱ");
                        exit;
                    }
                ?>

            <div class="intro_btn"><a href="#">로그인</a></div>
        </div>
        <!-- intro_inner -->


    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->

</body>
</html>