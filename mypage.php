<?php
$title = "";
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<div class="container">
    <h1>会員番号　：　<?= h($_SESSION['userid']) ?></h1>
    <a href="./logout.php?token=<?= h(generate_token()) ?>">ログアウト</a>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
<?php
$dbh = null;
?>
