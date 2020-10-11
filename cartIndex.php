<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_unlogined_session();
$title = "お客様のカート";
// https://qiita.com/mpyw/items/bb8305ba196f5105be15#%E3%82%BB%E3%83%83%E3%82%B7%E3%83%A7%E3%83%B3%E8%AA%8D%E8%A8%BC
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<div class="container">
    <div class="balloon1 text-white background-themecolor">
        <h1>買い物かごの中身</h1>
    </div>
    <div class="progress">
        <div class="progress-bar background-themecolor" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
