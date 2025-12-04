<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'libs/dbconfig.php';

$action = $_POST['action'] ?? '';
$pro_id = $_POST['pro_id'] ?? '';

if ($action !== 'add_wishlist' || empty($pro_id)) {
    echo "error: Invalid action";
    exit;
}

// Get product data safely
$action        = $_POST['action'] ?? '';
$pro_id        = $_POST['pro_id'] ?? '';
$pro_name      = $_POST['pro_name'] ?? '';
$pro_image     = $_POST['pro_image'] ?? '';
$pro_price     = $_POST['pro_price'] ?? 0;
$pro_qty       = $_POST['pro_qty'] ?? 1;
$pro_color     = $_POST['pro_color'] ?? 'No Color';
$pro_color_code = $_POST['pro_color_code'] ?? '';
$pro_size      = $_POST['pro_size'] ?? 'No Size';


/* ==========================================================
   LOGGED-IN USER — use DATABASE wishlist
========================================================== */
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $pid   = mysqli_real_escape_string($dbcon, $pro_id);

    // Check if product already exists in wishlist
    $check = mysqli_query($dbcon, "
        SELECT * FROM sm_wishlist 
        WHERE wishlist_uid='$sm_id' 
        AND wishlist_pro_id='$pid'
        AND wishlist_pro_color='$pro_color'
        AND wishlist_pro_size='$pro_size'
    ") or die(mysqli_error($dbcon));

    if (mysqli_num_rows($check) > 0) {
        // If exists → remove it (toggle)
        mysqli_query($dbcon, "
            DELETE FROM sm_wishlist 
            WHERE wishlist_uid='$sm_id'
            AND wishlist_pro_id='$pid'
            AND wishlist_pro_color='$pro_color'
            AND wishlist_pro_size='$pro_size'
        ") or die(mysqli_error($dbcon));
        echo "removed";
        exit;
    } else {
        // Otherwise add it
        mysqli_query($dbcon, "
            INSERT INTO sm_wishlist 
            (wishlist_uid, wishlist_pro_id, wishlist_pro_name, wishlist_pro_image, wishlist_pro_price, wishlist_pro_color, wishlist_pro_size, wishlist_datetime)
            VALUES 
            ('$sm_id', '$pid', '$pro_name', '$pro_image', '$pro_price', '$pro_color', '$pro_size', NOW())
        ") or die(mysqli_error($dbcon));
        echo "added";
        exit;
    }
}








/* ==========================================================
   GUEST USER — use SESSION wishlist
========================================================== */
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Create a unique key using product + color + size
$wishlistKey = $pro_id . '_' . $pro_color . '_' . $pro_size;

// If item exists → remove (toggle)
if (isset($_SESSION['wishlist'][$wishlistKey])) {
    unset($_SESSION['wishlist'][$wishlistKey]);
    echo "removed";
    exit;
}

// Add new wishlist item
$_SESSION['wishlist'][$wishlistKey] = [
    'id' => $pro_id,
    'name' => $pro_name,
    'image' => $pro_image,
    'price' => $pro_price,
    'qty' => $pro_qty,
    'color' => $pro_color,
    'color_code' => $pro_color_code,
    'size' => $pro_size
];

echo "added";
exit;
?>