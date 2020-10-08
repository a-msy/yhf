<?php
$title = "";
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/search.php'; ?>

<section class="container">
    <div class="row">
        <div class="col-12 mt-3 mb-3">
            <h1 class="title px-2">酵素パワー蜂の子ゴールド</h1>
        </div>
        <div class="col-12 col-md-6 background-themecolor" style="height:256px">
        </div>
        <div class="col-12 col-md-6 mt-3">
            <p>実感力を追求し、蜂の子の有用性をさらに引き出した「酵素パワー蜂の子ゴールド」</p>
        </div>
        <form class="col-12 mt-4">
            <div class="form-group">
                <label>個数</label>
                <select class="form-control" name="number">
                    <?php for($i=1; $i < 100; $i++): ?>
                        <option value="<?php echo $i ?>"><?php echo $i?>個</option>
                    <?php endfor;?>
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">カートに入れる</button>
            </div>
        </form>
    </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
<?php
$dbh = null;
?>

