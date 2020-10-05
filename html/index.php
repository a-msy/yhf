<?php
$title = "山田養蜂場";
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$arr = array();
$getcategory = $GLOBALS['baseURL'].'getCategory.php';
$kenkos = file_get_contents($getcategory);
$arr = json_decode($kenkos,true);
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/navbar.php'; ?>
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
                        foreach ($arr['1'] as $key=>$value){
                            echo "<div class='col-4 col-md-3'>";
                            echo "<div class='height-search text-center'>";
                            echo "<img src='img/kenko/".$value['type_photo']."' class='object-fit-contain' />";
                            echo "</div>";
                            echo "<p class='font-size-medium font-weight-bold'>".$value['type_name']."</p>";
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
                        foreach ($arr['2'] as $key=>$value){
                            echo "<div class='col-4 col-md-3'>";
                            echo "<div class='height-search text-center'>";
                            echo "<img src='img/cosme/".$value['type_photo']."' class='object-fit-contain' />";
                            echo "</div>";
                            echo "<p class='font-size-medium font-weight-bold'>".$value['type_name']."</p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
                <div class="row title-header border-bottom-lightgrey py-2">
                    <h2 class="col-12"><span
                                class="background-orange px-2 border-radius-5px text-white">はちみつ・自然食品から探す</span>
                    </h2>
                    <div class="row px-2">
                        <?php
                        foreach ($arr['3'] as $key=>$value){
                            echo "<div class='col-4 col-md-3'>";
                            echo "<div class='height-search text-center'>";
                            echo "<img src='img/honey/".$value['type_photo']."' class='object-fit-contain' />";
                            echo "</div>";
                            echo "<p class='font-size-medium font-weight-bold'>".$value['type_name']."</p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
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
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/recommend.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/review.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/footer.php'; ?>
<?php
$dbh=null;
?>
