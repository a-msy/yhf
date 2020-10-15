<?php
$popus = array();
$getpopular = $GLOBALS['baseURL'] . 'getBought.php';
$popus = file_get_contents($getpopular, false, $GLOBALS['context']);
$popus = json_decode($popus, true);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 kakomi">
            <div class="row title-header border-bottom-lightgrey py-2">
                <h1 class="col-12 title">買ったことがある商品</h1>
            </div>
            <div class="swiper-container bought-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($popus as $key2 => $popu): ?>
                        <div class="swiper-slide">
                            <a href="./itemDetail.php?product_id=<?php echo $popu['product_id'] ?>">
                                <div class="swiper-slide-photo">
                                    <img data-src="img/product/<?php echo $popu['product_photo'] ?>"
                                         class="object-fit-contain lazy"/>
                                </div>
                                <p class="text-center font-weight-bold"><?php echo $popu['product_name'] ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev pp"></div>
                <div class="swiper-button-next pn"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var mySwiper = new Swiper('.bought-swiper', {
        // オプションの設定
        loop: true,
        slidesPerView: 1,
        breakpoints: {
            785: {
                slidesPerView: 3,
            },
        },
        autoplay: {
            delay: 10000,
        },
        navigation: {
            nextEl: '.pn',
            prevEl: '.pp',
        },
    })
</script>
