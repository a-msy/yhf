<?php

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();

$sql = 'select * from review, users, products, product_types WHERE review.product_id = products.product_id AND review.user_id = users.user_id AND product_types.type_id = products.type_id';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$items = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $items[] = array(
    'review_id'=>$row['review_id'],
    'review_star'=>$row['review_star'],
    'review_comment'=>mb_strimwidth($row['review_comment'],0,124,'...','utf8'),
    'user_gender'=>$row['user_gender'],
    'user_age'=>($row['user_age']%10)*10,
    'product_id'=>$row['product_id'],
    'product_name'=>$row['product_name'],
    'product_price'=>$row['product_price'],
    'product_descript'=>$row['product_descript'],
    'product_photo'=>$row['product_photo'],
    'type_id'=>$row['type_id'],
    'type_name'=>$row['type_name'],
  );
}

$dbh = null;
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
echo json_encode($items,JSON_UNESCAPED_UNICODE);
?>
