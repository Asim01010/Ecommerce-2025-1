<?php
session_start();
require_once "libs/dbconfig.php";

if (!isset($_POST['action']) || $_POST['action'] !== 'remove_wishlist') {
    echo 'invalid';
    exit;
}

$pro_id = $_POST['pro_id'] ?? null;
$key = $_POST['key'] ?? null;
$color = $_POST['pro_color'] ?? '';
$size  = $_POST['pro_size'] ?? '';

if (!$pro_id && !$key) {
    echo 'missing_id';
    exit;
}

// ------------------- LOGGED-IN USER -------------------
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $pro_id = mysqli_real_escape_string($dbcon, $pro_id);
    $color = mysqli_real_escape_string($dbcon, $color);
    $size = mysqli_real_escape_string($dbcon, $size);

    // ✅ delete only that specific color/size variant
    $query = "
        DELETE FROM sm_wishlist 
        WHERE wishlist_uid = '$sm_id' 
        AND wishlist_pro_id = '$pro_id'
        AND wishlist_pro_color = '$color'
        AND wishlist_pro_size = '$size'
    ";

    $result = mysqli_query($dbcon, $query) or die(mysqli_error($dbcon));

    if ($result && mysqli_affected_rows($dbcon) > 0) {
        // Check if wishlist is empty now
        $res = mysqli_query($dbcon, "SELECT COUNT(*) as cnt FROM sm_wishlist WHERE wishlist_uid = '$sm_id'");
        $row = mysqli_fetch_assoc($res);
        echo ($row['cnt'] == 0) ? 'wishlist_empty' : 'removed';
    } else {
        echo 'not_found';
    }
    exit;
}



// ------------------- GUEST USER -------------------
if (isset($_SESSION['wishlist']) && is_array($_SESSION['wishlist'])) {
    $removed = false;
    $pro_id = $_POST['pro_id'] ?? null;

    if ($pro_id) {
        foreach ($_SESSION['wishlist'] as $index => $item) {
            if (isset($item['id']) && $item['id'] == $pro_id) {
                unset($_SESSION['wishlist'][$index]);
                $removed = true;
                break;
            }
        }
    }

    if ($removed) {
        // Reindex after removing
        $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
        echo empty($_SESSION['wishlist']) ? 'wishlist_empty' : 'removed';
    } else {
        echo 'not_found';
    }
    exit;
}
echo 'not_found';
?>