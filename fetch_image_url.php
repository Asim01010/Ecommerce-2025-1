<?php

header('Content-Type: application/json');
include 'libs/dbconfig.php'; // Include your database connection file

if (isset($_POST['color']) && isset($_POST['pro_id'])) {
    $color = $_POST['color'];
    $pro_id = $_POST['pro_id'];

    // Fetch the image based on the color and product ID
    $query = "SELECT img_link FROM sm_products_images WHERE img_color = '$color' AND img_pro_id = '$pro_id'";
    $result = mysqli_query($dbcon, $query);

    $images = []; // Initialize an array for images

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $images[] = 'imgs/products/' . $row['img_link'];
        }
        echo json_encode($images);
    } else {
        echo json_encode(['default' => 'imgs/products/default.jpg']);
    }
    exit; // Ensure no additional output occurs
}
?>
