<?php
include 'libs/dbconfig.php';
session_start();

if (!isset($_SESSION['sm_id'])) {
    echo "unauthorized";
    exit;
}

if (!isset($_POST['id'])) {
    echo "no_id";
    exit;
}

$addressId = intval($_POST['id']);
$sm_id = $_SESSION['sm_id'];

$deleteQuery = "DELETE FROM sm_addressbook WHERE ab_id = '$addressId' AND ab_uid = '$sm_id'";
if (mysqli_query($dbcon, $deleteQuery)) {
    echo "success";
} else {
    echo "error";
}
?>