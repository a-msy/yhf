<?php
$title = "お客様ページ";
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_logined_session();
$dbh = connectDB();

//orders の取り込み
$temps = array();
$sql = "SELECT * FROM tyumons INNER JOIN products ON tyumons.product_id = products.product_id INNER JOIN orders ON orders.id = tyumons.order_id WHERE user_id = :user_id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':user_id' => $_SESSION['userid']));
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($temps, array(
            'order_id' => $row['id'],
            'created_at' => $row['created_at'],
            'quantity' => $row['quantity'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'product_photo' => $row['product_photo'],
            'product_id' => $row['product_id'],
        )
    );
}
$items = array();
foreach ($temps as $item) {
    $items[$item['order_id']][] = $item;
}
krsort($items, SORT_NUMERIC);
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

    <div class="container py-3">
        <div class="text-right">
            <a href="./logout.php?token=<?= h(generate_token()) ?>">ログアウト</a>
        </div>
        <h1 class="title px-3 mt-5">配送先 【　会員番号<?= h($_SESSION['userid']) ?>　】</h1>
        <form class="row" method="POST" action="./api/updateProfile.php">
            <input type="hidden" name="redirect" value="../mypage.php">
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/myprofile.php'; ?>
            <div class="col-12 text-center">
                <button class="btn btn-success" type="submit">
                    変更を保存する
                </button>
            </div>
        </form>
        <h1 class="title px-3 mt-5">購入履歴</h1>
        <div class="row">
            <?php foreach ($items as $order_id => $item): ?>
                <div class="col-12">
                    <h3 class="mb-2 mt-4">購入番号:<?php echo $order_id ?> 【<?php echo $item[0]['created_at'] ?>】</h3>
                </div>
                <?php foreach ($item as $i): ?>
                    <div class="col-12 mb-5 col-md-6">
                        <div class="row mb-3">
                            <div class="col-4">
                                <img src="img/product/<?php echo $i['product_photo'] ?>" class="object-fit-contain">
                            </div>
                            <div class="col-8">
                                <a href="./itemDetail.php?product_id=<?php echo $i['product_id'] ?>"><p
                                            class="font-weight-bold mb-2"><?php echo $i['product_name'] ?></p></a>
                                <p class="text-right"><?php echo $i['product_price'] ?>円</p>
                                <p class="text-right"><?php echo $i['quantity'] ?>個</p>
                            </div>
                            <div class="col-12 text-right">
                                <a href="./itemDetail.php?product_id=<?php echo $i['product_id'] ?>">
                                    <button class="btn btn-success">
                                        もう一度買う
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <div class="border-bottom-lightgrey col-12" style="height: 1px"></div>
            <?php endforeach; ?>
        </div>
    </div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>