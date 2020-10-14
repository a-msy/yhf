<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
$dbh = connectDB();

require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_logined_session();
$title = "買い物かごの中身";
@session_start();
if (isset($_REQUEST['product_id']) && isset($_REQUEST['quantity'])) {
    if($_REQUEST['quantity'] < 1 || $_REQUEST['quantity'] > 99){
        //　数が不正
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }else{
        $_SESSION['cart'][$_REQUEST['product_id']] = $_REQUEST['quantity'];
    }
}
if (isset($_SESSION['cart'])) {
    //商品の検索
    $product_ids = array();
    foreach ($_SESSION['cart'] as $key => $value) {
        array_push($product_ids, $key);
    }
    $inClause = substr(str_repeat(',?', count($product_ids)), 1);
    $sql = "SELECT * FROM products WHERE product_id IN({$inClause})";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($product_ids);
    $items = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $items[$row['product_id']] = array(
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'product_photo' => $row['product_photo'],
            'product_descript' => $row['product_descript'],
        );
    }
    $sum = 0;
}
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<div class="container">
    <div class="balloon1 text-white background-themecolor">
        <h1>買い物かごの中身</h1>
    </div>
    <div class="progress">
        <div class="progress-bar background-themecolor" role="progressbar" style="width: 25%" aria-valuenow="15"
             aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <?php if (isset($_SESSION['cart'])): ?>
        <div class="row">
            <?php foreach ($_SESSION['cart'] as $product_id => $item): ?>
                <?php $sum += $items[$product_id]['product_price'] * $item; ?>
                <div class="col-6 col-md-4 border-bottom-lightgrey py-3 mb-3">
                    <img src="img/product/<?php echo $items[$product_id]['product_photo'] ?>"
                         class="object-fit-contain">
                </div>
                <div class="col-6 col-md-8 border-bottom-lightgrey py-3 mb-3">
                    <p class="font-weight-bold mb-3"><?php echo $items[$product_id]['product_name'] ?></p>

                    <p class="mb-5"><?php echo $items[$product_id]['product_descript'] ?></p>

                    <p class="font-size-big text-right"><?php echo $items[$product_id]['product_price'] ?>円</p>

                    <p class="font-size-big text-right"><?php echo $item ?>個</p>

                </div>
            <?php endforeach; ?>
            <div class="col-12 mt-3 text-right">
                <p class="font-weight-bold">合計<?php echo $sum; ?>円</p>
            </div>
        </div>
        <div class="mt-5 mb-3 text-center">
            <a href="./cartBuy.php">
                <button class="btn btn-success">
                    お客様情報の確認に進む
                </button>
            </a>
        </div>
    <?php else: ?>
        <div class="mt-3 mb-3">
            <p>カートの中は空です</p>
        </div>
    <?php endif; ?>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
