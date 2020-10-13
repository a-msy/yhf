<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/auth.php';
require_logined_session();
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$title = "お客様情報の確認";
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<div class="container">
    <div class="balloon1 text-white background-themecolor left2">
        <h1>お客様情報の確認</h1>
    </div>
    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar background-themecolor" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p class="mt-3 mb-3">変更がある場合は変更ができます</p>
    <form class="row" method="POST" action="./api/updateProfile.php">
        <input type="hidden" name="redirect" value="../buyConfirm.php">
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/myprofile.php'; ?>
        <div class="col-12 text-center">
            <button class="btn btn-success" type="submit">
                注文内容の確認に進む
            </button>
        </div>
    </form>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>

