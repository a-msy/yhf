<?php @session_start();?>
<header class="border-bottom-themecolor kakomi">
    <div class="container my-2">
        <div class="row">
            <div class="col-8">
                <a href="./">
                    <img src="img/logo.jpg" alt="山田養蜂場のロゴ">
                </a>
            </div>
            <div class="col-2 logo-height text-center">
                <?php if (isset($_SESSION['userid'])) : ?>
                    <a href="./mypage.php">
                        <img src="img/icon/mypage.svg" alt="お客様ページ" class="object-fit-contain">
                    </a>
                <?php else : ?>
                    <a href="./login.php?redirect=mypage.php">
                        <img src="img/icon/mypage.svg" alt="お客様ページ" class="object-fit-contain">
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-2 logo-height text-center">
                <?php if (isset($_SESSION['userid'])) : ?>
                    <a href="./cartIndex.php">
                        <img src="img/icon/cart.svg" alt="買い物かご" class="object-fit-contain">
                    </a>
                <?php else : ?>
                    <a href="./login.php?redirect=cartIndex.php">
                        <img src="img/icon/cart.svg" alt="買い物かご" class="object-fit-contain">
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="py-2 text-center text-theme font-weight-bold kakomi">
        <div class="container">
            <div class="row">
                <div class="col-3 d-flex border-x">
                    <a href="./itemIndex.php?search=group&group_id=1" class="m-auto">
                        <p class="navbar-content-text">健康食品</p>
                    </a>
                </div>
                <div class="col-3 d-flex border-x">
                    <a href="./itemIndex.php?search=group&group_id=2" class="m-auto">
                        <p class="navbar-content-text">化粧品</p>
                    </a>
                </div>
                <div class="col-3 d-flex border-x">
                    <a href="./itemIndex.php?search=group&group_id=3" class="m-auto">
                        <p class="navbar-content-text">はちみつ自然食品</p>
                    </a>
                </div>
                <div class="col-3 d-flex border-x">
                    <a href="" class="m-auto">
                        <p class="navbar-content-text">贈り物</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>