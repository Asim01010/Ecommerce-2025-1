<?php

include 'libs/header.php';

if(isset($_GET['pro_id'])){
    $pro_id = $_GET['pro_id'];
    $getProducts = mysqli_query($dbcon , "SELECT * FROM sm_products WHERE pro_id = '$pro_id'") or die(mysqli_error($dbcon));
    $product = mysqli_fetch_assoc($getProducts);
}

?>

<style>
.dynamic-content {

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: 14px;
        font-weight: bold;
    }
}

/* Advanced Zoom Image */
.zoom-image-advanced {
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform-origin: center center;
}

.zoom-overlay {
    /* overlay is transparent but captures mouse */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0);
    cursor: crosshair;
    z-index: 10;
}
</style>
<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-10 grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
    <!-- Left Side: Images -->
    <div class="flex flex-col sm:flex-row gap-4 items-start max-h-full">
        <!-- Thumbnail Images -->
        <div class="flex sm:flex-col gap-3 w-full sm:w-24">
            <div class="relative group cursor-pointer">
                <input type="hidden" id="pro_id" value="<?php echo $product['pro_id'] ?>">
                <input type="hidden" id="pro_image" value="<?php echo $product['pro_image'] ?>">
                <img src="imgs/products/<?= $product['pro_image'] ?>" alt=""
                    class="h-24 w-24 object-cover border rounded-md mx-auto sm:mx-0">
                <div class="absolute inset-0 bg-white/40 opacity-0 group-hover:opacity-100 transition"></div>
            </div>
        </div>

        <!-- Main Image -->
        <div class="flex-1 relative overflow-hidden" id="advancedZoom">
            <img src="imgs/products/<?= $product['pro_image'] ?>" alt=""
                class="h-[300px] sm:h-[400px] md:h-[500px] lg:h-[550px] w-full object-cover border rounded-md zoom-image-advanced"
                id="advancedImage">
            <div class="zoom-overlay absolute inset-0 cursor-crosshair z-10" id="zoomOverlay"></div>
        </div>
    </div>

    <!-- Right Side: Product Info -->
    <div class="space-y-4 mt-6 md:mt-0">
        <p class="text-gray-600 text-sm sm:text-base"></p>

        <!-- Title and Wishlist -->
        <div class="flex flex-wrap justify-between items-center gap-2">
            <h1 class="font-semibold text-black text-xl sm:text-2xl"><?= $product['pro_name'] ?></h1>
            <input type="hidden" id="pro_name" value="<?php echo $product['pro_name'] ?>">

            <div class="relative group inline-block">
                <button
                    class="bi bi-suit-heart text-xl sm:text-2xl cursor-pointer addtoWishlist text-gray-500 transition"
                    data-id="<?= $product['pro_id'] ?>" data-name="<?= $product['pro_name'] ?>"
                    data-image="<?= $product['pro_image'] ?>" data-price="<?= $product['pro_price'] ?>">
                </button>

                <div
                    class="absolute left-1/2 -translate-x-1/2 -top-10 bg-gray-900 text-white text-xs sm:text-sm px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-300 whitespace-nowrap shadow-lg">
                    Add to Wishlist
                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full w-0 h-0 border-l-8 border-r-8 border-t-8 border-transparent border-t-gray-900">
                    </div>
                </div>
            </div>
        </div>

        <!-- Price -->
        <div class="flex flex-wrap items-center gap-3 sm:gap-4">
            <?php
            $price = $product['pro_price'];
            $discount = $product['pro_discount'];
            if ($discount > 0) {
                $finalPrice = $price - ($price * $discount / 100);
                if(!number_format($finalPrice) == number_format($price) ){
            ?>
            <del class="text-lg sm:text-xl text-black">PKR <?= number_format($price) ?></del>
            <?php } ?>
            <p class="text-lg sm:text-xl text-red-500">PKR <?= number_format($finalPrice) ?></p>
            <?php } else { ?>
            <p class="text-lg sm:text-xl text-red-500" id="pro_price">PKR <?= number_format($price) ?></p>
            <?php } ?>
        </div>

        <!-- <p class="text-gray-500 text-sm sm:text-base">Item: 3piece</p> -->
        <span
            class="mt-3 px-4 py-2 text-xs font-semibold rounded-2 
                        <?php echo ($product['pro_ava_qty'] > 0) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
            <?php echo ($product['pro_ava_qty'] > 0) ? 'In Stock' : 'Out of Stock'; ?>
        </span>
        <!-- Colors -->
        <div class="space-y-2">
            <p class="text-sm sm:text-base">Color:
                <span id="colorName" class="font-semibold text-black"></span>
            </p>
            <div class="flex flex-wrap items-center gap-3 sm:gap-4 colors">
                <?php
                $getProductColor = mysqli_query($dbcon , "SELECT * FROM sm_products_colors WHERE pc_pro_id='$pro_id' ORDER BY pc_id ASC") or die(mysqli_error($dbcon));
                while($colorRow = mysqli_fetch_assoc($getProductColor)){
                ?>
                <div class="border-2 border-gray-700 p-[2px] h-8 w-8 rounded-full color-option cursor-pointer"
                    data-color="<?= $colorRow['pc_name'] ?>" data-color-code="<?= $colorRow['pc_code'] ?>">
                    <div class="h-full w-full rounded-full" style="background-color: <?= $colorRow['pc_code'] ?>"></div>
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- Quantity + Add to Cart -->
        <div class="flex flex-wrap items-center gap-3 sm:gap-4 mt-4">
            <div class="border border-gray-400  flex overflow-hidden items-center rounded-md">
                <button class="decrease bg-gray-100 py-2 px-4 active:bg-gray-200"><i class="bi bi-dash"></i></button>
                <input readonly id="pro_qty" class="count w-[40px] text-center py-2 " value="1" min="1" />
                <button class="increase py-2 px-4 bg-gray-100 active:bg-gray-200"><i class="bi bi-plus-lg"></i></button>
            </div>

            <button
                class="uppercase bg-black py-2 px-6 sm:px-8 text-white cursor-pointer addtocart text-sm sm:text-base <?php echo ($product['pro_ava_qty'] > 0) ? 'bg-black text-white' : 'bg-gray-300 text-white'; ?>"
                data-id="<?= $product['pro_id'] ?>" data-name="<?= $product['pro_name'] ?>"
                data-image="<?= $product['pro_image'] ?>" data-price="<?= $product['pro_price'] ?>"
                data-max="<?= $product['pro_max_qty'] ?>" data-color="No Color" data-color-code="" data-size="No Size"
                data-qty="1" data-ava-qty="<?= $product['pro_ava_qty'] ?>">
                <?php echo ($product['pro_ava_qty'] > 0) ? 'Add to Cart' : 'Out of Stock'; ?>
            </button>
        </div>

        <!-- Delivery Info -->
        <div class="space-y-2 mt-4">
            <div class="flex items-center gap-3 text-sm sm:text-base">
                <i class="bi bi-truck"></i>
                <p>2-3 working days nationwide</p>
            </div>
            <div class="flex items-center gap-3 text-sm sm:text-base">
                <i class="bi bi-airplane"></i>
                <p>5-7 working days international</p>
            </div>
        </div>

        <!-- Details -->
        <div class="py-6 border-y border-black mt-4">
            <details>
                <summary
                    class="font-bold flex items-center justify-between cursor-pointer text-sm sm:text-base list-none">
                    About The Product <i class="bi bi-arrow-down-short text-2xl"></i>
                </summary>
                <div class="mt-2 space-y-4 text-sm sm:text-base dynamic-content">
                    <?= htmlspecialchars_decode($product['pro_overview']) ?>
                </div>
            </details>
        </div>

        <div class="py-6 border-b border-black">
            <details>
                <summary
                    class="font-bold flex items-center justify-between cursor-pointer text-sm sm:text-base list-none">
                    Disclaimer <i class="bi bi-arrow-down-short text-2xl"></i>
                </summary>
                <div class="mt-2 space-y-4 text-sm sm:text-base">
                    <?= htmlspecialchars_decode($product['pro_size_guidline']) ?>
                </div>
            </details>
        </div>
    </div>
</section>



<!-- here you all comment the part -->


<div id="fixedBar"
    class="fixed translate-y-full z-[100] bg-white bottom-0 w-screen flex justify-center items-center py-3 shadow-[0_-4px_12px_rgba(0,0,0,0.08)] transition-all duration-500">

    <div class="flex gap-16 items-center">

        <!-- Product Image + Name + Price -->
        <div class="flex items-center gap-4">

            <!-- Image -->
            <div class="h-20 w-20 rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                <img src="imgs/products/<?= $product['pro_image'] ?>" alt="" class="object-cover w-full h-full">
            </div>

            <!-- Name + Price -->
            <div class="leading-tight space-y-1">
                <h1 class="font-semibold text-gray-600 text-sm"><?= $product['pro_name'] ?></h1>

                <div class="flex items-center gap-3">
                    <?php
                        $price = $product['pro_price'];
                        $discount = $product['pro_discount'];

                        if ($discount > 0) {
                            $finalPrice = $price - ($price * $discount / 100);
                    ?>
                    <del class="text-xs text-gray-500">PKR <?= number_format($price) ?></del>
                    <p class="text-sm text-red-500 font-medium">PKR <?= number_format($finalPrice) ?></p>
                    <?php } else { ?>
                    <p class="text-sm text-red-500 font-medium">PKR <?= number_format($price) ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Add to Cart Button -->
        <div>
            <button class="uppercase py-2 px-7 rounded-lg transition-all duration-300 addtocart text-sm sm:text-lg
                <?php echo ($product['pro_ava_qty'] > 0)
                    ? 'bg-black hover:bg-gray-900 text-white shadow-md'
                    : 'bg-gray-300 text-white cursor-not-allowed'; ?>" data-id="<?= $product['pro_id'] ?>"
                data-name="<?= $product['pro_name'] ?>" data-image="<?= $product['pro_image'] ?>"
                data-price="<?= $product['pro_price'] ?>" data-max="<?= $product['pro_max_qty'] ?>"
                data-color="No Color" data-color-code="" data-size="No Size" data-qty="1"
                data-ava-qty="<?= $product['pro_ava_qty'] ?>">

                <?php echo ($product['pro_ava_qty'] > 0)
                    ? '<i class="bi bi-bag-fill md:hidden"></i><span class="hidden md:block">Add To Cart</span>'
                    : 'Out of Stock'; ?>
            </button>
        </div>

    </div>
</div>

</div>


<script>
const fixedBar = document.querySelector("#fixedBar")

window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
        fixedBar.classList.remove("translate-y-full")
        fixedBar.classList.add("translate-y-0")
    } else {
        fixedBar.classList.remove("translate-y-0")
        fixedBar.classList.add("translate-y-full")
    }
})
// ========================
const zoomContainer = document.getElementById("advancedZoom");
const zoomImage = document.getElementById("advancedImage");
const zoomOverlay = document.getElementById("zoomOverlay");

