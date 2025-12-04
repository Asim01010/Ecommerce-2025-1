<?php
session_start();
include 'libs/dbconfig.php';

$cartItems = [];
$grandTotal = 0;

// Logged-in user
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $q = mysqli_query($dbcon, "
        SELECT sc.cart_pro_id, sc.cart_pro_qty, p.pro_name, p.pro_image, p.pro_price 
        FROM sm_cart sc
        JOIN sm_products p ON p.pro_id = sc.cart_pro_id
        WHERE sc.cart_uid='$sm_id'
    ");
    while ($row = mysqli_fetch_assoc($q)) {
        $cartItems[] = [
            'id'    => $row['cart_pro_id'],
            'qty'   => (int)$row['cart_pro_qty'],
            'name'  => $row['pro_name'],
            'image' => $row['pro_image'],
            'price' => (float)$row['pro_price']
        ];
    }
} 
// Guest user
else {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cartItems[] = [
                'id'    => $item['id'],
                'qty'   => max(1, (int)$item['qty']),
                'name'  => htmlspecialchars($item['name']),
                'image' => htmlspecialchars($item['image']),
                'price' => (float)$item['price']
            ];
        }
    }
}

// Now display checkout summary
if (!empty($cartItems)) {
    foreach ($cartItems as $item) {
        $itemTotal = $item['qty'] * $item['price'];
        $grandTotal += $itemTotal;
?>
<div class="flex items-center justify-between border-b border-gray-200 pb-4">
    <div class="flex items-center">
        <div class="relative">
            <img src="./imgs/products/<?= $item['image'] ?>" alt="Product" class="w-16 h-16 rounded-md object-cover">
            <span
                class="absolute -top-2 -right-2 bg-gray-800 text-white text-xs w-5 h-5 flex items-center justify-center rounded-lg"><?= $item['qty'] ?></span>
        </div>
        <div class="ml-3">
            <h3 class="font-medium text-sm text-gray-800"><?= $item['name'] ?></h3>
            <p class="text-xs text-gray-500">Short description</p>
        </div>
    </div>
    <p class="text-gray-800 font-semibold text-sm">$<?= number_format($item['price'], 2) ?></p>
</div>
<?php 
    } // end foreach 
?>

<!-- Coupon -->
<form class="flex mt-4 space-x-2">
    <input type="text" placeholder="Discount code"
        class="w-full border border-gray-300 rounded-md p-2 text-sm focus:ring-2 focus:ring-blue-500">
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-xs transition">
        Apply
    </button>
</form>

<!-- Summary -->
<div class="mt-5 space-y-2">
    <div class="flex justify-between text-gray-600 text-sm">
        <p>Subtotal</p>
        <p class="font-medium text-gray-800">$<?= number_format($grandTotal, 2) ?></p>
    </div>
    <div class="flex justify-between text-gray-600 text-sm">
        <p>Shipping</p>
        <p class="font-medium text-gray-800">Enter address</p>
    </div>
    <div class="flex justify-between border-t border-gray-300 pt-2">
        <p class="text-sm font-semibold">Total</p>
        <p class="text-base font-bold text-blue-600">
            <span class="text-gray-500 text-xs">USD</span>
            $<?= number_format($grandTotal, 2) ?>
        </p>
    </div>
</div>

<?php
} else {
    echo "<p>Your cart is empty!</p>";
}
?>