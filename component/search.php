<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$search_items_list = $onayami_list = json_decode(file_get_contents($GLOBALS['baseURL'] . 'getCategory.php', false, $GLOBALS['context']), true);
$onayami_list = json_decode(file_get_contents($GLOBALS['baseURL'] . 'getNayami.php', false, $GLOBALS['context']), true);
?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3" style="border:solid 2px var(--themecolor);">
            <div class="text-center py-2">
                <a data-toggle="collapse" href="#zentai" role="button" aria-expand="false" aria-controls="zentai">
                    <h2 class="font-weight-bold">検索<i class="ml-3 fas fa-search"></i></h2>
                </a>
            </div>
            <div class="collapse col-12" id="zentai">
                <form class="row" method="GET" action="./itemIndex.php">
                    <input type="hidden" name="search" value="intelligence">
                    <div class="col-12 border-lightgrey py-3">
                        <div class="form-group">
                            <h2 class="title px-1 mb-3">キーワードで絞る</h2>
                            <input type="text" class="form-control" placeholder="キーワードを入力" name="word" value="<?php echo isset($_REQUEST['word']) ? $_REQUEST['word'] : "" ?>">
                        </div>
                    </div>
                    <div class="col-12 border-lightgrey py-3">
                        <a data-toggle="collapse" href="#syohin" role="button" aria-expand="false"
                           aria-controls="syohin">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h2 class="title px-1 font-weight-bold">商品ジャンルで絞る</h2>
                                </div>
                                <div>開く</div>
                            </div>
                        </a>
                        <div class="collapse col-12" id="syohin">
                            <?php foreach ($search_items_list as $key1 => $kenkos): ?>
                                <?php foreach ($kenkos as $key2 => $kenko): ?>
                                    <input type="checkbox" class="search-checkbox-input"
                                           id="toggle<?php echo $kenko['type_id'] ?>"
                                           value="<?php echo $kenko['type_id'] ?>" name="genre[]">
                                    <label class="search-checkbox-label font-size-default"
                                           for="toggle<?php echo $kenko['type_id'] ?>"><?php echo $kenko['type_name'] ?></label>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-12 border-lightgrey py-3">
                        <a data-toggle="collapse" href="#mokuteki" role="button" aria-expand="false"
                           aria-controls="mokuteki">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h2 class="title px-1 font-weight-bold">目的から選ぶ</h2>
                                </div>
                                <div>開く</div>
                            </div>
                        </a>
                        <div class="collapse col-12" id="mokuteki">
                            <?php foreach ($onayami_list as $kenko): ?>
                                <input type="checkbox" class="search-checkbox-input"
                                       id="onayami<?php echo $kenko['nayami_id'] ?>">
                                <label class="search-checkbox-label font-size-default"
                                       for="onayami<?php echo $kenko['nayami_id'] ?>"><?php echo $kenko['nayami_name'] ?></label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-12 border-lightgrey py-3">
                        <a data-toggle="collapse" href="#kakaku" role="button" aria-expand="false"
                           aria-controls="kakaku">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h2 class="title px-1 font-weight-bold">予算で絞る</h2>
                                </div>
                                <div>開く</div>
                            </div>
                        </a>
                        <div class="collapse col-12" id="kakaku">
                            <input type="range" class="custom-range" min="0" max="10" id="customRange2" value="<?php echo isset($_REQUEST['kakaku']) ? $_REQUEST['kakaku'] : 0 ?>"
                                   name="kakaku">
                            <p><span id="current-value"></span></p>
                        </div>
                    </div>
                    <div class="col-12 border-bottom-lightgrey py-3 text-center">
                        <button type="submit" class="btn btn-info">検索する</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    // input要素
    const inputElem = document.getElementById('customRange2');

    // 埋め込む先の要素
    const currentValueElem = document.getElementById('current-value');

    // 現在の値を埋め込む関数
    const setCurrentValue = (val) => {
        currentValueElem.innerText = val;
    }

    // inputイベント時に値をセットする関数
    const rangeOnChange = (e) => {
        setCurrentValue(e.target.value * 1000);
    }

    window.onload = () => {
        // 変更に合わせてイベントを発火する
        inputElem.addEventListener('input', rangeOnChange);
        // ページ読み込み時の値をセット
        setCurrentValue(inputElem.value * 1000);
    }
</script>