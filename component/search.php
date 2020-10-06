<?php
$search_items_list = array(
    "ローヤルゼリー", "プロポリス", "蜂の子", "青汁", "グルコサミン", "DHA・EPA", "ブルーベリー", "コラーゲン", "レスベラトロール", "お試しセット",
    "RJスキンケア", "RJエクセレント", "薬用 RJホワイト", "ハニーラボ", "ハニーアロマ", "RJデリケートプログラム", "RJスペシャルケア", "ヘアケア・地肌ケア", "ボディケア", "美容食品", "BEE MAKE", "Mr. PROPOLIS",
    "はちみつ", "果実漬", "ドリンク", "お菓子・スイーツ", "食卓食品", "クレヨン・みつろう", "薬用はみがき", "入浴剤", "はちみつ雑貨",
);
$onayami_list = array(
    "軟骨成分でスムーズな動作", "みずみずしく潤う生活", "元気な会話が飛び交う生活", "疲労回復・滋養強壮", "冴えわたる思考", "夜間の視力維持", "スッキリ成分を配合",
    "回転の速い毎日", "活力維持", "女性特有のツラさを解消", "質の高い休息", "すっきりとした朝の目覚め", "ダイエット",
    "スムーズでサラサラの流れを追求", "スッキリで始まる毎日を追求", "タフな生活を追求", "爽快な日々を追求（季節対策）", "ストレス社会に立ち向かうチカラを追求",
    "顔の悩み", "髪の悩み", "体の悩み",
    "おくりものに", "小さなお子さま向け", "ご家庭で楽しむ", "健康志向の方に",
);
$kakaku_list = array(
    1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000
);
?>
<div class="container">
    <div class="row">
        <div class="col-12 kakomi mt-3">
            <div class="row title-header py-2">
                <h1 class="col-12 title">組み合わせ検索</h1>
            </div>
        </div>
        <div class="col-12 border-lightgrey py-3">
            <div class="form-group">
                <h2 class="title px-1 mb-3">キーワードから選ぶ</h2>
                <input type="text" class="form-control" placeholder="キーワードを入力">
            </div>
            <div class="form-group">
                <h2 class="title px-1">商品から選ぶ</h2>
                <?php
                foreach ($search_items_list as $key => $kenko) {
                    echo "<input type='checkbox' class='search-checkbox-input' id='toggle" . $key . "'>";
                    echo "<label class='search-checkbox-label font-size-default' for='toggle" . $key . "'>" . $kenko . "</label>";
                }
                ?>
            </div>
            <div class="form-group">
                <h2 class="title px-1">目的から選ぶ</h2>
                <?php
                foreach ($onayami_list as $key => $kenko) {
                    echo "<input type='checkbox' class='search-checkbox-input' id='onayami" . $key . "'>";
                    echo "<label class='search-checkbox-label font-size-default' for='onayami" . $key . "'>" . $kenko . "</label>";
                }
                ?>
            </div>
            <div class="form-group">
                <h2 class="title px-1">価格帯から選ぶ</h2>
                <?php
                foreach ($kakaku_list as $key => $kenko) {
                    echo "<input type='checkbox' class='search-checkbox-input' id='kakaku" . $key . "'>";
                    echo "<label class='search-checkbox-label font-size-default' for='kakaku" . $key . "'>" . $kenko . "円台" . "</label>";
                }
                ?>
            </div>
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-info">検索する</button>
            </div>
        </div>
    </div>
</div>

