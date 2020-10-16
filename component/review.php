<?php
$reviews = array();
$getreview = $GLOBALS['baseURL'] . 'getReviews.php';
$reviews = file_get_contents($getreview, false, $GLOBALS['context']);
$reviews = json_decode($reviews, true);
?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 kakomi">
            <div class="row title-header border-bottom-lightgrey py-2">
                <h1 class="col-12 title">クチコミ</h1>
            </div>
            <div class="col-12">
                <div class="swiper-container review-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($reviews as $keyReview => $review): ?>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-4 height-search">
                                        <img class="object-fit-contain lazy"
                                             data-src="img/product/<?php echo $review['product_photo'] ?>"/>
                                    </div>
                                    <div class="col-8">
                                        <a href="./itemDetail.php?product_id=<?php echo $review['product_id']; ?>">
                                            <p class="font-size-default font-weight-bold py-3">
                                                <?php echo $review['product_name']; ?>
                                            </p>
                                        </a>
                                        <p>
                                            <?php for($i = 0; $i < $review['review_star']; $i++): ?>
                                            ★
                                            <?php endfor; ?>
                                        </p>
                                        <p class="font-size-medium"><?php echo $review['review_comment']; ?></p>
                                        <p class="text-right pt-2">
                                            <?php echo $review['user_age']; ?>代・<?php echo $review['user_gender']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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