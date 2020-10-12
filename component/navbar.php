<header class="border-bottom-themecolor kakomi">
    <div class="container my-2">
        <div class="row">
            <div class="col-8">
                <a href="./">
                    <img class="lazy" data-src="img/logo.jpg" alt="山田養蜂場のロゴ">
                </a>
            </div>
            <div class="col-2 logo-height text-center">
                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="./mypage.php">
                        <img data-src="img/icon/mypage.svg" alt="お客様ページ" class="lazy object-fit-contain">
                    </a>
                <?php else : ?>
                    <a href="./login.php?redirect=mypage.php">
                        <img data-src="img/icon/mypage.svg" alt="お客様ページ" class="lazy object-fit-contain">
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-2 logo-height text-center">
                <?php if (isset($_SESSION['username'])) : ?>
                    <a href="./cartIndex.php">
                        <img data-src="img/icon/cart.svg" alt="買い物かご" class="lazy object-fit-contain">
                    </a>
                <?php else : ?>
                    <a href="./login.php?redirect=cartIndex.php">
                        <img data-src="img/icon/cart.svg" alt="買い物かご" class="lazy object-fit-contain">
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
                <div class="col-3 d-flex border-x" class="m-auto">
                    <p class="navbar-content-text">贈り物</p>
                </div>
            </div>
        </div>
    </div>
</header>