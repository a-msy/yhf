<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';

function categorySearch($REQUEST){
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = 'SELECT * FROM products';
    $type_id = 1;
    if(isset($REQUEST['search'])){
        if(isset($REQUEST['type_id'])){
            $sql = 'SELECT * FROM products WHERE type_id = :type_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':type_id', $REQUEST['type_id'], PDO::PARAM_INT);
            $type_id = $REQUEST['type_id'];
        }else{
            $stmt = $dbh->prepare($sql);
        }
    }else{
        $stmt = $dbh->prepare($sql);
    }
    $stmt->execute();
    $items = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $items[] = array(
            'product_id' => $row['product_id'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'product_photo' => $row['product_photo'],
            'product_descript' => $row['product_descript'],
        );
    }
    $sql = 'SELECT type_name as category FROM product_types WHERE type_id = :type_id LIMIT 1';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    $stmt->execute();
    $category = $stmt->fetch();
    if($type_id == 1){
        $category['category'] ="すべて";
    }
    return array($items,$category['category']);
}
?>
