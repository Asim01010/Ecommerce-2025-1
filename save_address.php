<?php
session_start();
include 'libs/dbconfig.php';

// Check if user is logged in
if (!isset($_SESSION['sm_id'])) {
    echo "not_logged_in";
    exit;
}

$uid = $_SESSION['sm_id'];

// Get POST data
$postal_code = $_POST['postal_code'] ?? '';
$country = $_POST['country'] ?? '';
$state = $_POST['state'] ?? '';
$city = $_POST['city'] ?? '';
$apartment_suite = $_POST['apartment_suite'] ?? '';
$address = $_POST['address'] ?? '';


// Validation
if (empty($address) || empty($city)) {
    echo "error_missing_fields";
    exit;
}

// Insert address linked to this user
$query = "INSERT INTO sm_addressbook 
    (ab_uid, ab_postal_code, ab_country, ab_state, ab_city, ab_appartment_suite, ab_address)
    VALUES 
    ('$uid', '$postal_code', '$country', '$state', '$city', '$apartment_suite', '$address')";

$result = mysqli_query($dbcon, $query);

if ($result) {
    echo "success";
} else {
    echo "error_sql: " . mysqli_error($dbcon);
}
?>