zoomOverlay.addEventListener("mousemove", (e) => {
    const {
        left,
        top,
        width,
        height
    } = zoomContainer.getBoundingClientRect();
    const x = (e.clientX - left) / width;
    const y = (e.clientY - top) / height;

    zoomImage.style.transformOrigin = `${x * 100}% ${y * 100}%`;
    zoomImage.style.transform = "scale(2.5)";
});

zoomOverlay.addEventListener("mouseleave", () => {
    zoomImage.style.transform = "scale(1)";
    zoomImage.style.transformOrigin = "center center";
});
</script>
<?php include 'libs/footer.php'; ?>


<script>
$(document).ready(function() {
    let selectedColor = null;

    $(".color-option").click(function() {
        $(".color-option").removeClass("ring-2 ring-black");
        $(this).addClass("ring-2 ring-black");

        const colorName = $(this).data("color"); // ✅ not data("color-name")
        const colorCode = $(this).data("color-code");

        $("#colorName").text(colorName);

        // ✅ Update buttons
        $(".addtocart, .addtoWishlist")
            .attr("data-color", colorName)
            .attr("data-color-code", colorCode);
    });



    // Color select
    $(".color-option").click(function() {
        $(".color-option").removeClass("border-blue-500");
        $(this).addClass("border-blue-500");

        selectedColor = {
            name: $(this).data("color-name"),
            code: $(this).data("color-code")
        };

        $("#colorName").text(selectedColor.name);
    });

    // Quantity change
    $(".increase").click(function() {
        let qty = parseInt($("#pro_qty").val());
        $("#pro_qty").val(qty + 1);
    });

    $(".decrease").click(function() {
        let qty = parseInt($("#pro_qty").val());
        if (qty > 1) $("#pro_qty").val(qty - 1);
    });

});
// update button data-qty when changed
function updateCartButtonQty() {
    const qty = $("#pro_qty").val();
    $(".addtocart").attr("data-qty", qty);
}

$(".increase, .decrease").click(function() {
    updateCartButtonQty();
});
</script>