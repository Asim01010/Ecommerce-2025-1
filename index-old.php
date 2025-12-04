<?php include 'libs/header.php' ?>

<section class="">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <?php
            $getSlides = mysqli_query($dbcon, "SELECT * FROM sm_slider");
            while ($rowSlides = mysqli_fetch_assoc($getSlides)) { ?>
                <div class="swiper-slide border-y">
                    <img src="imgs/slides/<?= $rowSlides['sl_image'] ?>" alt="" class="hidden lg:block w-full">
                    <img src="imgs/slides/<?= $rowSlides['sl_mobimage'] ?>" alt="" class="block lg:hidden w-full">
                </div>
            <?php
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>



<section class="py-24 relative bg-gray-50">
    <!-- <div class="container relative lg:absolute inset-0 py-24">
        <h2 class="text-[34px] leading-[38px] lg:text-[40px] lg:leading-[45px] mb-2 font-light">
            BEST SELLING<BR>PRODUCT THIS WEEK
        </h2>
        <p class="font-bold text-[20px] leading-[25px] mb-8">Timeless Elegance,<br>Modern Twist</p>
        <a href="products-view?cat_id=88" class="inline-block text-sm lg:text-base font-medium border border-black uppercase px-6 py-3 hover:bg-black hover:text-white transition-all duration-300 ease-in-out">Explore All Products</a>
    </div> -->
    <div class="overflow-hidden">
        <div class="container relative lg:right-[0px] lg:w-[100%]">
            <div class="flex justify-between items-center p-4 ">
                <h1 class="text-2xl lg:text-4xl font-light tracking-wider text-black uppercase">
                    Best Selling Product
                </h1>
                <div class="flex gap-3">
                    <div class="swiper-button-prev-unique">
                        <img src="imgs/nav-btn.svg" alt="Previous" class="h-12 lg:h-14 rotate-[180deg]">
                    </div>
                    <div class="swiper-button-next-unique">
                        <img src="imgs/nav-btn.svg" alt="Next" class="h-12 lg:h-14">
                    </div>
                </div>
            </div>
            <div class="swiper product-slider mb-20 lg:mb-0">
                <div class="swiper-wrapper">
                    <?php
                    $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE  pro_ed_addtocart = 1 ORDER BY pro_id DESC LIMIT 12") or die(mysqli_error($dbcon));
                    while ($row = mysqli_fetch_assoc($products)) { ?>
                        <div class="swiper-slide">
                        <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>">
                            <div class=" p-3">
                                <img src="imgs/products/<?php echo $row['pro_image'] ?>" title="<?php echo $row['pro_name'] ?>" alt="products" class="mb-5  w-full">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg line-clamp-1">
                                        <?= $row['pro_name']; ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-black rounded-full"></div>
                                </div>
                                <div class="flex justify-between items-center mb-5">
                                    <?php
                                    if ($row['pro_discount'] > 0) {
                                        $discount = ($row['pro_price'] * $row['pro_discount']) / 100; ?>
                                        <div class="flex flex-col relative">
                                            <p class="text-xs absolute top-[-16px] "><del><?php echo $row['pro_price']; ?> PKR</del></p>
                                            <h5 class="font-medium text-sm lg:text-base">
                                                <?php echo number_format($row['pro_price'] - $discount, 0); ?> PKR
                                            </h5>
                                        </div>
                                    <?php
                                    } else { ?>

                                        <h5 class="font-medium text-sm lg:text-base">
                                            <?php echo $row['pro_price']; ?> PKR
                                        </h5>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) {
                                        echo '<div class="bg-green-100 px-3 py-1"> <p class="text-green-500 font-medium text-xs lg:text-sm">In Stock</p> </div>';
                                    } else {
                                        echo '<div class="bg-red-100 px-3 py-1"> <p class="text-red-500 font-medium text-xs lg:text-sm">Out of Stock</p> </div>';
                                    }
                                    ?>
                                </div>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) { ?>
                                    <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-black py-3 px-5 text-center text-sm lg:text-base">Buy Now</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-black py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>
                        </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="absolute bottom-[-80px] lg:bottom-0 left-[50%] lg:left-[-100px] translate-x-[-50%] lg:translate-x-auto flex justify-center items-center gap-3">
                <div class="swiper-button-prev-unique">
                    <img src="imgs/nav-btn.svg" alt="" class="h-12 lg:h-14 rotate-[180deg]">
                </div>
                <div class="swiper-button-next-unique">
                    <img src="imgs/nav-btn.svg" alt="" class="h-12 lg:h-14">
                </div>
            </div> -->

            <div class="flex justify-center">
                <a href="products-view" class="inline-block text-sm lg:text-base font-medium border border-black uppercase px-6 py-3 hover:bg-black hover:text-white transition-all duration-300 ease-in-out">
                    Explore All Products
                </a>
            </div>
        </div>
    </div>
</section>


<section class="relative">
    <img src="imgs/banner_pc_01.jpg" class="hidden lg:block w-full" alt="">
    <img src="imgs/banner_mob_01.jpg" class="block lg:hidden w-full" alt="">
    <div class="absolute inset-0 bg-gradient-to-b from-black/[0.2] to-transparent"></div>
    <!-- <div class="container absolute bottom-16 inset-x-0 text-white text-center">
        <h2 class="text-[34px] leading-[38px] lg:text-[40px] lg:leading-[45px] mb-2 text-center font-light">
            ADVANCED DESIGN
        </h2>
        <p class="font-bold text-[20px] leading-[25px] mb-8">Timeless Elegance,<br>Modern Twist</p>
        <a href="" class="inline-block text-sm lg:text-base font-medium border border-white uppercase px-8 py-3 hover:bg-white hover:text-black transition-all duration-300 ease-in-out">buy now</a>
    </div> -->
</section>

<!--<section class="">-->
<!--    <div class="container py-16 text-black">-->
<!--        <h2 class="text-[34px] leading-[38px] lg:text-[40px] lg:leading-[45px] mb-12 text-center font-light">-->
<!--            CLIENT TESTIMONIALS-->
<!--        </h2>-->
<!--        <div class="swiper testimonial-slider">-->
<!--            <div class="swiper-wrapper pb-16">-->
<!--                <div class="swiper-slide border p-5 h-auto lg:h-[218px]">-->
<!--                    <h4 class="text-xl lg:text-2xl font-medium">Sarah J.</h4>-->
<!--                    <div class="flex items-center gap-2 mb-5">-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-gray-500 text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                    </div>-->
<!--                    <p class="text-sm lg:text-base leading-relaxed">-->
<!--                        "I've tried many gym outfits, but Splash 30 stands out for its comfort and durability. The materials are breathable and perfect for intense workouts. Highly recommend!"-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="swiper-slide border p-5 h-auto lg:h-[218px]">-->
<!--                    <h4 class="text-xl lg:text-2xl font-medium">Alex M.</h4>-->
<!--                    <div class="flex items-center gap-2 mb-5">-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-gray-500 text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                    </div>-->
<!--                    <p class="text-sm lg:text-base leading-relaxed">-->
<!--                        "Splash 30 gym outfits have completely transformed my workout experience. The fit is perfect, and the designs are stylish. I feel confident and motivated every time I hit the gym."-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="swiper-slide border p-5 h-auto lg:h-[218px]">-->
<!--                    <h4 class="text-xl lg:text-2xl font-medium">Emily T.</h4>-->
<!--                    <div class="flex items-center gap-2 mb-5">-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-gray-500 text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                    </div>-->
<!--                    <p class="text-sm lg:text-base leading-relaxed">-->
<!--                        "As a fitness enthusiast, I need gear that can keep up with my active lifestyle. Splash 30 delivers on all fronts. The outfits are flexible, comfortable, and look great. It's my go-to brand now!"-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="swiper-slide border p-5 h-auto lg:h-[218px]">-->
<!--                    <h4 class="text-xl lg:text-2xl font-medium">James R.</h4>-->
<!--                    <div class="flex items-center gap-2 mb-5">-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-gray-500 text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                    </div>-->
<!--                    <p class="text-sm lg:text-base leading-relaxed">-->
<!--                        "Splash 30 gym outfits are a game-changer. The quality is top-notch, and they fit like a dream. I've received so many compliments at the gym. Definitely worth the investment!"-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="swiper-slide border p-5 h-auto lg:h-[218px]">-->
<!--                    <h4 class="text-xl lg:text-2xl font-medium">Olivia K.</h4>-->
<!--                    <div class="flex items-center gap-2 mb-5">-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-pri text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                        <i class="text-gray-500 text-base lg:text-lg bi bi-star-fill"></i>-->
<!--                    </div>-->
<!--                    <p class="text-sm lg:text-base leading-relaxed">-->
<!--                        "I love my Splash 30 gym outfits! They provide the perfect balance of style and functionality. Whether I'm doing yoga or lifting weights, I feel supported and stylish. Five stars!"-->
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="swiper-pagination"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="py-24 relative bg-gray-50">
    <div class="overflow-hidden">
        <div class="container relative lg:right-[0px] lg:w-[100%]">
            <div class="flex justify-between items-center p-4 ">
                <h1 class="text-2xl lg:text-4xl font-light tracking-wider text-black uppercase">
                NEW Men ARRIVALS
                </h1>
                <div class="flex gap-3">
                    <div class="swiper-button-prev-unique">
                        <img src="imgs/nav-btn.svg" alt="Previous" class="h-12 lg:h-14 rotate-[180deg]">
                    </div>
                    <div class="swiper-button-next-unique">
                        <img src="imgs/nav-btn.svg" alt="Next" class="h-12 lg:h-14">
                    </div>
                </div>
            </div>
            <div class="swiper product-slider mb-20 lg:mb-0">
                <div class="swiper-wrapper">
                    <?php
                    $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_ed_addtocart = 1 AND pro_mcat_id=92 AND pro_status != 0 ORDER BY pro_id DESC LIMIT 12") or die(mysqli_error($dbcon));
                    while ($row = mysqli_fetch_assoc($products)) { ?>
                        <div class="swiper-slide">
                        <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>">
                            <div class=" p-3">
                                <img src="imgs/products/<?php echo $row['pro_image'] ?>" title="<?php echo $row['pro_name'] ?>" alt="products" class="mb-5  w-full">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg line-clamp-1">
                                        <?= $row['pro_name']; ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-black rounded-full"></div>
                                </div>
                                <div class="flex justify-between items-center mb-5">
                                    <?php
                                    if ($row['pro_discount'] > 0) {
                                        $discount = ($row['pro_price'] * $row['pro_discount']) / 100; ?>
                                        <div class="flex flex-col relative">
                                            <p class="text-xs absolute top-[-16px] "><del><?php echo $row['pro_price']; ?> PKR</del></p>
                                            <h5 class="font-medium text-sm lg:text-base">
                                                <?php echo number_format($row['pro_price'] - $discount, 0); ?> PKR
                                            </h5>
                                        </div>
                                    <?php
                                    } else { ?>

                                        <h5 class="font-medium text-sm lg:text-base">
                                            <?php echo $row['pro_price']; ?> PKR
                                        </h5>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) {
                                        echo '<div class="bg-green-100 px-3 py-1"> <p class="text-green-500 font-medium text-xs lg:text-sm">In Stock</p> </div>';
                                    } else {
                                        echo '<div class="bg-red-100 px-3 py-1"> <p class="text-red-500 font-medium text-xs lg:text-sm">Out of Stock</p> </div>';
                                    }
                                    ?>
                                </div>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) { ?>
                                    <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-black py-3 px-5 text-center text-sm lg:text-base">Buy Now</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-black py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>
                        </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="flex justify-center">
                <a href="products-view?cat_id=93" class="inline-block text-sm lg:text-base font-medium border border-black uppercase px-6 py-3 hover:bg-black hover:text-white transition-all duration-300 ease-in-out">
                    Explore All Products
                </a>
            </div>
        </div>
    </div>
</section>





<section class="py-24 relative bg-gray-50">
    <!-- <div class="container relative lg:absolute inset-0 py-24">
        <h2 class="text-[34px] leading-[38px] lg:text-[40px] lg:leading-[45px] mb-2 font-light">
            BEST SELLING<BR>PRODUCT THIS WEEK
        </h2>
        <p class="font-bold text-[20px] leading-[25px] mb-8">Timeless Elegance,<br>Modern Twist</p>
        <a href="products-view?cat_id=88" class="inline-block text-sm lg:text-base font-medium border border-black uppercase px-6 py-3 hover:bg-black hover:text-white transition-all duration-300 ease-in-out">Explore All Products</a>
    </div> -->
    <div class="overflow-hidden">
        <div class="container relative lg:right-[0px] lg:w-[100%]">
            <div class="flex justify-between items-center p-4 ">
                <h1 class="text-2xl lg:text-4xl font-light tracking-wider text-black uppercase">
                    OUR BAG COLLECTION
                </h1>
                <div class="flex gap-3">
                    <div class="swiper-button-prev-unique">
                        <img src="imgs/nav-btn.svg" alt="Previous" class="h-12 lg:h-14 rotate-[180deg]">
                    </div>
                    <div class="swiper-button-next-unique">
                        <img src="imgs/nav-btn.svg" alt="Next" class="h-12 lg:h-14">
                    </div>
                </div>
            </div>
            <div class="swiper product-slider mb-20 lg:mb-0">
                <div class="swiper-wrapper">
                    <?php
                    $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_ed_addtocart = 1 AND pro_mcat_id=87 AND pro_status != 0 ORDER BY pro_id DESC LIMIT 12") or die(mysqli_error($dbcon));
                    while ($row = mysqli_fetch_assoc($products)) { ?>
                        <div class="swiper-slide">
                        <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>">
                            <div class=" p-3">
                                <img src="imgs/products/<?php echo $row['pro_image'] ?>" title="<?php echo $row['pro_name'] ?>" alt="products" class="mb-5  w-full">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg line-clamp-1">
                                        <?= $row['pro_name']; ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-black rounded-full"></div>
                                </div>
                                <div class="flex justify-between items-center mb-5">
                                    <?php
                                    if ($row['pro_discount'] > 0) {
                                        $discount = ($row['pro_price'] * $row['pro_discount']) / 100; ?>
                                        <div class="flex flex-col relative">
                                            <p class="text-xs absolute top-[-16px] "><del><?php echo $row['pro_price']; ?> PKR</del></p>
                                            <h5 class="font-medium text-sm lg:text-base">
                                                <?php echo number_format($row['pro_price'] - $discount, 0); ?> PKR
                                            </h5>
                                        </div>
                                    <?php
                                    } else { ?>

                                        <h5 class="font-medium text-sm lg:text-base">
                                            <?php echo $row['pro_price']; ?> PKR
                                        </h5>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) {
                                        echo '<div class="bg-green-100 px-3 py-1"> <p class="text-green-500 font-medium text-xs lg:text-sm">In Stock</p> </div>';
                                    } else {
                                        echo '<div class="bg-red-100 px-3 py-1"> <p class="text-red-500 font-medium text-xs lg:text-sm">Out of Stock</p> </div>';
                                    }
                                    ?>
                                </div>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) { ?>
                                    <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-black py-3 px-5 text-center text-sm lg:text-base">Buy Now</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-black py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>
                        </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- <div class="absolute bottom-[-80px] lg:bottom-0 left-[50%] lg:left-[-100px] translate-x-[-50%] lg:translate-x-auto flex justify-center items-center gap-3">
                <div class="swiper-button-prev-unique">
                    <img src="imgs/nav-btn.svg" alt="" class="h-12 lg:h-14 rotate-[180deg]">
                </div>
                <div class="swiper-button-next-unique">
                    <img src="imgs/nav-btn.svg" alt="" class="h-12 lg:h-14">
                </div>
            </div> -->

            <div class="flex justify-center">
                <a href="products-view?cat_id=88" class="inline-block text-sm lg:text-base font-medium border border-black uppercase px-6 py-3 hover:bg-black hover:text-white transition-all duration-300 ease-in-out">
                    Explore All Products
                </a>
            </div>
        </div>
    </div>
</section>



<section class="relative">
    <img src="imgs/center-img-pc.jpg" class="hidden lg:block w-full" alt="">
    <img src="imgs/center-img-mbl.jpg" class="block lg:hidden w-full" alt="">
    <div class="absolute inset-0 bg-gradient-to-b from-black/[0.2] to-transparent"></div>
    <!-- <div class="container absolute bottom-16 inset-x-0 text-white text-center">
        <h2 class="text-[34px] leading-[38px] lg:text-[40px] lg:leading-[45px] mb-2 text-center font-light">
            ADVANCED DESIGN
        </h2>
        <p class="font-bold text-[20px] leading-[25px] mb-8">Timeless Elegance,<br>Modern Twist</p>
        <a href="" class="inline-block text-sm lg:text-base font-medium border border-white uppercase px-8 py-3 hover:bg-white hover:text-black transition-all duration-300 ease-in-out">buy now</a>
    </div> -->
</section>

<section class="bg-gray-50 ">
    <div class="container pb-16 pt-10">
        <!-- <div class="mb-12 text-center">
            <h2 class="text-[34px] leading-[38px] lg:text-[40px] lg:leading-[45px] mb-2 text-center font-light">
                Fitness Product
            </h2>
            <p class="font-bold text-lg">Select you desired fitness product</p>
        </div> -->
        <div class="flex justify-between items-center p-4 ">
                <h1 class="text-2xl lg:text-4xl font-light tracking-wider text-black uppercase">
                Fitness Product
                </h1>
                <!-- <div class="flex gap-3">
                    <div class="swiper-button-prev-unique">
                        <img src="imgs/nav-btn.svg" alt="Previous" class="h-12 lg:h-14 rotate-[180deg]">
                    </div>
                    <div class="swiper-button-next-unique">
                        <img src="imgs/nav-btn.svg" alt="Next" class="h-12 lg:h-14">
                    </div>
                </div> -->
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mb-12">
            <?php
            $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE  pro_ed_addtocart = 1 AND pro_mcat_id=89 AND pro_status != 0 ORDER BY pro_id DESC LIMIT 12") or die(mysqli_error($dbcon));
            while ($row = mysqli_fetch_assoc($products)) {
                $pro_cat_id = $row['pro_cat_id']; ?>
                
                <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>">
                <div class="p-3 ">
                    <img src="imgs/products/<?php echo $row['pro_image'] ?>" title="<?php echo $row['pro_name'] ?>" alt="products" class="mb-5 ">
                    <div class="mb-5">
                        <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-xl line-clamp-1">
                            <?php echo $row['pro_name']; ?>
                        </h4>
                        <p class="text-sm text-gray-600 mb-2">
                            <?php
                            $category = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_id = '$pro_cat_id'") or die(mysqli_error($dbcon));
                            $catRow = mysqli_fetch_assoc($category);
                            echo $catRow['ct_name'];
                            ?>
                        </p>
                        <div class="w-[50px] h-[3px] bg-black rounded-full"></div>
                    </div>
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-3 lg:gap-0 mb-5">
                        <?php
                        if ($row['pro_discount'] > 0) {
                            $discount = ($row['pro_price'] * $row['pro_discount']) / 100; ?>
                            <div class="flex flex-col relative">
                                <p class="text-xs absolute top-[-16px] "><del><?php echo $row['pro_price']; ?> PKR</del></p>
                                <h5 class="font-medium text-sm lg:text-base">
                                    <?php echo number_format($row['pro_price'] - $discount, 0); ?> PKR
                                </h5>
                            </div>
                        <?php
                        } else { ?>
                            <h5 class="font-medium text-sm lg:text-base">
                                PKR <?php echo $row['pro_price']; ?> Rs
                            </h5>
                        <?php
                        }
                        ?>
                        <?php
                        if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) {
                            echo '<div class="bg-green-100 px-3 py-1"> <p class="text-green-500 font-medium text-xs lg:text-sm">In Stock</p> </div>';
                        } else {
                            echo '<div class="bg-red-100 px-3 py-1"> <p class="text-red-500 font-medium text-xs lg:text-sm">Out of Stock</p> </div>';
                        }
                        ?>
                    </div>
                    <!-- <?php
                    if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) { ?>
                        <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                            <div class="text-white bg-black py-2 lg:py-3 px-3 lg:px-5 text-center text-sm lg:text-base">Buy Now</div>
                        </a>
                    <?php
                    } else { ?>
                        <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                            <div class="text-white bg-black py-2 lg:py-3 px-3 lg:px-5 text-center text-sm lg:text-base">More Details</div>
                        </a>
                    <?php
                    }
                    ?> -->
                </div>
                </a>
            <?php
            }
            ?>
        </div>
        <div class="flex justify-center">
            <a href="products-view?cat_id=90" class="inline-block text-sm lg:text-base font-medium border border-black uppercase px-6 py-3 hover:bg-black hover:text-white transition-all duration-300 ease-in-out">Explore All Fitness Products</a>
        </div>
    </div>
</section>

<!-- <div class="container pb-4 pt-10">
<h1 class="text-2xl lg:text-4xl font-light tracking-wider text-black uppercase">
                    FAQ'S
                </h1>
        </div>
<?php
$sql = mysqli_query($dbcon, "SELECT * FROM ptcs_faqs");
if (mysqli_num_rows($sql) > 0) {
    echo '<div class="flex justify-center">'; // Wrapper to center the content
    echo '<div class="w-full max-w-4xl p-6">'; // Added max-width for centering

    echo '<div class="space-y-2">';

    // Loop through the data and display each question and answer
    while ($row = mysqli_fetch_assoc($sql)) {
        $question = htmlspecialchars($row['faq_question']);
        $answer = $row['faq_answer'];

        echo '
        <div class="border p-4 cursor-pointer hover:bg-gray-100 transition-all duration-300" onclick="toggleFaq(this)">
            <div class="flex justify-between items-center">
                <p class="font-bold text-xl">' . $question . '</p>
                <span class="text-4xl font-thin">+</span>
            </div>
            <div class="faq-answer hidden mt-2 p-2 bg-gray-100 border-t border-gray-300 rounded text-gray-700">
                ' . $answer . '
            </div>
        </div>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>'; // Close the wrapper div
} else {
    echo '<div class="flex justify-center"><p class="p-6">No FAQs available at the moment.</p></div>';
}
// Close the database connection
?> -->

<script>
function toggleFaq(element) {
    // Get the answer section within the clicked element
    const answer = element.querySelector('.faq-answer');
    const icon = element.querySelector('span');

    // Toggle the visibility of the answer
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        answer.classList.add('bg-white', 'shadow-md'); // Add extra styling for the open state
        icon.textContent = '−'; // Change icon to minus
        element.classList.add('bg-gray-50'); // Add background color to the container
    } else {
        answer.classList.add('hidden');
        answer.classList.remove('bg-white', 'shadow-md'); // Remove extra styling
        icon.textContent = '+'; // Change icon to plus
        element.classList.remove('bg-gray-50'); // Remove background color
    }
}
</script>



<?php include 'libs/footer.php' ?>