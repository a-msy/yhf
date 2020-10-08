<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/search.php';
list($items, $category) = typeSearch($_REQUEST);
if(isset($_REQUEST['search']) && $_REQUEST['search'] == 'type'){
    list($items, $category) = typeSearch($_REQUEST);
}
if(isset($_REQUEST['search']) && $_REQUEST['search'] == 'group'){
    list($items, $category) = groupSearch($_REQUEST);
}
$title = $category . "の商品一覧";
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/search.php'; ?>

<section class="container mt-5">
    <div class="row title-header border-bottom-lightgrey py-2 kakomi">
        <h1 class="col-12 title"><?php echo $title ?></h1>
    </div>
    <div class="row border-lightgrey">
        <?php foreach ($items as $item): ?>
            <div class="col-12 col-md-6 py-5 border-bottom-lightgrey">
                <a href="./itemDetail.php?product_id=<?php echo $item['product_id']?>">
                    <div class="row">
                        <div class="col-4">
                            <img src="img/product/<?php echo $item['product_photo'] ?>" class="object-fit-contain">
                        </div>
                        <div class="col-8">
                            <h2 class="font-weight-bold mb-3"><?php echo $item['product_name'] ?></h2>
                            <p class="mb-3 text-right">税抜 <span class="font-size-big"><?php echo $item['product_price'] ?></span> 円</p>
                            <p><?php echo $item['product_descript'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
