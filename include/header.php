<header id="header bmStyle">
    <div class="header_inner container">
        <div class="left">
            <a href="../index.html" class="star"></a><span class="blind">메인으로</span>
        </div>
        <h1 class="logo">
            <a href="../main/main.php">Developer Blog</a>
        </h1>
        <div class="right">
            <?php if(isset($_SESSION['memberID'])){ ?>
                    <ul>
                        <li><a href="../mypage/mypage.php"><?=$_SESSION['youName']?>님❤️</a></li>
                        <li><a href="../login/logout.php">로그아웃</a></li>
                    </ul>
                    <?php } else { ?>
                    <ul>
                        <li><a href="../join/join.php">회원가입</a></li>
                    </ul>
                <?php } ?>


            <!-- 로그인이 안된 경우 -->
            

            <!-- 로그인 한 경우 -->
            

        </div>
        <nav class="nav_inner">
            <ul>
                <li><a href="../join/join.php">회원가입</a></li>
                <li><a href="../login/login.php">로그인</a></li>
                <li><a href="../board/board.php">게시판</a></li>
                <li><a href="../blog/blog.php">블로그</a></li>
            </ul>
        </nav>
    </div>
    
</header>
<!-- header -->