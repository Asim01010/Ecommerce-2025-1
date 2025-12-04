<?php
include 'libs/dbconfig.php';

// Use isset to allow "0" values
$categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : null;
$maxPrice   = isset($_POST['maxPrice'])   ? $_POST['maxPrice']   : null;

if ($categoryId === null || $maxPrice === null) {
    echo "<p class='text-red-500 text-center'>Invalid request (missing params).</p>";
    exit;
}

// sanitize/cast values
$categoryId = (int) $categoryId;
$maxPrice   = (float) $maxPrice;

// choose the real table name you have in DB:
$table = 'sm_products'; // <-- if your table is sm_product change this to 'sm_product'

$query = "SELECT * FROM `{$table}` WHERE `pro_cat_id` = {$categoryId} AND `pro_price` <= {$maxPrice} AND `pro_status` = 1";
$result = mysqli_query($dbcon, $query);

if (!$result) {
    // dev-time helpful error
    echo "<p class='text-red-500 text-center'>❌ SQL Error: " . mysqli_error($dbcon) . "</p>";
    exit;
}

if (mysqli_num_rows($result) > 0) {
    // Output rows using the same HTML structure as your main page
    while ($row = mysqli_fetch_assoc($result)) {
        // escape output
        $pid   = htmlspecialchars($row['pro_id']);
        $pimg  = htmlspecialchars($row['pro_image']);
        $pname = htmlspecialchars($row['pro_name']);
        $pprice= htmlspecialchars($row['pro_price']);
        ?>
<div class="group/card relative">
    <div>
        <div class="relative overflow-hidden">
            <a href="product-details2.php?pro_id=<?= $pid ?>">
                <img src="imgs/products/<?= $pimg ?>" alt="<?= $pname ?>">
            </a>
            <div
                class="absolute bottom-0 bg-black/30 w-full py-1 translate-y-10 group-hover/card:translate-y-0 transition-translate duration-500">
                <div class="flex justify-center gap-1 item-center w-full ">
                    <div
                        class="h-8 hover:bg-black w-8 text-white border border-white hover:border-black flex justify-center items-center">
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
            <a href="product-details2.php?pro_id=<?= $pid ?>">Ready To Wear</a>
            <i class="bi bi-suit-heart"></i>
        </div>
        <div class="mt-2">
            <h1 class="uppercase leading-[1]">
                <a href="product-details2.php?pro_id=<?= $pid ?>"><?= $pname ?></a>
            </h1>
        </div>
        <div class="mt-1 flex justify-between items-center">
            <div>
                <del class="text-sm uppercase">PKR 4,780</del>
                <p class="text-sm uppercase text-red-400 -mt-2">PKR <?= $pprice ?></p>
            </div>
            <div
                class="relative inline-block opacity-0 invisible transition-all duration-300 group-hover/card:opacity-100 group-hover/card:visible">
                <a href="product-details2.php?pro_id=<?= $pid ?>"
                    class="group bg-black py-1 px-6 text-white uppercase text-[10px] rounded-full overflow-hidden relative flex items-center justify-center h-8 w-32">
                    <span class="block transform transition-all duration-300 group-hover:translate-y-6">Quick
                        Shop</span>
                    <span
                        class="absolute transform translate-y-8 transition-all duration-300 group-hover:translate-y-0">
                        <i class="bi bi-bag-plus text-white text-sm"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
    }
} else {
    echo "<p class='text-gray-500 text-center col-span-4'>No products found below PKR {$maxPrice} in this category.</p>";
}
?>