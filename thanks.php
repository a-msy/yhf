<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$title = "注文完了";

@session_start();
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
$dbh = connectDB();

$tyumons = array();
$sum = 0;
$order_id = 0;
if (isset($_SESSION['cart']) && isset($_SESSION['userid'])) {
    //商品の取得
    foreach ($_SESSION['cart'] as $key => $quantity) {
        array_push($tyumons, array('product_id' => $key, 'quantity' => (int)$quantity));
    }

    //orderに格納
    $sql = "INSERT INTO orders (created_at, user_id) VALUES (:created_at, :user_id)";
    $stmt = $dbh->prepare($sql);
    $params = array(':created_at' => date("Y-m-d H:i:s"), ':user_id' => $_SESSION['userid']);
    $stmt->execute($params);
    $order_id = $dbh->lastInsertId('id');

    foreach ($tyumons as $tyumon) {
        $sql = "INSERT INTO tyumons (product_id, quantity, order_id) VALUES (:product_id, :quantity, :order_id)";
        $stmt = $dbh->prepare($sql);
        $params = array(':product_id' => $tyumon['product_id'], ':quantity' => $tyumon['quantity'], ':order_id' => $order_id);
        $stmt->execute($params);
    }
}
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<section class="container">
    <div class="balloon1 text-white background-themecolor left4 text-center">
        <?php if (isset($_SESSION['cart'])): ?>
            <h1>注文完了</h1>
        <?php else: ?>
            <h1>セッションエラー</h1>
        <?php endif; ?>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0"
             aria-valuemax="100"></div>
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0"
             aria-valuemax="100"></div>
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0"
             aria-valuemax="100"></div>
        <div class="progress-bar background-themecolor" role="progressbar" style="width: 25%" aria-valuenow="15"
             aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <?php if (isset($_SESSION['cart'])): ?>
        <h2 class="title px-3 mt-3">
            購入が完了しました
        </h2>
        <p>購入情報はお客様ページから確認できます</p>
        <div class="text-center">
            <a href="./mypage.php">
                <button class="btn btn-info mt-5">
                    お客様ページ
                </button>
            </a>
        </div>
    <?php else: ?>
        <h2>カートの中身が空です</h2>
    <?php endif; ?>

</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
<?php unset($_SESSION['cart']); ?>
