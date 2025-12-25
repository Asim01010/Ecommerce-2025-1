<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include 'libs/dbconfig.php';

header('Content-Type: application/json');

$pro_id = $_POST['pro_id'] ?? '';
$in_wishlist = false;

if (empty($pro_id)) {
    echo json_encode(['in_wishlist' => false]);
    exit;
}

// Check for logged-in user
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    $pid = mysqli_real_escape_string($dbcon, $pro_id);
    
    $check = mysqli_query($dbcon, "SELECT * FROM sm_wishlist WHERE wishlist_uid='$sm_id' AND wishlist_pro_id='$pid'");
    $in_wishlist = mysqli_num_rows($check) > 0;
}
// Check for guest user
else {
    if (!empty($_SESSION['wishlist'])) {
        foreach ($_SESSION['wishlist'] as $item) {
            if ($item['id'] == $pro_id) {
                $in_wishlist = true;
                break;
            }
        }
    }
}

echo json_encode(['in_wishlist' => $in_wishlist]);
?>