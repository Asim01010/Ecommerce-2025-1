<?php
session_start();
include 'libs/dbconfig.php';

// ================= VALIDATE ACTION =================
if (!isset($_POST['action']) || $_POST['action'] !== 'add') {
    echo "error: Invalid action";
    exit;
}

// ================= GET PRODUCT DETAILS =================
$pro_id       = trim($_POST['pro_id'] ?? '');
$pro_qty      = max(1, (int)($_POST['pro_qty'] ?? 1));
$pro_max_qty  = (int)($_POST['pro_max_qty'] ?? 1000);
$pro_name     = trim($_POST['pro_name'] ?? '');
$pro_image    = trim($_POST['pro_image'] ?? '');
$pro_price    = floatval($_POST['pro_price'] ?? 0);
$pro_size     = trim($_POST['pro_size'] ?? 'No Size');
$pro_color    = trim($_POST['pro_color'] ?? 'No Color');
$pro_color_code = trim($_POST['pro_color_code'] ?? '');
$pro_ava_qty  = (int)($_POST['pro_ava_qty'] ?? 0);




// ================= CHECK STOCK =================
$checkStock = mysqli_query($dbcon, "SELECT pro_ava_qty FROM sm_products WHERE pro_id='$pro_id'") or die(mysqli_error($dbcon));
$rowStock = mysqli_fetch_assoc($checkStock);
$ava_qty = (int)$rowStock['pro_ava_qty'];


if ($ava_qty == 0) {
    echo "no_stock";  // Product completely out of stock
    exit;
}
// If requested quantity is more than available stock → stop
if($pro_qty > $ava_qty){
    echo "out_of_stock";
    exit;
}

// ================= LOGGED-IN USER =================
if (isset($_SESSION['sm_id'])) {

    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    
    $pid   = mysqli_real_escape_string($dbcon, $pro_id);

    $check = mysqli_query($dbcon, "
        SELECT * FROM sm_cart 
        WHERE cart_uid='$sm_id' 
        AND cart_pro_id='$pid'
        AND cart_pro_color='$pro_color'
        AND cart_pro_size='$pro_size'
    ") or die(mysqli_error($dbcon));

    if (mysqli_num_rows($check) > 0) {
        // Product exists → Update quantity
        $row = mysqli_fetch_assoc($check);
        $newQty = min($row['cart_pro_qty'] + $pro_qty, $row['cart_pro_max_qty']);

        mysqli_query($dbcon, "
            UPDATE sm_cart 
            SET cart_pro_qty='$newQty'
            WHERE cart_id='{$row['cart_id']}'
        ") or die(mysqli_error($dbcon));

        echo "updated";
        // ✅ Remove from wishlist after moving to cart
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $pid   = mysqli_real_escape_string($dbcon, $pro_id);
    mysqli_query($dbcon, "
        DELETE FROM sm_wishlist 
        WHERE wishlist_uid='$sm_id' 
        AND wishlist_pro_id='$pid'
        AND wishlist_pro_color='$pro_color'
        AND wishlist_pro_size='$pro_size'
    ");
} else {
    $wkey = $pro_id . '_' . $pro_color . '_' . $pro_size;
    if (isset($_SESSION['wishlist'][$wkey])) {
        unset($_SESSION['wishlist'][$wkey]);
    }
}
// release session lock so next AJAX can read updated session quickly
if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close();
}
        exit;
    } else {
        // Add new item (only existing columns)
        mysqli_query($dbcon, "
            INSERT INTO sm_cart 
            (cart_uid, cart_pro_id, cart_pro_qty, cart_pro_max_qty, cart_pro_size, cart_pro_color, cart_datetime)
            VALUES 
            ('$sm_id', '$pid', '$pro_qty', '$pro_max_qty', '$pro_size', '$pro_color', NOW())
        ") or die(mysqli_error($dbcon));

        echo "added";
        // ✅ Remove from wishlist after moving to cart
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $pid   = mysqli_real_escape_string($dbcon, $pro_id);
    mysqli_query($dbcon, "
        DELETE FROM sm_wishlist 
        WHERE wishlist_uid='$sm_id' 
        AND wishlist_pro_id='$pid'
        AND wishlist_pro_color='$pro_color'
        AND wishlist_pro_size='$pro_size'
    ");
} else {
    $wkey = $pro_id . '_' . $pro_color . '_' . $pro_size;
    if (isset($_SESSION['wishlist'][$wkey])) {
        unset($_SESSION['wishlist'][$wkey]);
    }
}
// release session lock so next AJAX can read updated session quickly
if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close();
}
        exit;
    }
}


// ================= GUEST USER (SESSION) =================
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Unique key (includes color + size so same product can exist with different variants)
$key = $pro_id . '_' . $pro_color . '_' . $pro_size;

if (isset($_SESSION['cart'][$key])) {
    // Product already in cart → update quantity
    $_SESSION['cart'][$key]['qty']   = min($_SESSION['cart'][$key]['qty'] + $pro_qty, $pro_max_qty);
    $_SESSION['cart'][$key]['price'] = $pro_price;
    $_SESSION['cart'][$key]['name']  = $pro_name;
    $_SESSION['cart'][$key]['image'] = $pro_image;
    $_SESSION['cart'][$key]['color'] = $pro_color;
    $_SESSION['cart'][$key]['size']  = $pro_size;
    $_SESSION['cart'][$key]['color_code'] = $pro_color_code;

    // remove same item from guest wishlist (if present)
    $wkey = $key; // same key format used for wishlist: proid_color_size
    if (isset($_SESSION['wishlist'][$wkey])) {
        unset($_SESSION['wishlist'][$wkey]);
    }

    // release session lock so subsequent AJAX (fetch-wishlist) sees the change
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close();
    }

    echo "updated";
} else {
    // Add new product
    $_SESSION['cart'][$key] = [
        'id'         => $pro_id,
        'qty'        => $pro_qty,
        'name'       => $pro_name,
        'image'      => $pro_image,
        'price'      => $pro_price,
        'size'       => $pro_size,
        'color'      => $pro_color,
        'color_code' => $pro_color_code,
        'max_qty'    => $pro_max_qty
    ];

    // remove same item from guest wishlist (if present)
    $wkey = $key;
    if (isset($_SESSION['wishlist'][$wkey])) {
        unset($_SESSION['wishlist'][$wkey]);
    }

    // release session lock
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close();
    }

    echo "added";
}


exit;
?>