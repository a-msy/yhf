<?php
$recos = array();
$getreco = $GLOBALS['baseURL'] . 'getPopular.php';
$recos = file_get_contents($getreco,false,$GLOBALS['context']);
$recos = json_decode($recos, true);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 kakomi">
            <div class="row title-header border-bottom-lightgrey py-2">
                <h1 class="col-12 title">初めての人におすすめ</h1>
            </div>
            <div class="swiper-container reco-swiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($recos as $key3 => $reco) {
                        echo "<div class='swiper-slide'>";
                        echo "<div class='swiper-slide-photo'>";
                        echo "<img data-src='img/product/" . $reco['product_photo'] . "' class='object-fit-contain lazy'/>";
                        echo "</div>";
                        echo "<p class='text-center font-weight-bold'>";
                        echo $reco['product_name'];
                        echo "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="swiper-button-prev rp"></div>
                <div class="swiper-button-next rn"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var mySwiperReco = new Swiper('.reco-swiper', {
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
            nextEl: '.rn',
            prevEl: '.rp',
        },
    })
</script>
