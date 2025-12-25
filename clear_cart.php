<?php
session_start();
include 'libs/dbconfig.php';
header('Content-Type: application/json; charset=utf-8');

$key = $_POST['key'] ?? null;
$clear_all = isset($_POST['clear_all']);

if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
    if ($clear_all) {
        mysqli_query($dbcon, "DELETE FROM sm_cart WHERE cart_uid='$sm_id'") or die(mysqli_error($dbcon));
        echo json_encode(['status'=>'success']);
        exit;
    }
    if ($key) {
        $parts = explode('_',$key);
        $pid = mysqli_real_escape_string($dbcon, $parts[0]);
        $size = mysqli_real_escape_string($dbcon, $parts[1] ?? 'No Size');
        $color = mysqli_real_escape_string($dbcon, $parts[2] ?? 'No Color');
        mysqli_query($dbcon, "DELETE FROM sm_cart WHERE cart_uid='$sm_id' AND cart_pro_id='$pid' AND cart_pro_size='$size' AND cart_pro_color='$color'") or die(mysqli_error($dbcon));
        echo json_encode(['status'=>'success']);
        exit;
    }
    echo json_encode(['status'=>'error','message'=>'Invalid parameters']); exit;
} else {
    if ($clear_all) {
        unset($_SESSION['cart']);
        echo json_encode(['status'=>'success']); exit;
    }
    if ($key && isset($_SESSION['cart'][$key])) {
        unset($_SESSION['cart'][$key]);
        echo json_encode(['status'=>'success']); exit;
    }
    echo json_encode(['status'=>'error','message'=>'Invalid parameters']); exit;
}