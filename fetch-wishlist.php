<?php
// ✅ Always start session before any output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'libs/dbconfig.php';

$output = '';
$wishlist_count = 0;

// =========================
// ✅ Logged-in User Wishlist
// =========================
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);

    $getwishlist = mysqli_query(
        $dbcon,
        "SELECT * FROM sm_wishlist WHERE wishlist_uid='$sm_id' ORDER BY wishlist_datetime DESC"
    ) or die(mysqli_error($dbcon));

    if (mysqli_num_rows($getwishlist) === 0) {
        $output .= '
        <div class="w-full text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-200">
            <i class="bi bi-heart text-5xl text-gray-400 mb-3"></i>
            <p class="text-lg font-medium text-gray-600">Your wishlist is empty!</p>
            <p class="text-sm text-gray-500 mt-1">Save items you love to view later.</p>
        </div>';
    } else {
        while ($wish = mysqli_fetch_assoc($getwishlist)) {
            $pro_id = $wish['wishlist_pro_id'];
            $color = $wish['wishlist_pro_color'] ?: 'No Color';
            $size = $wish['wishlist_pro_size'] ?: 'No Size';

            // Get product details
            $pro_q = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_id='$pro_id'");
            $pro = mysqli_fetch_assoc($pro_q);
            if (!$pro) continue;

            $discount = ($pro['pro_price'] * $pro['pro_discount']) / 100;
            $price = $pro['pro_price'] - $discount;
            $pro_max_qty = $pro['pro_max_qty'] ?? 1000;
            $color_code = $color;

            $wishlist_count++;

            $output .= '
<div class="wishlist-item flex items-start gap-4 p-3 border-b">
    <img src="imgs/products/' . htmlspecialchars($pro['pro_image']) . '" class="w-20 h-20 object-cover rounded" alt="">
    <div class="flex-1">
        <div class="flex justify-between items-start">
            <div>
                <div class="font-semibold text-sm">' . htmlspecialchars($pro['pro_name']) . '</div>
                <div class="text-xs text-gray-500">Color: ' . htmlspecialchars($color) . '</div>
            </div>
            <div class="text-sm font-semibold">PKR ' . number_format($price) . '</div>
        </div>
        <div class="mt-2 flex gap-2">
            <button class="uppercase bg-black py-2 px-4 text-white cursor-pointer addtocart"
                data-id="' . $pro['pro_id'] . '"
                data-name="' . htmlspecialchars($pro['pro_name']) . '"
                data-image="' . htmlspecialchars($pro['pro_image']) . '"
                data-price="' . $pro['pro_price'] . '"
                data-max="' . $pro_max_qty . '"
                data-size="' . htmlspecialchars($size) . '"
                data-color="' . htmlspecialchars($color) . '"
                data-color-code="' . htmlspecialchars($color_code) . '"
                data-qty="1">
                Move to Cart
            </button>
            <button class="remove-wish-item px-3 py-1 border rounded text-sm text-red-600"
                data-id="' . $pro_id . '"
                data-color="' . htmlspecialchars($color) . '"
                data-size="' . htmlspecialchars($size) . '">
                Remove
            </button>
        </div>
    </div>
</div>';
        }
    }
}

// =========================
// ✅ Guest Wishlist (Session)
// =========================
else {
    // ✅ Ensure wishlist session exists
    if (!isset($_SESSION['wishlist']) || empty($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }

    if (!empty($_SESSION['wishlist'])) {
        foreach ($_SESSION['wishlist'] as $key => $item) {
            $wishlist_count++;

            // Refresh price from DB if available
            $pro_q = mysqli_query($dbcon, "SELECT pro_price, pro_discount FROM sm_products WHERE pro_id='{$item['id']}'");
            $pro = mysqli_fetch_assoc($pro_q);

            if ($pro) {
                $discount = ($pro['pro_price'] * $pro['pro_discount']) / 100;
                $price = $pro['pro_price'] - $discount;
                $pro_max_qty = $pro['pro_max_qty'] ?? 1000;
            } else {
                $price = (float)$item['price'];
                $pro_max_qty = $item['max_qty'] ?? 1000;
            }

            $color = $item['color'] ?: 'No Color';
            $size  = $item['size'] ?: 'No Size';
            $color_code = $color;

            $output .= '
<div class="wishlist-item flex items-start gap-4 p-3 border-b">
    <img src="imgs/products/' . htmlspecialchars($item['image']) . '" class="w-20 h-20 object-cover rounded" alt="">
    <div class="flex-1">
        <div class="flex justify-between items-start">
            <div>
                <div class="font-semibold text-sm">' . htmlspecialchars($item['name']) . '</div>
                <div class="text-xs text-gray-500">Color: ' . htmlspecialchars($color) . '</div>
            </div>
            <div class="text-sm font-semibold">PKR ' . number_format($price) . '</div>
        </div>
        <div class="mt-2 flex gap-2">
            <button class="uppercase bg-black py-2 px-4 text-white cursor-pointer addtocart"
                data-id="' . $item['id'] . '"
                data-name="' . htmlspecialchars($item['name']) . '"
                data-image="' . htmlspecialchars($item['image']) . '"
                data-price="' . $item['price'] . '"
                data-max="' . $pro_max_qty . '"
                data-size="' . htmlspecialchars($size) . '"
                data-color="' . htmlspecialchars($color) . '"
                data-color-code="' . htmlspecialchars($color_code) . '"
                data-qty="1">
                Move to Cart
            </button>
            <button class="remove-wish-item px-3 py-1 border rounded text-sm text-red-600"
                data-id="' . htmlspecialchars($item['id']) . '"
                data-color="' . htmlspecialchars($color) . '"
                data-size="' . htmlspecialchars($size) . '">
                Remove
            </button>
        </div>
    </div>
</div>';
        }
    } else {
        $output = '
        <div class="w-full text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-200">
            <i class="bi bi-heart text-5xl text-gray-400 mb-3"></i>
            <p class="text-lg font-medium text-gray-600">Your wishlist is empty!</p>
        </div>';
    }
}


echo "<script>
localStorage.setItem('wishlist_count', '$wishlist_count');
</script>";
// =========================
// ✅ Final Output
// =========================
echo $output;

// ✅ Make sure session persists for guests
session_write_close();
?>