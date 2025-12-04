<?php
// place_order.php
session_start();
include 'libs/dbconfig.php';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

header('Content-Type: application/json; charset=utf-8');

// Catch all errors
try {
    if (!isset($_SESSION['sm_id'])) {
        throw new Exception("signin_required");
    }

    $sm_id = (int)$_SESSION['sm_id'];
    $sm_email = $_SESSION['sm_email'] ?? '';
    $sm_username = $_SESSION['sm_username'] ?? '';
    $sm_contact = $_SESSION['sm_contact_no'] ?? '';
    $now = date('Y-m-d H:i:s');
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

    $payment_method = mysqli_real_escape_string($dbcon, $_POST['payment_method'] ?? 'cod');
    $pmid = mysqli_real_escape_string($dbcon, $_POST['pmid'] ?? '');
    $order_type = 'online';

    $selected_address_id = isset($_POST['selected_address_id']) ? (int)$_POST['selected_address_id'] : 0;

    mysqli_begin_transaction($dbcon);

    // ===== ADDRESS =====
    if ($selected_address_id > 0) {
        $q = "SELECT * FROM sm_addressbook WHERE ab_id = '$selected_address_id' AND ab_uid = '$sm_id'";
        $r = mysqli_query($dbcon, $q);
        if (mysqli_num_rows($r) == 0) throw new Exception("address_not_found");
        $addressRow = mysqli_fetch_assoc($r);
        $ab_id = $selected_address_id;
    } else {
        $postal = trim($_POST['postal_code'] ?? '');
        $apartment = trim($_POST['apartment_suite'] ?? '');
        $state = trim($_POST['state'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $country = trim($_POST['country'] ?? '');
        $address = trim($_POST['address'] ?? '');

        if (!$address || !$city || !$country) throw new Exception("address_required");

        $q = "INSERT INTO sm_addressbook(ab_uid, ab_postal_code, ab_country, ab_state, ab_city, ab_appartment_suite, ab_address)
              VALUES('$sm_id', '$postal', '$country', '$state', '$city', '$apartment', '$address')";
        if (!mysqli_query($dbcon, $q)) throw new Exception("address_insert_fail: ".mysqli_error($dbcon));

        $ab_id = mysqli_insert_id($dbcon);
        $addressRow = [
            'ab_postal_code' => $postal,
            'ab_country' => $country,
            'ab_state' => $state,
            'ab_city' => $city,
            'ab_appartment_suite' => $apartment,
            'ab_address' => $address
        ];
    }

    // ===== CART =====
    $cartItems = [];
    $grandTotal = 0;

   $q = "SELECT 
        sc.cart_pro_id, 
        sc.cart_pro_qty, 
        sc.cart_pro_color,  -- 👈 ADD THIS
        sc.cart_pro_size,   -- 👈 ADD THIS (optional)
        p.pro_name, 
        p.pro_image, 
        p.pro_price, 
        p.pro_discount
      FROM sm_cart sc 
      JOIN sm_products p ON p.pro_id = sc.cart_pro_id
      WHERE sc.cart_uid = '$sm_id'";

    $r = mysqli_query($dbcon, $q);
    if (mysqli_num_rows($r) == 0) throw new Exception("cart_empty");

    while ($row = mysqli_fetch_assoc($r)) {
        $original = (float)$row['pro_price'];
        $discount = (float)$row['pro_discount'];
        $finalPrice = $discount > 0 ? $original - ($original * $discount / 100) : $original;

        $qty = (int)$row['cart_pro_qty'];
        $line = $finalPrice * $qty;
        $grandTotal += $line;

     $cartItems[] = [
    'id' => (int)$row['cart_pro_id'],
    'qty'=> $qty,
    'name'=> $row['pro_name'],
    'price'=> $finalPrice,
    'color'=> $row['cart_pro_color'],   // 👈 ADD THIS
    'size'=> $row['cart_pro_size'],     // 👈 ADD THIS (optional)
    'lineTotal'=> $line
];

    }

    // ===== ORDER NUMBER =====
    $odr_no = 'ODR'.date('YmdHis').rand(100,999);

    // ===== CUSTOMER INFO =====
    $cust_name = trim(($_SESSION['sm_firstname'] ?? '').' '.($_SESSION['sm_lastname'] ?? '')) ?: $sm_username;
    $cust_email = $sm_email;
    $cust_contact = $sm_contact;
    $cust_city = $addressRow['ab_city'];
    $cust_country = $addressRow['ab_country'];
    $cust_address = $addressRow['ab_address'];
    $cust_apartment = $addressRow['ab_appartment_suite'];
    $cust_state = $addressRow['ab_state'];
    $cust_postal = $addressRow['ab_postal_code'];

    // ===== INSERT ORDER =====
    foreach ($cartItems as $it) {
        $line = number_format($it['lineTotal'], 2, '.', '');
       $q = "INSERT INTO sm_orders
(
  odr_no, odr_type, odr_pro_id, odr_pro_qty, odr_pro_size, odr_pro_color,
  odr_total_price, odr_user_id, odr_email, odr_full_name, odr_contact_no,
  odr_city, odr_country, odr_address, odr_appartment_suite, odr_state, odr_postal_code,
  odr_adbid, odr_pmid, odr_payment_method, odr_status, odr_user_ip, odr_date_time
) VALUES (
  '$odr_no', '$order_type', '{$it['id']}', '{$it['qty']}', '{$it['size']}', '{$it['color']}',
  '$line', '$sm_id', '$cust_email', '$cust_name', '$cust_contact',
  '$cust_city', '$cust_country', '$cust_address', '$cust_apartment', '$cust_state', '$cust_postal',
  '$ab_id', '$pmid', '$payment_method', '1', '$client_ip', '$now'
)";

        if (!mysqli_query($dbcon, $q)) throw new Exception("order_insert_fail: ".mysqli_error($dbcon));
    }

    mysqli_query($dbcon, "DELETE FROM sm_cart WHERE cart_uid = '$sm_id'");
    mysqli_commit($dbcon);

    // ===== SEND EMAIL =====
 $mail = new PHPMailer\PHPMailer\PHPMailer(true);

$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Order #$odr_no</title>
<style>
/* Minimal Tailwind reset for email compatibility */
body { font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; margin:0; padding:0; background-color:#f9fafb; color:#1f2937; }
.container { max-width:700px; margin:20px auto; background-color:#ffffff; padding:24px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.05); }
h2 { color:#3b82f6; font-size:24px; font-weight:700; text-align:center; margin-bottom:16px; }
p { margin-bottom:8px; font-size:14px; line-height:1.6; }
.table { width:100%; border-collapse:collapse; margin-top:20px; }
.table th, .table td { border:1px solid #e5e7eb; padding:12px; text-align:left; font-size:14px; }
.table th { background-color:#3b82f6; color:#ffffff; }
.total { font-weight:700; text-align:right; margin-top:16px; font-size:16px; color:#3b82f6; }
.footer { margin-top:24px; font-size:12px; color:#6b7280; text-align:center; }
</style>
</head>
<body>
<div class="container">
    <h2>New Order: #$odr_no</h2>
    <p><strong>Customer:</strong> $cust_name ($cust_email) — $cust_contact</p>
    <p><strong>Address:</strong> $cust_address, $cust_apartment, $cust_city, $cust_state, $cust_country - $cust_postal</p>
    <p><strong>Order Time:</strong> $now</p>

    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Color</th>
                <th>Price</th>
                <th>Line Total</th>
            </tr>
        </thead>
        <tbody>
HTML;

// Add cart items
foreach ($cartItems as $it) {
    $html .= "<tr>
                <td>{$it['id']}</td>
                <td>{$it['name']}</td>
                <td>{$it['qty']}</td>
                <td>{$it['color']}</td>
                <td>$".number_format($it['price'],2)."</td>
                <td>$".number_format($it['lineTotal'],2)."</td>
              </tr>";
}

$html .= <<<HTML
        </tbody>
    </table>
    <p class="total">Grand Total: $".number_format($grandTotal,2)."</p>
    <div class="footer">
        Thank you for your order!<br>
        This is an automated email, please do not reply.
    </div>
</div>
</body>
</html>
HTML;


    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'masimqw4hd@gmail.com';
        $mail->Password = 'emvlaajytmhgtpvx';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('masimqw4hd@gmail.com', 'Your Store');
        $mail->addAddress('masimqw4hd@gmail.com', 'Admin');
        $mail->isHTML(true);
        $mail->Subject = "New Order #$odr_no";
        $mail->Body = $html;
        $mail->send();
    } catch (Exception $e) {
        error_log("Email error: ".$mail->ErrorInfo);
    }

    // ===== RESPONSE =====
    echo json_encode(['status'=>'success','odr_no'=>$odr_no]);

} catch(Exception $e) {
    if (isset($dbcon) && mysqli_errno($dbcon)) mysqli_rollback($dbcon);
    echo json_encode(['status'=>'error','msg'=>$e->getMessage()]);
}
exit;