<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/search.php';
$items = array();
$category = "お悩みにあう";
if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'nayami') {
    list($items, $category) = nayamiSearch($_REQUEST);
}
$title = $category . "商品一覧";
?>
<section class="container mt-5">
    <div class="row title-header border-bottom-lightgrey py-2 kakomi">
        <h1 class="col-12 title"><?php echo $title ?></h1>
    </div>
    <?php if (!empty($items)): ?>
        <div class="row">
            <div class="col-12">
                <?php foreach ($items as $item): ?>
                    <div class="row">
                        <div class="col-12 p-3 text-white background-themecolor font-weight-bold">
                            <?php echo $item[0]['nayami_name'] ?>
                        </div>
                        <?php foreach ($item as $i): ?>
                            <div class="col-12 col-md-6 py-5 border-bottom-lightgrey">
                                <a href="./itemDetail.php?product_id=<?php echo $i['product_id'] ?>">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="img/product/<?php echo $i['product_photo'] ?>"
                                                 class="object-fit-contain">
                                        </div>
                                        <div class="col-8">
                                            <h2 class="font-weight-bold mb-3"><?php echo $i['product_name'] ?></h2>
                                            <p class="mb-3 text-dark">税抜 <span
                                                        class="font-size-big"><?php echo $i['product_price'] ?></span>
                                                円</p>
                                            <p class="text-dark"><?php echo $i['product_descript'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <p>ご希望にあう商品がございませんでした</p>
    <?php endif; ?>
</section>