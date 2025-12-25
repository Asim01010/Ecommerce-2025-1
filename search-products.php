<?php
include 'libs/dbconfig.php';

$search = trim($_POST['searchVal'] ?? '');
$escaped = mysqli_real_escape_string($dbcon, $search);

$searchQuery = "SELECT * FROM sm_products WHERE pro_name LIKE '%$escaped%'";
$result = mysqli_query($dbcon, $searchQuery);

if (!$result || mysqli_num_rows($result) === 0) {
    exit; // No results or query error
}

while ($row = mysqli_fetch_assoc($result)) {
    $name = htmlspecialchars($row['pro_name']);
    $price = htmlspecialchars($row['pro_price']);
    $discount = htmlspecialchars($row['pro_discount']);
    $img = htmlspecialchars($row['pro_image']);
    $pro_id = htmlspecialchars($row['pro_id']);

    ?>

<div onclick="window.location.href='product-details2.php?pro_id=<?= $pro_id ?>'"
    class="group cursor-pointer bg-white rounded-xl shadow hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 hover:-translate-y-1">

    <div class="relative overflow-hidden">
        <img src="imgs/products/<?= $img ?>" alt="<?= $name ?>"
            class="w-full h-40 sm:h-44 object-cover transition-transform duration-700 group-hover:scale-110" />
        <span
            class="absolute bottom-0  right-0 px-[2px] py-[1px] text-[10px] font-semibold border rounded-tl-[3px]
                        <?php echo ($row['pro_ava_qty'] > 0) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
            <?php echo ($row['pro_ava_qty'] > 0) ? 'In Stock' : 'Out of Stock'; ?>
        </span>
        <?php if ($discount > 0): ?>
        <span class="absolute top-0 left-0 bg-red-500 text-white text-[5px] sm:text-xs font-semibold px-2 py-1 rounded">
            -<?= $discount ?>%
        </span>
        <?php endif; ?>
    </div>

    <div class="p-2 sm:p-3">
        <h2 class="uppercase font-semibold text-[12px] sm:text-sm text-gray-800 line-clamp-1"><?= $name ?></h2>
        <div class="flex items-center gap-2 mt-1">
            <del class="text-[10px] text-gray-400">PKR <?= number_format($price) ?></del>
            <p class="text-[11px] sm:text-sm font-semibold text-red-500">
                PKR <?= number_format($price - ($price * $discount / 100)) ?>
            </p>
        </div>
    </div>
</div>

<?php
}
?>