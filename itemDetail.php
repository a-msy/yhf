<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/api/getItem.php';
$item = getItem($_REQUEST);
$title = $item['product_name'];
@session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$dbh = connectDB();
$review = array();
if (isset($_REQUEST['product_id'])) {
    $sql = "SELECT * FROM review INNER JOIN users ON review.user_id = users.user_id WHERE product_id = :product_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':product_id', $_REQUEST['product_id'], PDO::PARAM_INT);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $review[] = array(
            'review_comment' => $row['review_comment'],
            'review_star' => $row['review_star'],
            'user_gender' => $row['user_gender'],
            'user_age' => $row['user_age'],
        );
    }
}
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/navbar.php'; ?>

<section class="container">
    <h1 class="title mt-3 mb-3 px-2"><?php echo $item['product_name'] ?></h1>
    <div class="row">
        <div class="col-12 mb-3">
            <p>税抜<span class="font-size-big"><?php echo $item['product_price'] ?></span>円</p>
        </div>
        <div class="col-12 col-md-6" style="height: 300px;">
            <img src="img/product/<?php echo $item['product_photo'] ?>" class="object-fit-contain"/>
        </div>
        <div class="col-12 col-md-6 mt-3">
            <div class="d-flex flex-column" style="height: 300px;">
                <div class="mb-auto">
                    <p><?php echo $item['product_descript'] ?></p>
                </div>
                <?php if (isset($_SESSION['userid'])): ?>
                    <form method="post" action="cartIndex.php" class="row">
                        <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?>">
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <label>個数</label>
                                <select class="form-control" name="quantity">
                                    <?php for ($i = 1; $i < 100; $i++): ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?>個</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">買い物かごに入れる</button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="col-12 mt-4 text-center">
                        <a href="./login.php?redirect=itemDetail.php&product_id=<?php echo $item['product_id']; ?>">
                            <button type="submit" class="btn btn-success">ログイン</button>
                        </a>
                        <p class="font-weight-bold">ログイン後買い物を続けられます</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="container">
    <h1 class="title mt-3 mb-3 px-2"><?php echo $item['product_name'] ?>の口コミ</h1>
    <div class="row">
        <?php if (empty($_REQUEST['product_id'])): ?>
            <?php foreach ($review as $r): ?>
            <div class="col-12 col-md-6 mb-4">
                <div class="row">
                    <div class="col-3">
                        <img src="img/man.svg" class="object-fit-contain">
                    </div>
                    <div class="col-9">
                        <p><?php echo floor($r['user_age']/10)*10?>代<?php echo $r['user_gender']?></p>
                        <p><?php for($i=0; $i<$r['review_star']; $i++):?>★<?php endfor;?></p>
                        <p class="font-size-medium"><?php echo $r['review_comment']?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-12">
                <p>この商品の口コミは有りません．</p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/bought.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/popular.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/shoppingGuide.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/component/footer.php'; ?>
<?php
$dbh = null;
?>

