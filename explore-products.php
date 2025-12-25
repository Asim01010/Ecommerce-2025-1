<?php 

include "./libs/dbconfig.php"; 

// --- AJAX handler for loading products
if (isset($_POST['action']) && $_POST['action'] === 'load_products') {
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $limit  = isset($_POST['limit']) ? intval($_POST['limit']) : 16;

    $query = "SELECT * FROM sm_products ORDER BY pro_id DESC LIMIT $offset, $limit";
    $result = mysqli_query($dbcon, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
<a href="product-details2.php?pro_id=<?= $row['pro_id'] ?>"
    class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer">
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
    }
    exit; // important: stop execution for AJAX
}
include 'libs/header.php';
?>

<section class="mt-20 px-6 lg:px-16">
    <h2 class="text-4xl sm:text-5xl text-pri text-center uppercase font-semibold tracking-wider mb-14">
        Explore Products
    </h2>

    <div id="productContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Products will be loaded here via AJAX -->
    </div>

    <div class="text-center m-10">
        <button id="loadMoreBtn"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-200">
            Load More Products
        </button>
    </div>
</section>

<?php include 'libs/footer.php'; ?>

<script>
let offset = 0;
const limit = 16;

function loadProducts() {
    $.ajax({
        url: '', // same file
        type: 'POST',
        data: {
            action: 'load_products',
            offset: offset,
            limit: limit
        },
        beforeSend: function() {
            $('#loadMoreBtn').text('Loading...').prop('disabled', true);
        },
        success: function(data) {
            if (data.trim() === "") {
                $('#loadMoreBtn').text('No More Products').prop('disabled', true);
            } else {
                $('#productContainer').append(data);
                offset += limit;
                $('#loadMoreBtn').text('Load More Products').prop('disabled', false);
            }
        },
        error: function() {
            alert('Failed to load products. Try again.');
            $('#loadMoreBtn').text('Load More Products').prop('disabled', false);
        }
    });
}

// Initial load
$(document).ready(function() {
    loadProducts();
});

// Load more on button click
$('#loadMoreBtn').on('click', function() {
    loadProducts();
});
</script>