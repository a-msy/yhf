<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
$dbh = connectDB();

require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_logined_session();
$title = "お客様のカート";
@session_start();
if (isset($_REQUEST['product_id']) && isset($_REQUEST['quantity'])) {
    $_SESSION['cart'][$_REQUEST['product_id']] = $_REQUEST['quantity'];
}

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
    <table class="table mt-5">
        <thead class="thead-light">
        <tr class="text-center">
            <th scope="col">商品画像</th>
            <th scope="col">名前</th>
            <th scope="col">金額</th>
            <th scope="col">数量</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['cart'] as $product_id => $value): ?>
            <tr>
                <th scope="row">
                    <img src="img/product/<?php echo $items[$product_id]['product_photo'] ?>"
                         class="object-fit-contain">
                </th>
                <td><?php echo $items[$product_id]['product_name']?></td>
                <td class="text-right"><?php echo $items[$product_id]['product_price'] ?>円</td>
                <td class="text-right"><?php echo $_SESSION['cart'][$product_id]?>個</td>
            </tr>
        <?php $sum += $items[$product_id]['product_price'];?>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th></th>
            <th class="text-right">合計</th>
            <th class="text-right"><?php echo $sum; ?>円</th>
        </tr>
        </tfoot>
    </table>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
