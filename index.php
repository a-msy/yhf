<?php
$title = "山田養蜂場";
require_once 'DB/connect.php';
$dbh = connectDB();
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/YHF/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/YHF/navbar.php'; ?>
    <section class="top-eyecatch background-themecolor">
        山田養蜂場の思い
    </section>
    <section class="container">
        <div class="row">
            <div class="col-12 kakomi mt-3 mb-3">
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h1 class="col-12 title">お知らせ</h1>
                </div>
                <div class="row font-size-medium py-3 border-bottom-lightgrey">
                    <div class="col-md-3">2020/10/01<span class="span-syohin">商品</span></div>
                    <div class="col-md-9">ウィルスキンクリア 泡ハンドソープ／ハンドクリーム／フェイスミスト 2020.10.1（木）新発売</div>
                </div>
                <div class="row font-size-medium py-3 border-bottom-lightgrey">
                    <div class="col-md-3">2020/10/01<span class="span-syohin">商品</span></div>
                    <div class="col-md-9">ウィルスキンクリア 泡ハンドソープ／ハンドクリーム／フェイスミスト 2020.10.1（木）新発売</div>
                </div>
                <div class="row font-size-medium py-3">
                    <div class="col-md-3">2020/10/01<span class="span-syohin">商品</span></div>
                    <div class="col-md-9">ウィルスキンクリア 泡ハンドソープ／ハンドクリーム／フェイスミスト 2020.10.1（木）新発売</div>
                </div>
            </div>
            <div class="col-md-9 kakomi">
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h1 class="col-12 title">商品を探す</h1>
                </div>
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h2 class="col-12">検索</h2>
                </div>
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h2 class="col-12">
                        <span class="background-themecolor px-2 border-radius-5px text-white">健康食品から探す</span>
                    </h2>
                    <div class="row px-2">
                        <?php
                        $sql = 'SELECT * FROM `product_types` WHERE `group` = 1';
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        while(true) {
                            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($rec == false) {
                                break;
                            }
                            echo "<div class='col-4 max-width-126px'>";
                            echo    "<div class='height-search text-center'>";
                            echo        "<img src='img/kenko/".$rec["photo"]."' alt='".$rec["name"]."' class='object-fit-contain'>";
                            echo    "</div>";
                            echo    "<p class='font-size-medium'>".$rec["name"]."</p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h2 class="col-12"><span
                                class="background-pink px-2 border-radius-5px text-white">化粧品から探す</span>
                    </h2>
                    <div class="row px-2">
                        <?php
                        $sql = 'SELECT * FROM `product_types` WHERE `group` = 2';
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        while(true) {
                            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($rec == false) {
                                break;
                            }
                            echo "<div class='col-4 max-width-126px'>";
                            echo    "<div class='height-search text-center'>";
                            echo        "<img src='img/cosme/".$rec["photo"]."' alt='".$rec["name"]."' class='object-fit-contain'>";
                            echo    "</div>";
                            echo    "<p class='font-size-medium'>".$rec["name"]."</p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h2 class="col-12"><span
                                class="background-orange px-2 border-radius-5px text-white">はちみつ・自然食品から探す</span>
                    </h2>
                    <?php
                    $sql = 'SELECT * FROM `product_types` WHERE `group` = 3';
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
                    while(true) {
                        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($rec == false) {
                            break;
                        }
                        echo "<div class='col-4 max-width-126px'>";
                        echo    "<div class='height-search text-center'>";
                        echo        "<img src='img/honey/".$rec["photo"]."' alt='".$rec["name"]."' class='object-fit-contain'>";
                        echo    "</div>";
                        echo    "<p class='font-size-medium'>".$rec["name"]."</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-4 col-sm-12">
                        お客様ページ
                    </div>
                    <div class="col-4 col-sm-12">
                        初めての方
                    </div>
                    <div class="col-4 col-sm-12">
                        お悩み商品検索
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/YHF/top/recommend.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/YHF/top/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/YHF/top/review.php'; ?>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/YHF/footer.php'; ?>
<?php
$dbh=null;
?>
