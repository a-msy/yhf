<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/getItem.php';
$item = getItem($_REQUEST);
$title = $item['product_name'];
@session_start();
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<section class="container">
    <h1 class="title mt-3 mb-3 px-2"><?php echo $item['product_name'] ?></h1>
    <div class="row">
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
                <?php if (isset($_SESSION['userid'])): ?>
                    <form method="post" action="cartIndex.php" class="row">
                        <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?>">
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <label>個数</label>
                                <select class="form-control" name="quantity">
                                    <?php for ($i = 1; $i < 100; $i++): ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?>個</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">買い物かごに入れる</button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="col-12 mt-4 text-center">
                        <a href="./login.php?redirect=itemDetail.php&product_id=<?php echo $item['product_id']; ?>">
                            <button type="submit" class="btn btn-danger">ログインしてください</button>
                        </a>
                    </div>
                <?php endif; ?>
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

