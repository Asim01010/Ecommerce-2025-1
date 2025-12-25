<?php include 'libs/header.php' ?>

<?php
if (isset($_GET['cat_id'])) {
    $pro_cat_id = $_GET['cat_id'];
    $category = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE  ct_id='$pro_cat_id'") or die(mysqli_error($dbcon));
    if ($catrow = mysqli_fetch_assoc($category)) {
        $cat_name = $catrow['ct_name'];
    }
?>
    <section class="bg-pri">
        <div class="container py-4">
            <h2 class="text-white font-bold text-center text-2xl lg:text-3xl"><?php echo $cat_name ?></h2>
        </div>
    </section>

    <section>
        <div class="container py-16">
            <?php
            $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_cat_id='$pro_cat_id' AND pro_status != 0 ORDER BY pro_id DESC") or die(mysqli_error($dbcon));
            $count = mysqli_num_rows($products);
            if ($count > 0) { ?>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
                    <?php
                    while ($row = mysqli_fetch_assoc($products)) {
                        if ($row['pro_ed_addtocart'] == 2) { ?>
                            <div class="border p-5">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg">
                                        <?php
                                        if (strlen($row['pro_name']) >= 22) {
                                            echo substr($row['pro_name'], 0, 22) . " ....";
                                        } else {
                                            echo $row['pro_name'];
                                        }
                                        ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-pri rounded-full"></div>
                                </div>
                                <a title="<?php echo $row['pro_name'] ?>" href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>"><img src="imgs/products/<?php echo $row['pro_image'] ?>" alt="products" class="mb-5"></a>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0) { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">Get Quote</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>

                        <?php
                        } else { ?>
                            <a title="<?php echo $row['pro_name'] ?>" href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>">
                            <div class="border p-5">
                                <img src="imgs/products/<?php echo $row['pro_image'] ?>" alt="products" class="mb-5">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg">
                                        <?php
                                        if (strlen($row['pro_name']) >= 22) {
                                            echo substr($row['pro_name'], 0, 22) . " ....";
                                        } else {
                                            echo $row['pro_name'];
                                        }
                                        ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-pri rounded-full"></div>
                                </div>
                                <div class="flex justify-between items-center mb-5">

                                    <!-- <?php
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
                                    ?> -->

                                    <?php
                                    if ($row['pro_status'] == 1) {
                                        echo '<div class="bg-green-100 px-3 py-1"> <p class="text-green-500 font-medium text-xs lg:text-sm">In Stock</p> </div>';
                                    } else {
                                        echo '<div class="bg-red-100 px-3 py-1"> <p class="text-red-500 font-medium text-xs lg:text-sm">Out of Stock</p> </div>';
                                    }
                                    ?>
                                </div>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0) { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">Buy Now</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>
                        </a>
                    <?php
                        }
                    }
                    ?>
                </div>
            <?php
            } else { ?>
                <div class="h-[60vh] flex flex-col justify-center items-center">
                    <img src="imgs/logo-black.png" class="h-36" alt="">
                    <h4 class="font-medium text-2xl mb-5">No item available in this category!</h4>
                    <a href="./" class="text-white bg-pri py-3 px-5 text-center">Continue Exploring</a>
                </div>
            <?php
            }
            ?>

        </div>
    </section>
<?php
} else { ?>
    <section class="bg-pri">
        <div class="container py-4">
            <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">Products</h2>
        </div>
    </section>

    <section>
        <div class="container py-16">
            <?php
            $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE  pro_status != 0 ORDER BY pro_id DESC") or die(mysqli_error($dbcon));
            $count = mysqli_num_rows($products);
            if ($count > 0) { ?>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
                    <?php
                    while ($row = mysqli_fetch_assoc($products)) { 
                        if ($row['pro_ed_addtocart'] == 2) { ?>
                            <div class="border p-5">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg">
                                        <?php
                                        if (strlen($row['pro_name']) >= 22) {
                                            echo substr($row['pro_name'], 0, 22) . " ....";
                                        } else {
                                            echo $row['pro_name'];
                                        } 
                                        ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-pri rounded-full"></div>
                                </div>
                                <a title="<?php echo $row['pro_name'] ?>" href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>"><img src="imgs/products/<?php echo $row['pro_image'] ?>" alt="products" class="mb-5"></a>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0) { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">Get Quote</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>

                        <?php
                        } else { ?>
                            <a title="<?php echo $row['pro_name'] ?>" href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>">
                            <div class="border p-5">
                                <img src="imgs/products/<?php echo $row['pro_image'] ?>" alt="products" class="mb-5">
                                <div class="mb-5">
                                    <h4 title="<?php echo $row['pro_name'] ?>" class="font-medium text-base lg:text-lg">
                                        <?php
                                        if (strlen($row['pro_name']) >= 22) {
                                            echo substr($row['pro_name'], 0, 22) . " ....";
                                        } else {
                                            echo $row['pro_name'];
                                        }
                                        ?>
                                    </h4>
                                    <div class="w-[50px] h-[3px] bg-pri rounded-full"></div>
                                </div>
                                <div class="flex justify-between items-center mb-5">

                                    <!-- <?php
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
                                    ?> -->

                                    <?php
                                    if ($row['pro_status'] == 1) {
                                        echo '<div class="bg-green-100 px-3 py-1"> <p class="text-green-500 font-medium text-xs lg:text-sm">In Stock</p> </div>';
                                    } else {
                                        echo '<div class="bg-red-100 px-3 py-1"> <p class="text-red-500 font-medium text-xs lg:text-sm">Out of Stock</p> </div>';
                                    }
                                    ?>
                                </div>
                                <!-- <?php
                                if ($row['pro_ava_qty'] > 0) { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">Buy Now</div>
                                    </a>
                                <?php
                                } else { ?>
                                    <a href="product-details.php?pro_id=<?php echo $row['pro_id'] ?>" class="w-full">
                                        <div class="text-white bg-pri py-3 px-5 text-center text-sm lg:text-base">More Details</div>
                                    </a>
                                <?php
                                }
                                ?> -->
                            </div>
                        </a>
                    <?php
                        }
                    }
                    ?>
                </div>
            <?php
            } else { ?>
                <div class="h-[60vh] flex flex-col justify-center items-center">
                    <img src="imgs/logo-black.png" class="h-36" alt="">
                    <h4 class="font-medium text-2xl mb-5">No item available in this category!</h4>
                    <a href="./" class="text-white bg-pri py-3 px-5 text-center">Continue Exploring</a>
                </div>
            <?php
            }
            ?>

        </div>
    </section>
<?php
}
?>


<?php include 'libs/footer.php' ?>