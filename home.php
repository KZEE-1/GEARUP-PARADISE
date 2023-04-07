<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>


    <!-- Swiper -->
    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" navigation="true"
        space-between="30" centered-slides="true" autoplay-delay="2500" autoplay-disable-on-interaction="false">
        <swiper-slide>
            <img src="images/banner/banner2.png" alt="Image 1">
            <br><br>
        </swiper-slide>
        <swiper-slide>
            <img src="images/Banner/banner1.jpg" alt="Image 2">

        </swiper-slide>
        <swiper-slide>
            <img src="images/Banner/banner3.jpg" alt="Image 3">

        </swiper-slide>
        <swiper-slide>
            <img src="images/Banner/banner4.jpg" alt="Image 3">

        </swiper-slide>


        <div class="autoplay-progress" slot="container-end">
            <svg viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </swiper-container>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");

    const swiperEl = document.querySelector("swiper-container");
    swiperEl.addEventListener("autoplaytimeleft", (e) => {
        const [swiper, time, progress] = e.detail;
        progressCircle.style.setProperty("--progress", 1 - progress);
        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    });
    </script>

    <style>
    .autoplay-progress {
        position: relative;
        width: 40px;
        height: 40px;
        margin: -50px 0;
        margin-top: 20px;
        text-align: center;

    }

    .autoplay-progress svg {
        --progress: 0;
        position: absolute;
        left: 0;
        top: 0px;
        z-index: 10;
        width: 100%;
        height: 100%;
        stroke-width: 4px;
        stroke: var(--swiper-theme-color);
        fill: none;
        stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
        stroke-dasharray: 125.6;
        transform: rotate(-90deg);

    }

    .autoplay-progress span {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #00aaff;
        font-weight: bold;
    }
    </style>



    </section>


    <div class="swiper-pagination"></div>
    </div>
    </section>
    </div>
    <div class="swiper-pagination"></div>
    </div>
    </section>
    <section class="home-products">
        <h1 class="heading">latest products</h1>
        <div class="swiper products-slider">
            <div class="swiper-wrapper"><?php $select_products=$conn->prepare("SELECT * FROM `products` LIMIT 6");
    $select_products->execute();

    if($select_products->rowCount() > 0) {
        while($fetch_product=$select_products->fetch(PDO::FETCH_ASSOC)) {
            ?><form action="" method="post" class="swiper-slide slide"><input type="hidden" name="pid"
                        value="<?= $fetch_product['id']; ?>"><input type="hidden" name="name"
                        value="<?= $fetch_product['name']; ?>"><input type="hidden" name="price"
                        value="<?= $fetch_product['price']; ?>"><input type="hidden" name="image"
                        value="<?= $fetch_product['image_01']; ?>"><a
                        href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a><img
                        src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                    <div class="name"><?=$fetch_product['name'];
            ?></div>
                    <div class="flex">
                        <div class="price"><span>RM</span><?=$fetch_product['price'];
            ?><span></span></div><input type="number" name="qty" class="qty" min="1" max="99"
                            onkeypress="if(this.value.length == 2) return false;" value="1">
                    </div><input type="submit" value="add to cart" class="btn" name="add_to_cart">
                </form><?php
        }
    }

    else {
        echo '<p class="empty">no products added yet!</p>';
    }

    ?></div>
            <div class="swiper-pagination"></div>
        </div>
    </section><?php include 'components/footer.php';

    ?><script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script>
    var swiper = new Swiper(".home-slider", {

            loop: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }

            ,
        }

    );

    var swiper = new Swiper(".category-slider", {

            loop: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }

            ,
            breakpoints: {
                0: {
                    slidesPerView: 2,
                }

                ,
                650: {
                    slidesPerView: 3,
                }

                ,
                768: {
                    slidesPerView: 4,
                }

                ,
                1024: {
                    slidesPerView: 5,
                }

                ,
            }

            ,
        }

    );

    var swiper = new Swiper(".products-slider", {

            loop: true,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            }

            ,
            breakpoints: {
                550: {
                    slidesPerView: 2,
                }

                ,
                768: {
                    slidesPerView: 2,
                }

                ,
                1024: {
                    slidesPerView: 3,
                }

                ,
            }

            ,
        }

    );
    </script>
</body>

</html>