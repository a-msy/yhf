<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_logined_session();
@session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");
$dbh = connectDB();
$sql = 'SELECT * FROM users WHERE user_name = :username LIMIT 1';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':username', $_SESSION['username'], PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch();
?>
<div class="col-12 form-group">
    <label>名前</label>
    <input class="form-control" type="text" value="<?php echo $user['simei']; ?>" name="simei">
</div>
<div class="col-12 form-group">
    <label>住所</label>
    <input class="form-control" type="text" value="<?php echo $user['addr']; ?>" name="addr">
</div>
