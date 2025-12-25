<?php
include __DIR__ . '/../libs/dbconfig.php';

$discount = isset($_POST['discount']) ? intval($_POST['discount']) : 1;

$query = "SELECT * FROM sm_products WHERE pro_discount = '$discount'";
$result = mysqli_query($dbcon, $query);

if (mysqli_num_rows($result) > 0) {
?>
<!-- ✅ Swiper Container -->
<div class="swiper shop-slider">
    <div class="swiper-wrapper">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <!-- Product Card -->
        <div onclick="window.location.href='product-details2.php?pro_id=<?= $row['pro_id'] ?>'"
            class="swiper-slide group/card cursor-pointer bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100">

            <!-- Image -->
            <div class="relative overflow-hidden rounded-t-2xl">
                <img src="imgs/products/<?= $row['pro_image'] ?>" alt="<?= htmlspecialchars($row['pro_name']) ?>"
                    class="w-full h-64 sm:h-72 object-cover transition-transform duration-700 group-hover/card:scale-110" />
                <span
                    class="absolute bottom-2 right-2 px-2 py-1 text-xs font-semibold rounded-full 
                        <?php echo ($row['pro_ava_qty'] > 0) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
                    <?php echo ($row['pro_ava_qty'] > 0) ? 'In Stock' : 'Out of Stock'; ?>
                </span>
            </div>

            <!-- Info -->
            <div class="p-4">
                <div class="text-xs sm:text-sm text-gray-600 flex justify-between items-center">
                    <p>Ready To Wear</p>
                    <i class="bi bi-suit-heart text-gray-500 hover:text-red-600 transition"></i>
                </div>

                <h1
                    class="uppercase text-sm sm:text-base font-semibold mt-1 text-gray-800 line-clamp-1 leading-tight group-hover/card:text-pri transition">
                    <?= $row['pro_name'] ?>
                </h1>

                <div class="mt-2 flex justify-between items-center">
                    <div>
                        <del class="text-xs text-gray-400 block">PKR <?= number_format($row['pro_price']) ?></del>
                        <p class="text-sm font-semibold text-red-500 -mt-1">
                            PKR <?= number_format($row['pro_discount']) ?>
                        </p>
                    </div>
                    <div
                        class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded-full shadow-md">
                        <?= $row['pro_discount'] ?>% OFF
                    </div>
                    <!-- Quick Shop (hover only) -->
                    <div
                        class="opacity-0 invisible transition-all duration-300 group-hover/card:opacity-100 group-hover/card:visible">
                        <div
                            class="bg-black py-1 px-5 text-white uppercase text-[10px] rounded-full overflow-hidden flex items-center justify-center h-8 w-28">
                            <span
                                class="block transform transition-all duration-300 group-hover:translate-y-6">Quick</span>
                            <span
                                class="absolute transform translate-y-8 transition-all duration-300 group-hover:translate-y-0">
                                <i class="bi bi-bag-plus text-white text-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

    <!-- Optional Swiper Pagination -->
    <div class="swiper-pagination mt-4"></div>
</div>

<!-- ✅ Swiper Responsive JS -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".shop-slider", {
        spaceBetween: 20,
        grabCursor: true,
        loop: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.3,
                spaceBetween: 12
            }, // 📱 mobile
            480: {
                slidesPerView: 1.7,
                spaceBetween: 14
            }, // small phones
            640: {
                slidesPerView: 2,
                spaceBetween: 16
            }, // tablets
            768: {
                slidesPerView: 2.5,
                spaceBetween: 18
            }, // medium
            1024: {
                slidesPerView: 3,
                spaceBetween: 20
            }, // large
            1280: {
                slidesPerView: 3,
                spaceBetween: 24
            } // extra large
        }
    });
});
</script>
<?php
} else {
    echo "<p class='text-center text-gray-500 py-10'>No products found for this discount.</p>";
}
?>