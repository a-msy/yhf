<?php
$popus = array();
$getpopular = $GLOBALS['baseURL'] . 'getPopular.php';
$popus = file_get_contents($getpopular);
$popus = json_decode($popus, true);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 kakomi">
            <div class="row title-header border-bottom-lightgrey py-2">
                <h1 class="col-12 title">人気の商品</h1>
            </div>
            <div class="swiper-container popular-swiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($popus as $key2 => $popu) {
                        echo "<div class='swiper-slide'>";
                        echo "<div class='swiper-slide-photo'>";
                        echo "<img src='img/product/" . $popu['product_photo'] . "' class='object-fit-contain'/>";
                        echo "</div>";
                        echo "<p class='text-center font-weight-bold'>";
                        echo $popu['product_name'];
                        echo "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="swiper-button-prev pp"></div>
                <div class="swiper-button-next pn"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var mySwiper = new Swiper('.popular-swiper', {
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