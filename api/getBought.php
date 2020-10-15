<?php
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();
$sql = 'SELECT * FROM products';

$sql = 'SELECT id FROM orders WHERE user_id = 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();
$order_ids = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $order_ids[] = (int)$row['id'];
}

$inClause = substr(str_repeat(',?', count($order_ids)), 1);
$sql = "SELECT product_id FROM tyumons WHERE order_id IN({$inClause})";
$stmt = $dbh->prepare($sql);
$stmt->execute($order_ids);
$tyumon_ids = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $tyumon_ids[] = $row['product_id'];
}

$inClause = substr(str_repeat(',?', count($tyumon_ids)), 1);
$sql = "SELECT * FROM products WHERE product_id IN({$inClause}) LIMIT 10";
$stmt = $dbh->prepare($sql);
$stmt->execute($tyumon_ids);
$items = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $items[] = array(
        'product_id'=>$row['product_id'],
        'product_name'=>$row['product_name'],
        'product_photo'=>$row['product_photo']
    );
}

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
echo json_encode($items,JSON_UNESCAPED_UNICODE);