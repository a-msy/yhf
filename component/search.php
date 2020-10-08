<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fW5sUn8K/html/DB/connect.php';
$search_items_list = $onayami_list = json_decode(file_get_contents($GLOBALS['baseURL'] . 'getCategory.php', false, $GLOBALS['context']), true);
$onayami_list = json_decode(file_get_contents($GLOBALS['baseURL'] . 'getNayami.php', false, $GLOBALS['context']), true);

$kakaku_list = array(
    1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000
);
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
                <div class="col-12 border-lightgrey py-3">
                    <div class="form-group">
                        <h2 class="title px-1 mb-3">キーワードから選ぶ</h2>
                        <input type="text" class="form-control" placeholder="キーワードを入力">
                    </div>
                </div>
                <div class="col-12 border-lightgrey py-3">
                    <a data-toggle="collapse" href="#syohin" role="button" aria-expand="false" aria-controls="syohin">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h2 class="title px-1 font-weight-bold">商品から選ぶ</h2>
                            </div>
                            <div>開く</div>
                        </div>
                    </a>
                    <div class="collapse col-12" id="syohin">
                        <?php foreach ($search_items_list as $key1 => $kenkos): ?>
                            <?php foreach ($kenkos as $key2 => $kenko): ?>
                                <input type="checkbox" class="search-checkbox-input"
                                       id="toggle<?php echo $kenko['type_id'] ?>">
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
                    <a data-toggle="collapse" href="#kakaku" role="button" aria-expand="false" aria-controls="kakaku">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <h2 class="title px-1 font-weight-bold">価格帯から選ぶ</h2>
                            </div>
                            <div>開く</div>
                        </div>
                    </a>
                    <div class="collapse col-12" id="kakaku">
                        <?php foreach ($kakaku_list as $key => $kenko): ?>
                            <input type="checkbox" class="search-checkbox-input" id="kakaku<?php echo $key ?>">
                            <label class="search-checkbox-label font-size-default"
                                   for="kakaku<?php echo $key ?>"><?php echo $kenko ?>円台</label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-12 border-bottom-lightgrey py-3 text-center">
                    <button type="submit" class="btn btn-info">検索する</button>
                </div>
            </div>
        </div>
    </div>