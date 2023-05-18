<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['blogID'])){
        $blogID = $_GET['blogID'];
    } else {
        Header('Location: blog.php');
    }

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    $blogID = $_GET['blogID'];

    $blogSql = "SELECT * FROM blog WHERE blogID = '$blogID'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);

    echo "<pre>";
    var_dump($blogInfo);
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
        <div class="blog_title" style="background-image:url(../assets/blog/<?=$blogInfo['blogImgFile'] ?>)">
            <span class="cate"><?=$blogInfo['blogCategory'] ?></span>
            <h2 class="title"><?=$blogInfo['blogTitle']?></h2>
            <div class="info">
                <span class="author"><?=$blogInfo['blogAuthor']?></span>
                <span class="date"><?=date("y-m-d",$blogInfo['blogRegTime'])?></span>
                <div class="modify">
                    <a href="#">수정</a>
                    <a href="#">삭제</a>
                </div>
            </div>
        </div>
        <!-- blog_title -->
        <div class="blog_inner">
            <div class="left mt70">
                <div class="blog_contents">
                    <h3><?=$blogInfo['blogTitle']?></h3>
                    <p><?=$blogInfo['blogContents']?></p>
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
        <div class="blog_article">
            <h3>관련글</h3>
            <?php include "../include/blogArticle.php"?>
        </div>
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