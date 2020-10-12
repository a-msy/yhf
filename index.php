<?php
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

?>
<?php
$title = "トップページ";
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$arr = array();
$getcategory = $GLOBALS['baseURL'] . 'getCategory.php';
$kenkos = file_get_contents($getcategory, false, $GLOBALS['context']);
$arr = json_decode($kenkos, true);
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>
<section class="top-eyecatch background-themecolor">
    山田養蜂場の思い
</section>
<section class="container">
    <div class="row">
        <div class="col-12 mb-3 mt-3">
            <img data-src="img/bnr_top_201503.jpg" class="lazy object-fit-contain">
        </div>
    </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/search.php'; ?>
<section class="container mt-5">
    <div class="row">
        <div class="col-12 kakomi">
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
    </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/recommend.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<section class="container mt-5">
    <div class="row">
        <div class="col-md-9 kakomi">
            <div class="row title-header border-bottom-lightgrey py-2">
                <h1 class="col-12 title">商品を探す</h1>
            </div>
            <div class="row title-header border-bottom-lightgrey p-2">
                <h2 class="title px-1 mb-3">キーワードから選ぶ</h2>
                <input type="text" class="form-control" placeholder="キーワードを入力">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info mt-3">検索する</button>
                </div>
            </div>
            <div class="row title-header border-bottom-lightgrey py-2">
                <h2 class="col-12">
                    <span class="background-themecolor px-2 border-radius-5px text-white">健康食品から探す</span>
                </h2>
                <div class="row px-2">
                    <?php foreach ($arr['1'] as $key1 => $value): ?>
                        <div class="col-4 col-md-3">
                            <a href="./itemIndex.php?search=type&type_id=<?php echo $value['type_id'] ?>">
                                <div class="height-search text-center">
                                    <img data-src="img/kenko/<?php echo $value['type_photo'] ?>"
                                         class="object-fit-contain lazy"/>
                                </div>
                                <p class="font-size-medium font-weight-bold"><?php echo h($value['type_name']) ?></p>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="row title-header border-bottom-lightgrey py-2">
                <h2 class="col-12"><span
                            class="background-pink px-2 border-radius-5px text-white">化粧品から探す</span>
                </h2>
                <div class="row px-2">
                    <?php foreach ($arr['2'] as $key1 => $value): ?>
                        <div class="col-4 col-md-3">
                            <a href="./itemIndex.php?search=type&type_id=<?php echo $value['type_id'] ?>">
                                <div class="height-search text-center">
                                    <img data-src="img/cosme/<?php echo $value['type_photo'] ?>"
                                         class="object-fit-contain lazy"/>
                                </div>
                                <p class="font-size-medium font-weight-bold"><?php echo h($value['type_name']) ?></p>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="row title-header border-bottom-lightgrey py-2">
                <h2 class="col-12"><span
                            class="background-orange px-2 border-radius-5px text-white">はちみつ・自然食品から探す</span>
                </h2>
                <div class="row px-2">
                    <?php foreach ($arr['3'] as $key1 => $value): ?>
                        <div class="col-4 col-md-3">
                            <a href="./itemIndex.php?search=type&type_id=<?php echo $value['type_id'] ?>">
                                <div class="height-search text-center">
                                    <img data-src="img/honey/<?php echo $value['type_photo'] ?>"
                                         class="object-fit-contain lazy"/>
                                </div>
                                <p class="font-size-medium font-weight-bold"><?php echo h($value['type_name']) ?></p>
                            </a>
                        </div>
                    <?php endforeach ?>
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
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/review.php'; ?>
<section class="container">
    <div class="row title-header border-bottom-lightgrey py-2 kakomi">
        <h1 class="col-12 title">山田養蜂場からのご案内</h1>
    </div>
    <div class="row border-lightgrey">
        <div class="col-6 col-md-4 mt-3">
            <img data-src="img/footer/information_01.jpg" class="lazy object-fit-contain img-hover">
        </div>
        <div class="col-6 col-md-4 mt-3">
            <img data-src="img/footer/information_02.jpg" class="lazy object-fit-contain img-hover">
        </div>
        <div class="col-6 col-md-4 mt-3">
            <img data-src="img/footer/information_03.jpg" class="lazy object-fit-contain img-hover">
        </div>
        <div class="col-6 col-md-4 mt-3">
            <img data-src="img/footer/information_04.jpg" class="lazy object-fit-contain img-hover">
        </div>
        <div class="col-6 col-md-4 mt-3">
            <img data-src="img/footer/information_05.jpg" class="lazy object-fit-contain img-hover">
        </div>
        <div class="col-6 col-md-4 mt-3">
            <img data-src="img/footer/information_06.jpg" class="lazy object-fit-contain img-hover">
        </div>
    </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
<?php echo password_hash('0000', PASSWORD_BCRYPT); ?>
<?php
$dbh = null;
?>
