<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$title = "注文内容の確認";
@session_start();
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
$dbh = connectDB();
$items = array();
$product_ids = array();
$sum = 0;
if (isset($_SESSION['cart']) && isset($_SESSION['userid'])) {
    //商品の検索
    foreach ($_SESSION['cart'] as $key => $value) {
        array_push($product_ids, $key);
    }
    $inClause = substr(str_repeat(',?', count($product_ids)), 1);
    $sql = "SELECT * FROM products WHERE product_id IN({$inClause})";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($product_ids);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $items[$row['product_id']] = array(
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'product_photo' => $row['product_photo'],
            'product_descript' => $row['product_descript'],
        );
    }

    $sql = "SELECT simei,addr FROM users WHERE user_id = :userid LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':userid', $_SESSION['userid'], PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch();
}
//var_dump($_SESSION['cart'],$items);
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<section class="container">
    <div class="balloon1 text-white background-themecolor left3 text-center">
        <h1>注文内容の確認</h1>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0"
             aria-valuemax="100"></div>
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0"
             aria-valuemax="100"></div>
        <div class="progress-bar background-themecolor" role="progressbar" style="width: 25%" aria-valuenow="15"
             aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <h2 class="title font-weight-bold px-3 mt-5 mb-3">購入する商品一覧</h2>
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

        <div class="row">
            <div class="col-12">
                <h3 class="title px-3 font-weight-bold">配送先</h3>
                <p><?php echo $user['addr'] ?></p>
            </div>
            <div class="col-12">
                <h3 class="title px-3 font-weight-bold">ご購入者名</h3>
                <p class="px-4"><?php echo $user['simei'] ?></p>
            </div>
        </div>
        <div class="mt-3 mb-3 text-center">
            <a href="./thanks.php">
                <button class="btn btn-success">
                    注文を確定する
                </button>
            </a>
        </div>
    <?php else: ?>
        <div class="mt-3 mb-3">
            <p>カートの中は空です</p>
        </div>
    <?php endif; ?>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
