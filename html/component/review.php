<?php
$reviews = array();
$getreview = $GLOBALS['baseURL'] . 'getReviews.php';
$reviews = file_get_contents($getreview);
$reviews = json_decode($reviews, true);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 kakomi">
            <div class="row title-header border-bottom-lightgrey py-2">
                <h1 class="col-12 title">クチコミ</h1>
            </div>
            <div class="col-12">
                <div class="swiper-container review-swiper">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($reviews as $keyReview => $review) {
                            echo "<div class='swiper-slide'>";
                            echo    "<div class='row'>";
                            echo        "<div class='col-4 height-search'>";
                            echo            "<img class='object-fit-contain' src='img/product/".$review['product_photo']."' />";
                            echo        "</div>";
                            echo        "<div class='col-8'>";
                            echo            "<p class='font-size-default font-weight-bold py-3'>";
                            echo                $review['product_name'];
                            echo            "</p>";
                            echo            "<p class='font-size-medium'>" . $review['review_comment'] . "</p>";
                            echo            "<p class='text-right pt-2'>";
                            echo                $review['user_age'] . "代・" . $review['user_gender'];
                            echo            "</p>";
                            echo        "</div>";
                            echo    "</div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div slot="button-prev" class="swiper-button-prev rvp"></div>
                    <div slot="button-next" class="swiper-button-next rvn"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var mySwiperReco = new Swiper('.review-swiper', {
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
            nextEl: '.rvn',
            prevEl: '.rvp',
        },
    })
</script>