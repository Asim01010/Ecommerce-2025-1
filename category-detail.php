<?php

include 'libs/header.php';

if(isset($_GET['ct_id'])){
    $pro_cat_id = $_GET['ct_id'];
 $getCategory = mysqli_query(
    $dbcon,
    "SELECT 
        c.ct_id, 
        c.ct_name, 
        c.ct_parent, 
        p.ct_name AS parent_name
     FROM sm_categories c
     LEFT JOIN sm_categories p ON c.ct_parent = p.ct_id
     WHERE c.ct_id = '$pro_cat_id'"
) or die(mysqli_error($dbcon));

if ($catrow = mysqli_fetch_assoc($getCategory)) {
    $cat_name = $catrow['ct_name'];
     $parent_id   = $catrow['ct_parent'];
    $parent_name = $catrow['parent_name'] ?? '';
}


        $getProducts = mysqli_query($dbcon , "SELECT * FROM sm_products WHERE pro_cat_id = '$pro_cat_id' AND pro_status !=0 ORDER BY pro_id DESC") or die();




}


?>

<section class="mt-10">

    <div class="container mx-auto flex justify-between items-center mb-10 ">
        <button onclick="history.back()"
            class="border border-black  rounded-lg py-1 px-6 flex items-center gap-1 hover:bg-gray-400 hover:border-gray-400 hover:text-white">
            <i class="bi bi-arrow-return-left "></i>Go Back
        </button>
        <p><?= mysqli_num_rows($getProducts) ?> Products</p>
    </div>
    <div class="container mx-auto flex-col  gap-3 space-y-2  justify-between items-center pb-8 border-b border-black">
        <!-- Filter Button -->
        <div class="relative">
            <div class="relative inline-block">
                <!-- Filters Button -->
                <div class="relative inline-block">
                    <!-- Filters Button -->
                    <div id="filterBtn"
                        class="filterPrice_btn flex items-center gap-2 cursor-pointer w-[150px] bg-white border px-4 py-2 rounded-lg shadow-sm hover:bg-red-800 hover:text-white transition">
                        <i class="bi bi-funnel-fill"></i>
                        <span class="font-medium">Filters</span>
                    </div>
                    <div class="text-center">
                        <h2 class="text-xl font-semibold uppercase tracking-wider text-center ">
                            <?php if(!empty($parent_name)): ?>
                            <?= $parent_name ?> -
                            <?php endif; ?>
                            <?= $cat_name ?>
                        </h2>

                    </div>
                </div>
                <!-- <div class="uppercase tracking-wider flex items-center gap-4">
            sort by<i class="bi bi-arrow-bar-down"></i>
        </div> -->
            </div>

            <div class="container mx-auto flex justify-center items-center w-full ">
                <div>
                    <div class="bg-gray-300 p-2 font-semibold flex items-center gap-4 mt-4 rounded-xl text-center ">
                        <?php
                // $paertCatID = $catrow['ct_id'];
               $getOtherCategotiesOfParentCategory = mysqli_query($dbcon , "SELECT * FROM sm_categories WHERE ct_parent = $parent_id ") or die();

               while($categoryRow = mysqli_fetch_assoc($getOtherCategotiesOfParentCategory)){
                    ?>
                        <a class="border-b border-transparent hover:border-white"
                            href="category-detail.php?ct_id=<?= $categoryRow['ct_id'] ?>"><?= $categoryRow['ct_name'] ?></a>
                        <!-- <a>3 Pc</a>
                <a>Embroidered</a> -->
                        <?php  } ?>


                    </div>
                </div>
            </div>
            <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt sunt voluptatum error nulla consequatur cum id voluptatem perspiciatis consequuntur dicta ullam nihil quod quis, modi praesentium mollitia in eum officia ex necessitatibus neque tenetur iusto quos. Dicta tenetur eum, quae fugit beatae totam aliquam nam modi iusto! Voluptate qui officia mollitia excepturi deserunt sapiente commodi accusantium, maxime harum quasi. Nulla reprehenderit harum dolores explicabo nisi architecto error iure voluptatum obcaecati, ex cumque. Dolorem dignissimos dolorum molestias harum. Vel quidem aliquid in, dolor delectus vitae itaque dolores architecto ut consectetur qui eos deserunt magni soluta magnam consequuntur adipisci corporis sequi commodi. -->
            <div id="filterDropdown"
                class="drop_downfilter  absolute top-10 left-0 mt-2 w-64 bg-white rounded-xl shadow-lg border border-gray-200 hidden z-[9999] p-4">
                <h2 class="text-lg font-semibold mb-3 border-b pb-2">Filter by Price</h2>

                <label for="priceRange" class="block text-gray-700 font-medium mb-2">Price Range</label>

                <input id="priceRange" type="range" min="0" max="1000" step="10" value="500"
                    class="w-full accent-red-800 cursor-pointer" />

                <div class="mt-2 text-gray-600 text-sm">
                    Selected: <span class="font-medium text-black">$<span id="rangeValue">500</span></span>
                </div>

                <div class="flex justify-between text-gray-500 text-sm mt-3">
                    <span>$0.00</span>
                    <span>$1000.00</span>
                </div>

                <button id="applyFilterBtn"
                    class="w-full mt-4 bg-red-800 text-white hover:bg-red-700 transition py-2 rounded-lg uppercase font-medium tracking-wide">
                    Apply Filter
                </button>
            </div>
        </div>
        <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima aliquam atque quia praesentium modi? Doloremque quo consectetur iste natus, distinctio ad blanditiis adipisci non quod ab magnam, sunt reiciendis! Quod doloremque in dolor reiciendis nostrum cumque iste maiores dicta inventore placeat laborum eaque quae modi repellat voluptas, cum illo tempora repellendus itaque rerum similique optio dolores corporis. Ratione at iure commodi praesentium et. Similique reprehenderit beatae facilis, molestiae at voluptatem quae excepturi necessitatibus incidunt, modi veritatis omnis aliquid alias repellat ratione doloribus? Ipsam, quam, quidem incidunt necessitatibus ducimus eius saepe in odit facilis quia aliquid, vero quas explicabo consequuntur quos? -->




        <div id="productContainer"
            class="container mx-auto px-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 my-10">
            <?php
        while($row = mysqli_fetch_assoc($getProducts)){
            ?>
            <div class="group/card relative">
                <div>
                    <div class="relative overflow-hidden">
                        <!-- <img src="imgs/products/<?= $row['pro_image'] ?>" alt=""
                        class="absoute inset-0 group-hover/card:opacity-0 transition-opacity duration-1000" /> -->
                        <a href="product-details2.php?pro_id=<?= $row['pro_id']  ?>"><img
                                src="imgs/products/<?= $row['pro_image'] ?>" alt=""></a>
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
                        <a href="product-details2.php?pro_id=<?= $row['pro_id']  ?>">
                            Ready To Wear
                        </a>
                        <!-- <i class="bi bi-suit-heart"></i> -->
                    </div>
                    <div class="mt-2">
                        <h1 class="uppercase leading-[1]"><a
                                href="product-details2.php?pro_id=<?= $row['pro_id']  ?>"><?= $row['pro_name'] ?>
                        </h1></a>
                    </div>
                    <div class="mt-1 flex justify-between items-center">
                        <div>
                            <del class="text-sm uppercase">pkr 4,780</del>
                            <p class="text-sm uppercase text-red-400 -mt-2">pkr <?= $row['pro_price'] ?></p>
                        </div>


                        <div
                            class="relative inline-block opacity-0 invisible transition-all duration-300 group-hover/card:opacity-100 group-hover/card:visible">


                            <a href="product-details2.php?pro_id=<?= $row['pro_id'] ?>"
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
            <?php }
        ?>
        </div>





</section>


<?php

include 'libs/footer.php';
?>
<script>
$(document).ready(function() {
    // Toggle dropdown when clicking the filter button
    $('.filterPrice_btn').on('click', function(e) {
        e.stopPropagation(); // stop event from bubbling
        $('.drop_downfilter').fadeToggle(200); // smooth open/close
    });

    // Close dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.filterPrice_btn, .drop_downfilter').length) {
            $('.drop_downfilter').fadeOut(200);
        }
    });

    // Update range value text in real-time
    $('#priceRange').on('input', function() {
        $('#rangeValue').text($(this).val());
    });
});
</script>