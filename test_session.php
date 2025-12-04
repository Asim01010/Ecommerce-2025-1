<section class="my-20">
    <div>
        <h2 class="text-center text-3xl font-semibold tracking-wider">YOU MAY ALSO LIKE</h2>
    </div>
    <div class="container mx-auto mt-10">
        <div class="swiper trending-slider">
            <div class="swiper-wrapper">
                <?php
                $pro_cat_id = $product['pro_cat_id'];
                $getSuggestedProducts = mysqli_query($dbcon , "SELECT * FROM sm_products WHERE pro_cat_id = '$pro_cat_id' AND pro_status != 0 AND pro_id != '$pro_id' ");
                while($suggestedProducts = mysqli_fetch_assoc($getSuggestedProducts)){
                    ?>
                <div class="swiper-slide group/card relative">

                    <div>
                        <div class="relative overflow-hidden">
                            <!-- <img src="imgs/girl.webp" alt=""
                                class="absolute top-0 group-hover/card:opacity-0 transition-opacity duration-1000" /> -->
                            <a href="product-details2.php?pro_id=<?= $suggestedProducts['pro_id']  ?>">
                                <img src="imgs/products/<?= $suggestedProducts['pro_image'] ?>" alt=""></a>
                            <div
                                class="absolute bottom-0 bg-black/30 w-full py-1 translate-y-10 group-hover/card:translate-y-0 transition-translate duration-500">
                                <div class="flex justify-center gap-1 item-center w-full ">
                                    <div
                                        class="h-8 hover:bg-black  w-8 text-white border border-white hover:border-black flex justify-center items-center">
                                        <p>1</p>
                                    </div>
                                    <div
                                        class="h-8 hover:bg-black w-8 text-white border border-white hover:border-black flex justify-center items-center">
                                        <p>20</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-sm text-gray-600 mt-2 flex justify-between items-center">
                            <a href="product-details2.php?pro_id=<?= $suggestedProducts['pro_id']  ?>">Ready To Wear</a>
                            <i class="bi bi-suit-heart"></i>
                        </div>
                        <div class="mt-2">
                            <h1 class="uppercase leading-[1]"><a
                                    href="product-details2.php?pro_id=<?= $suggestedProducts['pro_id']  ?>"><?= $suggestedProducts['pro_name'] ?></a>
                            </h1>
                        </div>
                        <div class="mt-1 flex justify-between items-center">
                            <div>
                                <?php
    $price = $suggestedProducts['pro_price'];
    $discount = $suggestedProducts['pro_discount'];

    if ($discount > 0) {
        $finalPrice = $price - ($price * $discount / 100);
        ?>

                                <del class="text-sm uppercase">PKR <?= number_format($price) ?></del>

                                <p class="text-sm uppercase text-red-400 -mt-2">
                                    PKR <?= number_format($finalPrice) ?>
                                </p>
                                <?php } else { ?>
                                <!-- No Discount -->
                                <p class="text-sm uppercase text-red-400">
                                    PKR <?= number_format($price) ?>
                                </p>
                                <?php } ?>
                            </div>



                            <div
                                class="relative inline-block opacity-0 invisible transition-all duration-300 group-hover/card:opacity-100 group-hover/card:visible">


                                <a href="product-details2.php?pro_id=<?= $suggestedProducts['pro_id'] ?>"
                                    class="group bg-black py-1 px-6 text-white uppercase text-[10px] rounded-full overflow-hidden relative flex items-center justify-center h-8 w-32">


                                    <span class="block transform transition-all duration-300 group-hover:translate-y-6">
                                        Quick Shop
                                    </span>


                                    <span
                                        class="absolute transform translate-y-8 transition-all duration-300 group-hover:translate-y-0">
                                        <i class="bi bi-bag-plus text-white text-sm"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>



                    <!-- <div class="swiper-slide">B</div> -->
                </div>
                <?php }
                ?>


            </div>
        </div>
</section>





<!-- <section class="my-20">
    <div>
        <h2 class="text-center text-3xl font-semibold tracking-wider">RECENTLY VIEWED PRODUCTS</h2>
    </div>
    <div class="container mx-auto mt-10">
        <div class="swiper trending-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide group/card relative">
                    <div>
                        <div class="relative overflow-hidden">
                            <img src="imgs/girl.webp" alt=""
                                class="absolute top-0 group-hover/card:opacity-0 transition-opacity duration-1000" />
                            <img src="imgs/girl2.webp" alt="">
                            <div
                                class="absolute bottom-0 bg-black/30 w-full py-1 translate-y-10 group-hover/card:translate-y-0 transition-translate duration-500">
                                <div class="flex justify-center gap-1 item-center w-full ">
                                    <div
                                        class="h-8 hover:bg-black  w-8 text-white border border-white hover:border-black flex justify-center items-center">
                                        <p>1</p>
                                    </div>
                                    <div
                                        class="h-8 hover:bg-black w-8 text-white border border-white hover:border-black flex justify-center items-center">
                                        <p>20</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-sm text-gray-600 mt-2 flex justify-between items-center">
                            <p>Ready To Wear</p>
                            <i class="bi bi-suit-heart"></i>
                        </div>
                        <div class="mt-2">
                            <h1 class="uppercase leading-[1]">peach-dobby-1 piece (W25se1001)</h1>
                        </div>
                        <div class="mt-1 flex justify-between items-center">
                            <div>
                                <del class="text-sm uppercase">pkr 4,780</del>
                                <p class="text-sm uppercase text-red-400 -mt-2">pkr 2390</p>
                            </div>


                            <div
                                class="relative inline-block opacity-0 invisible transition-all duration-300 group-hover/card:opacity-100 group-hover/card:visible">


                                <a href="#"
                                    class="group bg-black py-1 px-6 text-white uppercase text-[10px] rounded-full overflow-hidden relative flex items-center justify-center h-8 w-32">


                                    <span class="block transform transition-all duration-300 group-hover:translate-y-6">
                                        Quick Shop
                                    </span>


                                    <span
                                        class="absolute transform translate-y-8 transition-all duration-300 group-hover:translate-y-0">
                                        <i class="bi bi-bag-plus text-white text-sm"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> -->