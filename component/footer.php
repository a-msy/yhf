<?php
$kenko_syokuhin = array(
    "ローヤルゼリー", "プロポリス", "蜂の子", "青汁", "グルコサミン", "DHA・EPA", "ブルーベリー", "コラーゲン", "レスベラトロール", "お試しセット"
);
$kesyohin = array(
    "RJスキンケア", "RJエクセレント", "薬用 RJホワイト", "ハニーラボ", "ハニーアロマ", "RJデリケートプログラム", "RJスペシャルケア", "ヘアケア・地肌ケア", "ボディケア", "美容食品", "BEE MAKE", "Mr. PROPOLIS"
);
$sizen_syokuhin = array(
    "はちみつ", "果実漬", "ドリンク", "お菓子・スイーツ", "食卓食品", "クレヨン・みつろう", "薬用はみがき", "入浴剤", "はちみつ雑貨"
);
?>
</main>
<footer class="mt-5" style="background-color: #e7e7e7; word-break: break-all;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 p-3">
                <img src="img/footer/bnr_footer_catalogue.gif" class="object-fit-contain">
            </div>
            <div class="col-12 col-md-4 p-3">
                <img src="img/footer/bnr_footer_gather.jpg" class="object-fit-contain">
            </div>
            <div class="col-12 col-md-4 p-3">
                <img src="img/footer/bnr_footer_teiki.jpg" class="object-fit-contain">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="border-bottom-themecolor font-size-default font-weight-bold">健康食品</p>
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach ($kenko_syokuhin as $item) {
                        echo "<li class='list-inline-item border-orange border-radius-5px px-3 py-1 m-1 background-orange text-white font-size-medium'>" . $item . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="col-12">
                <p class="border-bottom-themecolor font-size-default font-weight-bold">化粧品</p>
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach ($kesyohin as $item) {
                        echo "<li class='list-inline-item border-orange border-radius-5px px-3 py-1 m-1 background-orange text-white font-size-medium'>" . $item . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="col-12">
                <p class="border-bottom-themecolor font-size-default font-weight-bold">自然食品</p>
                <ul class="list-inline list-unstyled">
                    <?php
                    foreach ($sizen_syokuhin as $item) {
                        echo "<li class='list-inline-item border-orange border-radius-5px px-3 py-1 m-1 background-orange text-white font-size-medium'>" . $item . "</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <p class="border-bottom-themecolor font-size-default font-weight-bold">山田養蜂場について</p>
                <ul class="list-unstyled">
                    <li class="my-3">ごあいさつ</li>
                    <li class="my-3">創業の精神・企業理念</li>
                    <li class="my-3">山田養蜂場からの 健康提案「アピセラピー」</li>
                    <li class="my-3">会社概要</li>
                    <li class="my-3">リクルート（採用情報）</li>
                    <li class="my-3">個人情報保護について</li>
                    <li class="my-3">特定商取引法に基づく表示</li>
                    <li class="my-3">利用規約</li>
                </ul>
            </div>
            <div class="col-12 col-md-6 mt-5">
                <p class="border-bottom-themecolor font-size-default font-weight-bold">参加団体・保有資格について</p>
                <div class="row">
                    <div class="col-4">
                        <img src="img/footer/footer_bnr_01.jpg" class="object-fit-contain">
                    </div>
                    <div class="col-4">
                        <img src="img/footer/footer_bnr_02.jpg" class="object-fit-contain">
                    </div>
                    <div class="col-4">
                        <img src="img/footer/footer_bnr_03.jpg" class="object-fit-contain">
                    </div>
                </div>
            </div>
            <div class="col-12 text-center p-5">
                <p>Copyright (C) Yamada Bee Farm All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
<script>
    let images = document.querySelectorAll(".lazy");
    lazyload(images);
</script>
</script>
</body>
</html>
