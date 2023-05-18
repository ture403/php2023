<?php
    include "../connect/connect.php";

    $adminName = $_POST['youName'];
    $adminEmail = $_POST['youEmail'];
    $adminNick = $_POST['youNick'];
    $adminPass = $_POST['youPass'];
    $adminBirth = $_POST['youBirth'];
    $adminPhone = $_POST['youPhone'];
    $regtime = time();

    $sql = "INSERT INTO adminmembers(adminEmail, adminName, adminNick, adminPass, adminBirth, adminPhone, adminDelete, adminRegtime, adminModtime) VALUES('$adminEmail', '$adminName', '$adminNick', '$adminPass', '$adminBirth', '$adminPhone', '1', '$regtime', '$regtime')";
    $connect -> query($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>
    <?php include "../include/head.php"?>
    <!-- link -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

        .join_Result {
        width: 100%;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #FBF8F1;
        font-family: 'Pacifico', serif;
        overflow: hidden;
        background-color: #eee;
        }

        .pumping {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-grow: 1;
        }

        .pumping::after {
        content: attr(data-text);
        position: absolute;
        background-color: #FC4F4F;
        border-radius: 10px;
        padding: 6px 20px;
        font-size: 22px;
        cursor: pointer;
        color: #fff;
        user-select: none;
        box-shadow: 0 7px 15px -1px #ccc;
        transition: transform 100ms ease-in;
        }

        .pumping:active::after { transform: scale(0.9); }

        .pumping::after {
        animation: pumping 100ms ease-in-out infinite;
        }

        @keyframes pumping {
        50% { transform: scale(0.95); }
        }

        .shape {
        --size: 8px;
        position: absolute;
        top: calc(50% - var(--size));
        left: calc(50% - var(--size));
        width: calc(var(--size) * 2);
        height: calc(var(--size) * 2);
        animation: popup var(--d) cubic-bezier(.08,.56,.53,.98) forwards;
        }

        .square {
        border-radius: 4px;
        background-color: var(--c);
        }

        .circle {
        border-radius: 50%;
        background-color: var(--c);
        }

        .triangle {
        width: 0px;
        height: 0px;
        background-color: none;
        border-top: var(--size) solid transparent;
        border-bottom: calc(var(--size) * 2) solid var(--c);
        border-left: var(--size) solid transparent;
        border-right: var(--size) solid transparent;
        }

        .heart {
        --size: 6px;
        background-color: var(--c);
        }
        .heart::before, .heart::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: var(--c);
        border-radius: 50%;
        }
        .heart::before { left: -50%; }
        .heart::after { top: -50%; }

        @keyframes popup {
        0% { opacity: 0; }
        60% { opacity: 1; }
        100% {
            opacity: 0;
            transform: translate(var(--x), var(--y)) rotate(var(--r));
        }
        }
    </style>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro_inner center mb30">
            <div class="intro_images">
                <!-- <img src="assets/img/intro01.png" alt="소개이미지"> -->
                <picture>
                    <source srcset="../assets/img/join01.png , ../assets/img/join01@2x.png 2x, ../assets/img/join01@3x.png 3x">
                    <img src="../assets/img/intro01.png" alt="소개이미지">
                </picture>
            </div>
            <p class="intro_text">
                회원가입이 완료 되었습니다.
            </p>
        </div>
        <!-- intro_inner -->

        <div class="join_inner">
            <span class="pumping" data-text="완료"></span>
            <div class="index mt40">
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li class="active">3</li>
                </ul> 
            </div>
            <div class="intro_btn" style="text-align: center;">
                <a href="#">로그인</a>
            </div>
        </div>
        
        <!-- join_inner -->

    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->
    <script>
        const colors = ['#FC4F4F', '#FFBC80', '#FF9F45', '#F76E11']
        // const shapes = ['square', 'circle', 'triangle', 'heart']
        const shapes = ['heart']

        const randomIntBetween = (min, max) => {
        return Math.floor(Math.random() * (max - min + 1) + min)
        }

        class Particle {
        constructor({ x, y, rotation, shape, color, size, duration, parent }) {
            this.x = x
            this.y = y
            this.parent = parent
            this.rotation = rotation
            this.shape = shape
            this.color = color
            this.size = size
            this.duration = duration
            this.children = document.createElement('div')
        }

        draw() {
            this.children.style.setProperty('--x', this.x + 'px')
            this.children.style.setProperty('--y', this.y + 'px')
            this.children.style.setProperty('--r', this.rotation + 'deg')
            this.children.style.setProperty('--c', this.color)
            this.children.style.setProperty('--size', this.size + 'px')
            this.children.style.setProperty('--d', this.duration + 'ms')
            this.children.className = `shape ${this.shape}`
            this.parent.append(this.children)
        }

        animate() {
            this.draw()

            const timer = setTimeout(() => {
            this.parent.removeChild(this.children)
            clearTimeout(timer)
            }, this.duration)
            }
        }

        function animateParticles({ total }) {
        for (let i = 0; i < total; i++) {
            const particle = new Particle({
                x: randomIntBetween(-200, 200),
                y: randomIntBetween(-100, -300),
                rotation: randomIntBetween(-360 * 5, 360 * 5),
                shape: shapes[randomIntBetween(0, shapes.length - 1)],
                color: colors[randomIntBetween(0, colors.length - 1)],
                size: randomIntBetween(4, 7),
                duration: randomIntBetween(400, 800),
                parent
                })
                particle.animate()
        }
        }

        let intervalTimer = setInterval(() => {
        animateParticles({ total: 16 })
        }, 100)

        const parent = document.querySelector('.pumping')
        parent.addEventListener("touchstart", () => {}, false);
        parent.addEventListener('click', e => {
        if (intervalTimer) {
            clearInterval(intervalTimer)
            intervalTimer = null
            parent.classList.remove('pumping')
        }
        animateParticles({ total: 40 })
        })
    </script>
</body>
</html>