<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/getItem.php';
$item = getItem($_REQUEST);
$title = $item['product_name'];
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/search.php'; ?>

<section class="container">
    <div class="row">
        <h1 class="title mt-3 mb-3 px-2"><?php echo $item['product_name'] ?></h1>
        <div class="col-12 mb-3">
            <p>税抜<span class="font-size-big"><?php echo $item['product_price'] ?></span>円</p>
        </div>
        <div class="col-12 col-md-6" style="height: 300px;">
            <img src="img/product/<?php echo $item['product_photo'] ?>" class="object-fit-contain"/>
        </div>
        <div class="col-12 col-md-6 mt-3">
            <div class="d-flex flex-column" style="height: 300px;">
                <div class="mb-auto">
                    <p><?php echo $item['product_descript'] ?></p>
                </div>
                <div class="row">
                    <form class="col-12 mt-4">
                        <div class="form-group">
                            <label>個数</label>
                            <select class="form-control" name="number">
                                <?php for ($i = 1; $i < 100; $i++): ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?>個</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">カートに入れる</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    口コミを乗せる
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
<?php
$dbh = null;
?>

