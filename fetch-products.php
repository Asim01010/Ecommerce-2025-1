<?php
include './libs/dbconfig.php';

$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit  = isset($_POST['limit']) ? intval($_POST['limit']) : 16;

// Fetch products with pagination
$query = "SELECT * FROM sm_products ORDER BY pro_id DESC LIMIT $offset, $limit";
$result = mysqli_query($dbcon, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
<!-- Copy your product card HTML here -->
<a href="product-details2.php?pro_id=<?= $row['pro_id'] ?>"
    class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer">
    <!-- Product Image & Info (same as main file) -->
    <div class="relative overflow-hidden">
        <img src="imgs/products/<?= $row['pro_image'] ?>" alt="<?= htmlspecialchars($row['pro_name']) ?>"
            class="w-full h-72 object-cover transition-transform duration-700 group-hover:scale-110" />
        <span class="absolute bottom-2 right-2 px-2 py-1 text-xs font-semibold rounded-full 
                        <?= ($row['pro_ava_qty'] > 0) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
            <?= ($row['pro_ava_qty'] > 0) ? 'In Stock' : 'Out of Stock'; ?>
        </span>
        <?php if ($row['pro_discount'] > 0) { ?>
        <div class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-2 py-1 rounded-full shadow-md">
            <?= $row['pro_discount'] ?>% OFF
        </div>
        <?php } ?>
    </div>
    <div class="p-4 flex flex-col gap-1">
        <h2 class="text-gray-800 font-semibold text-base sm:text-lg line-clamp-1 uppercase tracking-wide">
            <?= $row['pro_name'] ?>
        </h2>
        <div class="flex justify-between items-center mt-1">
            <div>
                <p class="text-gray-400 line-through text-sm">
                    PKR <?= number_format($row['pro_price']) ?>
                </p>
                <p class="text-red-500 font-bold text-base">
                    PKR <?= number_format($row['pro_discount_price'] ?? $row['pro_price']) ?>
                </p>
            </div>
        </div>
    </div>
</a>
<?php
    }
} else {
    // No more products
    echo '';
}
?>