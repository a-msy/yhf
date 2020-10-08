<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';

function getItem($REQUEST)
{
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = 'SELECT * FROM products';
    $product_id = 1;
    if (isset($REQUEST['product_id'])) {
        $product_id = $REQUEST['product_id'];
        $sql = 'SELECT * FROM products WHERE product_id = :product_id LIMIT 1';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
    } else {
        $stmt = $dbh->prepare($sql);
    }
    $stmt->execute();
    $item = $stmt->fetch();
    return $item;
}
?>
