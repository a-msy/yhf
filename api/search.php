<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';

function typeSearch($REQUEST)
{
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = 'SELECT * FROM products';
    $type_id = 1;
    if (isset($REQUEST['search'])) {
        if (isset($REQUEST['type_id'])) {
            $sql = 'SELECT * FROM products WHERE type_id = :type_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':type_id', $REQUEST['type_id'], PDO::PARAM_INT);
            $type_id = $REQUEST['type_id'];
        } else {
            $stmt = $dbh->prepare($sql);
        }
    } else {
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
    if ($type_id == 1) {
        $type['category'] = "すべて";
    }
    return array($items, $type['category']);
}

function groupSearch($REQUEST)
{
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = 'SELECT * FROM products';
    $group_id = 1;
    if (isset($REQUEST['search'])) {
        if (isset($REQUEST['group_id'])) {
            $group_id = $REQUEST['group_id'];
            $sql = 'SELECT type_id FROM product_types WHERE type_group = :group_id';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':group_id', $group_id, PDO::PARAM_INT);
        } else {
            $stmt = $dbh->prepare($sql);
        }
    } else {
        $stmt = $dbh->prepare($sql);
    }
    $stmt->execute();
    $type_ids = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $type_ids[] = $row['type_id'];
    }

    $inClause = substr(str_repeat(',?', count($type_ids)), 1);
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

    return array($items, $group['group_name']);
}

function wordSearch($REQUEST)
{
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = 'SELECT * FROM products';
    if (isset($REQUEST['search'])) {
        if (isset($REQUEST['word'])) {
            $sql = 'SELECT * FROM products WHERE product_name LIKE :word';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':word', "%" . $REQUEST['word'] . "%", PDO::PARAM_STR);
        } else {
            $stmt = $dbh->prepare($sql);
        }
    } else {
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
    return array($items, $REQUEST['word']);
}

function intelligenceSearch($REQUEST)
{
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $sql = "SELECT * FROM products WHERE product_id <> 0 ";
    $items = array();

    if (isset($REQUEST['word'])) {
        // word
        $sql .= "AND product_name LIKE " . escapeString($REQUEST['word']);
    }

    if (isset($REQUEST['kakaku'])) {
        // AND 価格帯(0なら無制限，10000はそれ以上，それ以外はその価格を含む超えない範囲)
        if ($REQUEST['kakaku'] >= 10) {
            $sql .= " AND product_price >= 10000";
        } elseif ($REQUEST['kakaku'] <= 0) {
            $sql .= " AND product_price > 0";
        } else {
            $REQUEST['kakaku'] *= 1000;
            $sql .= " AND product_price <= {$REQUEST['kakaku']}";
        }
    }

    if (isset($REQUEST['genre'])) {
        // AND ジャンル(ジャンル内はOR検索)
        $inClause = substr(str_repeat(',?', count($REQUEST['genre'])), 1);
        $sql .= " AND type_id IN ({$inClause})";
    }

    $stmt = $dbh->prepare($sql);
//    var_dump($sql,array_map('toInt',$REQUEST['genre']));
    if (isset($REQUEST['genre'])) {
        $REQUEST['genre'] = array_map('toInt', $REQUEST['genre']);
        $stmt->execute($REQUEST['genre']);
    } else {
        $stmt->execute();
    }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $items[] = array(
            'product_id' => $row['product_id'],
            'product_name' => $row['product_name'],
            'product_price' => $row['product_price'],
            'product_photo' => $row['product_photo'],
            'product_descript' => $row['product_descript'],
        );
    }
    return array($items, "詳細検索結果");
}

function escapeString($s)
{
    //ワイルドカードをエスケープ
    return "'%" . mb_ereg_replace('([_%#])', '#\1', $s) . "%'";
}

function toInt($s)
{
    return (int)$s;
}

function array_group_by(array $items, $keyName)
{
    $groups = [];
    foreach ($items as $item) {
        $key = $item[$keyName];
        if (array_key_exists($key, $groups)) {
            $groups[$key][] = $item;
        } else {
            $groups[$key] = [$item];
        }
    }
    return $groups;
}

function nayamiSearch($REQUEST)
{
    mb_language("uni");
    mb_internal_encoding("utf-8"); //内部文字コードを変更
    mb_http_input("auto");
    mb_http_output("utf-8");
    $dbh = connectDB();
    $inClause = substr(str_repeat(',?', count($REQUEST['nayami_id'])), 1);
    $REQUEST['nayami_id'] = array_map('toInt', $REQUEST['nayami_id']);
    $sql = "SELECT * FROM nayami_products INNER JOIN nayami ON nayami_products.nayami_id = nayami.nayami_id INNER JOIN products ON nayami_products.product_id = products.product_id WHERE nayami_products.nayami_id IN({$inClause})";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($REQUEST['nayami_id']);

    $items = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $items[] = array(
            'nayami_id' => $row['nayami_id'],
            'product_id' => $row['product_id'],
            'nayami_name' => $row['nayami_name'],
            'product_name' => $row['product_name'],
            'product_photo' => $row['product_photo'],
            'product_descript' => $row['product_descript'],
            'product_price' => $row['product_price'],
        );
    }
    return array(array_group_by($items,'nayami_id'), "お悩みにあう");
}

?>
