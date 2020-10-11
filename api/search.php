<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';

function typeSearch($REQUEST){
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
    $type = $stmt->fetch();
    if($type_id == 1){
        $type['category'] ="すべて";
    }
    return array($items,$type['category']);
}

function groupSearch($REQUEST){
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = 'SELECT * FROM products';
    $group_id = 1;
    if(isset($REQUEST['search'])){
        if(isset($REQUEST['group_id'])){
            $group_id = $REQUEST['group_id'];
            $sql = 'SELECT type_id FROM product_types WHERE type_group = :group_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':group_id', $group_id, PDO::PARAM_INT);
        }else{
            $stmt = $dbh->prepare($sql);
        }
    }else{
        $stmt = $dbh->prepare($sql);
    }
    $stmt->execute();
    $type_ids = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $type_ids[] = $row['type_id'];
    }

    $inClause = substr(str_repeat(',?',count($type_ids)),1);
    $sql = "SELECT * FROM products WHERE type_id IN({$inClause})";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($type_ids);
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
    $sql = "SELECT * FROM `group` WHERE group_id = :group_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':group_id', $group_id, PDO::PARAM_INT);
    $stmt->execute();
    $group = $stmt->fetch();

    return array($items,$group['group_name']);
}
?>