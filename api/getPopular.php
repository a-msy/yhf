<?php

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();

$sql = 'SELECT * FROM `products` ORDER BY RAND() LIMIT 10;';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$items = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $items[] = array(
    'product_id' => $row['product_id'],
    'product_name' => $row['product_name'],
    'product_price'=>$row['product_price'],
    'product_descript'=>$row['product_descript'],
    'type_id'=>$row['type_id'],
    'product_photo' => $row['product_photo'],
  );
}

$dbh = null;
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
echo json_encode($items,JSON_UNESCAPED_UNICODE);
?>
