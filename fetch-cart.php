<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'libs/dbconfig.php';

$output = '';
$total_price = 0;
$cart_count = 0;

// =======================================================
// =============== LOGGED-IN USER CART ===================
// =======================================================
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $getcart = mysqli_query($dbcon, "SELECT * FROM sm_cart WHERE cart_uid='$sm_id'") or die(mysqli_error($dbcon));

    // Track valid item count
    $valid_items = 0;

    if (mysqli_num_rows($getcart) > 0) {
        while ($cart_row = mysqli_fetch_assoc($getcart)) {
            $pro_id = $cart_row['cart_pro_id'];
            $qty    = max((int)$cart_row['cart_pro_qty'], 1);
            $selected_color = $cart_row['cart_pro_color'] ?? 'Not selected';

            // Fetch product info
            $pro_q = mysqli_query($dbcon, "
                SELECT pro_name, pro_image, pro_price, pro_discount 
                FROM sm_products 
                WHERE pro_id='$pro_id'
            ");
            $pro = mysqli_fetch_assoc($pro_q);

            if (!$pro) {
                // if product not found, skip it
                continue;
            }
$key = $pro_id . '_' . $cart_row['cart_pro_color'] . '_' . $cart_row['cart_pro_size'];
            $valid_items++; // ✅ count valid products

            $discount = ($pro['pro_price'] * $pro['pro_discount']) / 100;
            $price = $pro['pro_price'] - $discount;
            $line_total = $qty * $price;

            $total_price += $line_total;
            $cart_count++;

            $output .= '
<div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 w-full p-4 mb-4 bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
  <div class="shrink-0 w-full sm:w-24 h-28">
    <img src="imgs/products/' . htmlspecialchars($pro['pro_image']) . '" 
         alt="' . htmlspecialchars($pro['pro_name']) . '" 
         class="w-full h-full object-cover rounded-xl border border-gray-200">
  </div>
  <div class="flex flex-col justify-between w-full">
    <div class="flex justify-between items-start">
      <h3 class="text-base sm:text-lg font-semibold text-gray-900 leading-tight">' . htmlspecialchars($pro['pro_name']) . '</h3>
      <span class="text-green-700 font-semibold text-sm sm:text-base bg-green-100 px-2.5 py-1 rounded-md whitespace-nowrap">
        PKR ' . number_format($price) . '
      </span>
    </div>
    <p class="text-sm mt-1 text-gray-700">
      <span class="font-semibold text-gray-900">Color:</span> ' . htmlspecialchars($selected_color) . '
    </p>
    <div class="mt-3 flex justify-between items-center">
      <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden shadow-sm">
        <button class="minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-lg transition"
                data-key="' . htmlspecialchars($key) . '"><i class="bi bi-dash"></i></button>
        <span class="px-4 text-sm font-medium text-gray-900">' . $qty . '</span>
        <button class="plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-lg transition"
                data-key="' . htmlspecialchars($key) . '"><i class="bi bi-plus-lg"></i></button>
      </div>
      <button class="remove-btn flex items-center gap-1 text-red-600 border border-red-600 hover:text-white hover:bg-red-600 px-3 py-1 rounded-lg text-sm font-medium transition"
              data-key="' . htmlspecialchars($key) . '">
        <i class="bi bi-trash"></i>
      </button>
    </div>
    <p class="text-sm text-gray-700 mt-3">
      <span class="font-semibold text-gray-900">Subtotal:</span>
      <span class="font-semibold text-black">PKR ' . number_format($line_total) . '</span>
    </p>
  </div>
</div>';
        }
    }

    // ✅ Show empty message if no valid items found
    if ($valid_items === 0) {
        $output = '
        <div class="w-full text-center py-12 bg-white rounded-2xl shadow-sm border border-gray-200">
            <i class="bi bi-cart-x text-5xl text-gray-400 mb-3"></i>
            <p class="text-lg font-medium text-gray-600">Your cart is empty!</p>
            <p class="text-sm text-gray-500 mt-1">Add items to see them here.</p>
        </div>';
    }
}




// =======================================================
// =============== GUEST USER CART =======================
// =======================================================
else {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            $pro_id = $item['id'];
            $qty = max((int)$item['qty'], 1);

            // ✅ Get actual price from database (not from session)
            $pro_q = mysqli_query($dbcon, "SELECT pro_price, pro_discount FROM sm_products WHERE pro_id='$pro_id'");
            $pro = mysqli_fetch_assoc($pro_q);
            if ($pro) {
                $discount = ($pro['pro_price'] * $pro['pro_discount']) / 100;
                $price = $pro['pro_price'] - $discount;
            } else {
                $price = (float)$item['price'];
            }

            $line_total = $qty * $price;
            $total_price += $line_total;
            $cart_count++;

            $output .= '
<div class="flex items-center gap-5 w-full p-4 mb-3 bg-white rounded-2xl border border-gray-100 hover:shadow-md transition">
  <div class="shrink-0">
    <img src="imgs/products/' . htmlspecialchars($item['image']) . '" 
         class="w-24 h-28 object-cover rounded-xl border border-gray-200" 
         alt="' . htmlspecialchars($item['name']) . '">
  </div>

  <div class="flex flex-col justify-between w-full">
    <div class="flex justify-between items-start">
      <p class="text-base font-semibold text-gray-900 leading-tight">' . htmlspecialchars($item['name']) . '</p>
      <span class="text-green-600 font-bold text-sm bg-green-50 px-2 py-1 rounded-md whitespace-nowrap">
        PKR ' . number_format($price) . '
      </span>
    </div>

    <!-- 🎨 Guest user selected color -->
    <p class="text-sm font-semibold text-gray-900 mt-1">Color: ' . htmlspecialchars($item['color']) . '</p>

    <div class="mt-3 flex justify-between items-center">
      <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden shadow-sm">
        <button class="minus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-lg font-bold transition"
                data-key="' . $key . '"><i class="bi bi-dash"></i></button>
        <span class="px-4 text-sm font-medium text-gray-900">' . $qty . '</span>
        <button class="plus-btn px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-lg font-bold transition"
                data-key="' . $key . '"><i class="bi bi-plus-lg"></i></button>
      </div>

      <button class="remove-btn flex items-center gap-1 text-xl text-red-600 hover:text-white hover:bg-red-500 px-3 py-1 rounded-lg transition"
              data-key="' . $key . '"><i class="bi bi-trash"></i></button>
    </div>

    <p class="text-xs text-gray-600 mt-3">
      Subtotal: <span class="font-semibold text-gray-900">PKR ' . number_format($line_total) . '</span>
    </p>
  </div>
</div>';
        }
    } else {
        $output = '<div class="p-8 text-center text-gray-600">No item in cart!</div>';
    }
}

echo $output;