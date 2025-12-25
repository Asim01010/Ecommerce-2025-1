<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'libs/dbconfig.php';

$totalItems = 0; 
$subtotal = 0;

// ================== Logged-in user ==================
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $q = mysqli_query($dbcon, "
        SELECT sc.cart_pro_qty, p.pro_price, p.pro_discount
        FROM sm_cart sc
        JOIN sm_products p ON p.pro_id = sc.cart_pro_id
        WHERE sc.cart_uid='$sm_id'
    ") or die(mysqli_error($dbcon));

    while ($row = mysqli_fetch_assoc($q)) {
        $discount = ($row['pro_price'] * $row['pro_discount']) / 100;
        $finalPrice = $row['pro_price'] - $discount;

        $subtotal += (float)$finalPrice * (int)$row['cart_pro_qty'];
        $totalItems++; // ✅ count unique items
    }
} 

// ================== Guest user ==================
else {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $it) {
            $pro_id = (int)$it['id'];
            $qty = (int)$it['qty'];

            // ✅ Always verify real price & discount from database
            $pro_q = mysqli_query($dbcon, "SELECT pro_price, pro_discount FROM sm_products WHERE pro_id='$pro_id'");
            $pro = mysqli_fetch_assoc($pro_q);

            if ($pro) {
                $discount = ($pro['pro_price'] * $pro['pro_discount']) / 100;
                $finalPrice = $pro['pro_price'] - $discount;
            } else {
                // fallback to session price if product not found
                $finalPrice = (float)$it['price'];
            }

            $subtotal += $finalPrice * $qty;
            $totalItems++;
        }
    }
}
?>

<div class="flex items-center justify-between p-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-800 w-full">
    <div class="flex items-center gap-1">
        <span class="text-lg"><i class="bi bi-cart4"></i></span>
        <span id="cart-badge-total"><?= $totalItems ?></span> item<?= $totalItems != 1 ? 's' : '' ?>
    </div>
    <div class="flex items-center gap-1">
        <span class="text-green-600 font-semibold">
            <i class="bi bi-currency-dollar"></i> PKR <?= number_format($subtotal) ?>
        </span>
    </div>
</div>

<script>
// ✅ Update header badge
var badge = document.getElementById('cart-badge');
if (badge) badge.innerText = <?= $totalItems ?>;
</script>