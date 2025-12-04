<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'libs/dbconfig.php';

$key    = $_POST['key']    ?? null;
$action = strtolower($_POST['action'] ?? '');

if (!$key || !$action) {
    echo "ERROR: Missing key or action";
    exit;
}

// ================ LOGGED-IN USER ================
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
  // Split key: proid_color_size
$parts = explode('_', $key);
$pid    = mysqli_real_escape_string($dbcon, $parts[0] ?? '');
$pcolor = mysqli_real_escape_string($dbcon, $parts[1] ?? '');
$psize  = mysqli_real_escape_string($dbcon, $parts[2] ?? '');

$q = mysqli_query($dbcon, "
    SELECT * FROM sm_cart 
    WHERE cart_uid='$sm_id' 
      AND cart_pro_id='$pid'
      AND cart_pro_color='$pcolor'
      AND cart_pro_size='$psize'
    LIMIT 1
");

    if (!$q || mysqli_num_rows($q) === 0) {
        echo "ERROR: Item not found";
        exit;
    }

    $row = mysqli_fetch_assoc($q);
    $id  = (int)$row['cart_id'];
    $qty = (int)$row['cart_pro_qty'];
    $max = (int)$row['cart_pro_max_qty'];

    switch ($action) {
        case 'increase':
            $newQty = min($qty + 1, $max);
            mysqli_query($dbcon, "UPDATE sm_cart SET cart_pro_qty='$newQty' WHERE cart_id='$id'");
            break;

        case 'decrease':
            if ($qty > 1) {
                $newQty = $qty - 1;
                mysqli_query($dbcon, "UPDATE sm_cart SET cart_pro_qty='$newQty' WHERE cart_id='$id'");
            }
            break;

        case 'remove':
            mysqli_query($dbcon, "DELETE FROM sm_cart WHERE cart_id='$id'");
            break;

        default:
            echo "ERROR: Invalid action";
            exit;
    }

    // ✅ Now fetch updated cart totals after the database update
    include 'fetch-cart.php';
    exit;
}

// ================ GUEST USER (SESSION) ================
if (!isset($_SESSION['cart'][$key])) {
    echo "ERROR: Item not found";
    exit;
}

$qty = (int)$_SESSION['cart'][$key]['qty'];
$max = (int)$_SESSION['cart'][$key]['max_qty'];

switch ($action) {
    case 'increase':
        $_SESSION['cart'][$key]['qty'] = min($qty + 1, $max);
        break;

    case 'decrease':
        if ($qty > 1) {
            $_SESSION['cart'][$key]['qty'] = $qty - 1;
        }
        break;

    case 'remove':
        unset($_SESSION['cart'][$key]);
        break;

    default:
        echo "ERROR: Invalid action";
        exit;
}

// ✅ Recalculate totals for session cart
include 'fetch-cart.php';
exit;
?>