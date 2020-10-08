<?php

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
require_once $_SERVER['DOCUMENT_ROOT'].'/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();

$sql = 'SELECT * FROM nayami';
$stmt = $dbh->prepare($sql);
$stmt->execute();

$items = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $items[] = array(
        'nayami_id' => $row['nayami_id'],
        'nayami_name' => $row['nayami_name'],
    );
}

$dbh = null;
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');
echo json_encode($items,JSON_UNESCAPED_UNICODE);
?>
