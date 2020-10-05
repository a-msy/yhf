<?php
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();

$sql = 'SELECT * FROM `product_types` WHERE `type_group` = 1';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$items = array();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $items['1'][]=array(
    'type_id'=>$row['type_id'],
    'type_name'=>$row['type_name'],
    'type_photo'=>$row['type_photo'],
  );
}
$sql = 'SELECT * FROM `product_types` WHERE `type_group` = 2';
$stmt = $dbh->prepare($sql);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $items['2'][]=array(
    'type_id'=>$row['type_id'],
    'type_name'=>$row['type_name'],
    'type_photo'=>$row['type_photo'],
  );
}
$sql = 'SELECT * FROM `product_types` WHERE `type_group` = 3';
$stmt = $dbh->prepare($sql);
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $items['3'][]=array(
    'type_id'=>$row['type_id'],
    'type_name'=>$row['type_name'],
    'type_photo'=>$row['type_photo'],
  );
}

$dbh=null;
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
echo json_encode($items,JSON_UNESCAPED_UNICODE);
?>
