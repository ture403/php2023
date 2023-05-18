<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['category'])){
        $category = $_GET['category'];
    } else {
        Header('Location: blog.php');
    }

    $categorySql = "SELECT * FROM blog WHERE blogDelete = 0 AND blogCategory= '$category' ORDER BY blogID  DESC";
    $categoryResult = $connect ->query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;

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
            <?php
            if($categoryCount == 0){?>
                <h2>게시글이 없습니다.</h2>
            <?php } else {?>
                <h2><?=$categoryInfo['blogCategory']?></h2>
                <p><?=$categoryInfo['blogCategory']?>와 관련된 글이<?=$categoryCount?>개 있습니다.</p>
            <?php } ?>
            <!-- <div class="search ">
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
            </div> -->
        </div>
        <!-- blog_title -->
        <div class="blog_inner">
            <div class="left mt70">
                <div class="blog_wrap">
                    <div class="cards_inner col2 row line3">
    <?php
    foreach($categoryResult as $category){?>
        <div class="card">
            <figure class="card_img">
                <a href="blogView.php?blogID=<?=$category['blogID']?>">
                <img src="../assets/blog/<?=$category['blogImgFile'] ?>" alt="<?=$category['blogTitle'] ?>">
                </a>
            </figure>
            <div class="card_titile">
                <h3><a href="blogView.php?blogID=<?=$category['blogID']?>"><?=$category['blogTitle'] ?></a></h3>
                <p><?=$category['blogContents'] ?></p>
            </div>
            
        </div>
    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="blog_aside">
                    <?php include "../include/blogTitle.php"?>

                    <?php include "../include/blogCate.php"?>

                    <?php include "../include/blogLatest.php"?>

                    <?php include "../include/blogPopular.php"?>

                    <?php include "../include/blogComment.php"?>
                </div>
            </div>
        </div>
        <!-- blog_inner -->
                        
        <!-- bolg_article -->
        <div class="blog_comment">
            <h3>댓글쓰기</h3>
            <div>

            </div>
        </div>
        <!-- blog_comment -->
    </main>

    <?php include "../include/footer.php" ?>
    <!-- footer -->


</body>
</html>