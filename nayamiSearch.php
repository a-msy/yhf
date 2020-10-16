<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$onayami_list = json_decode(file_get_contents($GLOBALS['baseURL'] . 'getNayami.php', false, $GLOBALS['context']), true);
$title ="お悩み商品検索";
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1 class="font-weight-bold">あなたの悩みや目指したい生活はなんですか</h1>
            </div>
            <div class="col-12 text-right">
                <img src="img/right.svg" width="32px" height="32px">
            </div>
            <div class="col-12" style="overflow-x: scroll">
                <div style="width:1200px;">
                    <?php foreach ($onayami_list as $kenko): ?>
                        <input type="checkbox" class="search-checkbox-input"
                               id="onayami<?php echo $kenko['nayami_id'] ?>">
                        <label class="search-checkbox-label font-size-default"
                               for="onayami<?php echo $kenko['nayami_id'] ?>"><?php echo $kenko['nayami_name'] ?></label>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/review.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>