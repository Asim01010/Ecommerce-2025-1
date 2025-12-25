<?php include 'libs/header.php' ?>


<section class="bg-pri">
    <div class="contaienr py-4">
        <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">Guest Checkout</h2>
    </div>
</section>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_SESSION['beretta_cart'])) {

    if (isset($_POST['place_order_guest'])) {

        // Contact Information
        $odr_fullname = $_POST['odr_fullname'];
        $odr_email = $_POST['odr_email'];
        $odr_mobileno = $_POST['odr_mobileno'];

        // Shipping Information
        $odr_ship_address = $_POST['odr_ship_address'];
        $odr_ship_aparment = $_POST['odr_ship_aparment'];
        $odr_ship_country = $_POST['odr_ship_country'];
        $odr_ship_city = $_POST['odr_ship_city'];
        $odr_ship_state = $_POST['odr_ship_state'];
        $odr_ship_postalcode = $_POST['odr_ship_postalcode'];

        // Payment Method
        $odr_payment_method = $_POST['odr_payment_method'];

        // Order Number Generator
        $odr_no = rand(100000, 999999);
        $odr_no = "BS" . $odr_no;


        $odr_pro_id = array();
        $odr_pro_name = array();
        $odr_pro_size = array();
        $odr_pro_color = array();
        $odr_pro_price = array();
        $odr_pro_qty = array();
        $odr_total_price = 0;

        foreach ($_SESSION['beretta_cart'] as $key => $value) {
            array_push($odr_pro_id, $value["pro_id"]);
            array_push($odr_pro_name, $value["pro_name"]);
            array_push($odr_pro_size, $value["pro_size"]);
            array_push($odr_pro_color, $value["pro_color"]);
            array_push($odr_pro_price, $value["pro_price"]);
            array_push($odr_pro_qty, $value["pro_qty"]);
            $odr_total_price = $odr_total_price + ($value["pro_qty"] * $value["pro_price"]);
        }
        $odr_pro_id = implode(", ", $odr_pro_id);
        $odr_pro_name = implode(", ", $odr_pro_name);
        $odr_pro_size = implode(", ", $odr_pro_size);
        $odr_pro_color = implode(", ", $odr_pro_color);
        $odr_pro_price = implode(", ", $odr_pro_price);
        $odr_pro_qty = implode(", ", $odr_pro_qty);
        $datetime = date('Y-m-d h:i:s');


        ///////////////////////////////////////----COMPANY MAIL----///////////////////////////////////////////////

        $mail = new PHPMailer(true);

        try {

            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'splash30.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'info@splash30.com';
            $mail->Password   = 'Pakistan@1947';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('info@splash30.com', 'Splash 30');
            $mail->addAddress('info@splash30.com');
            $mail->addReplyTo('info@splash30.com', 'Splash 30');


            //Content
            $mail->isHTML(true);
            $mail->Subject = "New Order Placed!";
            $mail->Body    =  "<table style='border: 1px solid gray; width: 800px; margin: 30px auto; padding: 30px;'>
                <thead>
                <tr>
                <th colspan='2' style='text-align: center;'><img src='https://splash30.com/imgs/logo.svg' style='width: 50%; margin: 20px auto;'></th>
                </tr>
                </thead>
                <tbody>
                <tr style='background: #000;'>
                <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
                CONTACT DETAILS
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Full Name
                </td>
                <td style='padding: 10px 30px;'>
                $odr_fullname
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Mobile Number
                </td>
                <td style='padding: 10px 30px;'>
                $odr_mobileno
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Email Address
                </td>
                <td style='padding: 10px 30px;'>
                $odr_email
                </td>
                </tr>
                
                <tr style='background: #000;'>
                <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
                SHIPPING DETAILS
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Address:
                </td>
                <td style='padding: 10px 30px;'>
                $odr_ship_address
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Country, City
                </td>
                <td style='padding: 10px 30px;'>
                $odr_ship_country, $odr_ship_city
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                State:
                </td>
                <td style='padding: 10px 30px;'>
                $odr_ship_state
                </td>
                </tr>
                <tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Postal Code
                </td>
                <td style='padding: 10px 30px;'>
                $odr_ship_postalcode
                </td>
                </tr>
                
                <tr style='background: #000;'>
                <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
                ORDER DETAILS
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Order Type
                </td>
                <td style='padding: 10px 30px;'>
                Guest
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Product(s)
                </td>
                <td style='padding: 10px 30px;'>
                $odr_pro_name
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Product(s) Sizes
                </td>
                <td style='padding: 10px 30px;'>
                $odr_pro_size
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Product(s) Colors
                </td>
                <td style='padding: 10px 30px;'>
                $odr_pro_color
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Product(s) Price
                </td>
                <td style='padding: 10px 30px;'>
                $odr_pro_price
                </td>
                </tr>
                <tr>
                <td style='padding: 10px 30px;'>
                Product(s) QTY
                </td>
                <td style='padding: 10px 30px;'>
                $odr_pro_qty
                </td>
                </tr>                
                <tr>
                <td style='padding: 10px 30px;'>
                <b>Grand Total:</b>
                </td>
                <td style='padding: 10px 30px;'>
                <b>$odr_total_price PKR</b>
                </td>
                </tr>
                
                <tr style='background: #f3f3f3;'>
                <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px; color: black;'>
                Email is Powered By <a href='https://www.swismax.com' style='color: red;'>Swismax Solutions FZE</a>
                </td>
                </tr>
                </tbody>
                </table>";

            if (!$mail->send()) {
                $message =  '<div class="container">
                    <div style="min-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center;" id="alert-box">
                        <img src="imgs/cross.png" width="100" class="mb-2" alt="">
                        <h3 class="font-bold text-2xl mb-3">Something Went Wrong!</h3>
                        <p class="text-center mb-5">Dear, customer please check you internet connection and try again.</p>
                        <a href="index.php" class="text-white bg-pri py-3 px-5"> Continue Shopping</a>
                        </div>
                    </div>';
            } else {

                ///////////////////////////////////////----CUTOMER MAIL----///////////////////////////////////////////////

                $mail = new PHPMailer(true);

                try {

                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'splash30.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'info@splash30.com';
                    $mail->Password   = 'Pakistan@1947';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    //Recipients
                    $mail->setFrom('info@splash30.com', 'Splash 30');
                    $mail->addAddress($odr_email);
                    $mail->addReplyTo('info@splash30.com', 'Splash 30');


                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = "Thank you for ordering form Splash 30";
                    $mail->Body    =  "<table style='border: 1px solid gray; width: 800px; margin: 30px auto; padding: 30px;'>
                    <thead>
                    <tr>
                    <th colspan='2' style='text-align: center;'><img src='https://splash30.com/imgs/logo.svg' style='width: 50%; margin: 20px auto;'></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style='background: #000;'>
                    <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
                    THANK YOU MESSAGE
                    </td>
                    </tr>
                    <tr>
                    <td colspan='2' style='padding: 10px 30px;'>
                    <p>
                    Dear $odr_fullname,<BR>
                    Your Order has been placed successfully.<BR>Thank you for ordering from Splash 30<BR><BR>
                    <strong>Kindest Regards,</strong><BR>
                    Splash 30
                    </p>
                    </td>
                    </tr>
                    <tr style='background: #000;'>
                    <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px;'>
                    ORDER DETAILS
                    </td>
                    </tr>
                    <tr>
                    <td style='padding: 10px 30px;'>
                    Product(s)
                    </td>
                    <td style='padding: 10px 30px;'>
                    $odr_pro_name
                    </td>
                    </tr>
                    <tr>
                    <td style='padding: 10px 30px;'>
                    Product(s) Sizes
                    </td>
                    <td style='padding: 10px 30px;'>
                    $odr_pro_size
                    </td>
                    </tr>
                    <tr>
                    <td style='padding: 10px 30px;'>
                    Product(s) Colors
                    </td>
                    <td style='padding: 10px 30px;'>
                    $odr_pro_color
                    </td>
                    </tr>
                    <tr>
                    <td style='padding: 10px 30px;'>
                    Product(s) Price
                    </td>
                    <td style='padding: 10px 30px;'>
                    $odr_pro_price
                    </td>
                    </tr>
                    <tr>
                    <td style='padding: 10px 30px;'>
                    Product(s) QTY
                    </td>
                    <td style='padding: 10px 30px;'>
                    $odr_pro_qty
                    </td>
                    </tr>
                    <tr>
                    <td style='padding: 10px 30px;'>
                    <b>Grand Total:</b>
                    </td>
                    <td style='padding: 10px 30px;'>
                    <b>$odr_total_price PKR</b>
                    </td>
                    </tr>
                    <tr style='background: #f3f3f3;'>
                    <td colspan='2' style='padding: 10px 30px; color: white; font-weight: bold; letter-spacing: 2px; color: black;'>
                    Email is Powered By <a href='https://www.swismax.com' style='color: red;'>Swismax Solutions FZE</a>
                    </td>
                    </tr>
                    </tbody>
                    </table>";
                    if (!$mail->send()) {
                        $message =  '<div class="container">
                        <div style="min-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center;" id="alert-box">
                            <img src="imgs/cross.png" width="100" class="mb-2" alt="">
                            <h3 class="font-bold text-2xl mb-3">Something Went Wrong!</h3>
                            <p class="text-center mb-5">Dear, customer please check you internet connection and try again.</p>
                            <a href="index.php" class="text-white bg-pri py-3 px-5"> Continue Shopping</a>
                            </div>
                        </div>';
                    } else {
                        $ordersql = mysqli_query($dbcon, "INSERT INTO sm_orders VALUES('', '$odr_no', 'guest', '$odr_pro_id', '$odr_pro_qty', '$odr_pro_size', '$odr_pro_color', '$odr_total_price', '', '$odr_email', '$odr_fullname', '$odr_mobileno', '$odr_ship_city', '$odr_ship_country', '$odr_ship_address','$odr_ship_aparment', '$odr_ship_state', '$odr_ship_postalcode', '', '', '$odr_payment_method', '1', '', '$datetime')") or die(mysqli_error($dbcon));
                        if ($ordersql) {

                            // Reducing the quantity
                            foreach ($_SESSION['beretta_cart'] as $key => $value) {
                                $pro_id = $value['pro_id'];
                                $pro_color = $value['pro_color'];
                                $pro_size = $value['pro_size'];
                                $pro_qty = $value['pro_qty'];

                                $pro_color_details = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_pro_id = '$pro_id' AND pc_name = '$pro_color'") or die(mysqli_error($dbcon));
                                while ($pro_color_row = mysqli_fetch_assoc($pro_color_details)) {

                                    $size =  explode("_", $pro_color_row['pc_size']);
                                    $qty =  explode("_", $pro_color_row['pc_qty']);

                                    $qty_array = array();

                                    foreach ($size as $key2 => $value2) {
                                        if ($size[$key2] == $pro_size) {
                                            $qty[$key2] = $qty[$key2] - $pro_qty;
                                        }
                                        array_push($qty_array, $qty[$key2]);
                                    }

                                    $products = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE  pro_id='$pro_id'") or die(mysqli_error($dbcon));
                                    if ($pro_row = mysqli_fetch_assoc($products)) {
                                        $pro_qty = $pro_row['pro_ava_qty'];
                                        $updated_qty = $pro_qty - $value['pro_qty'];
                                        $update_pro = mysqli_query($dbcon, "UPDATE sm_products SET pro_ava_qty='$updated_qty' WHERE pro_id = '$pro_id'") or die(mysqli_error($dbcon));
                                    }

                                    $updated_size_qty = implode("_", $qty_array);

                                    // echo $pro_color_row['pc_qty'];
                                    // echo "<BR>";
                                    // echo $updated_size_qty;
                                    // echo "<BR>";
                                    // echo $updated_qty;
                                    // echo "<BR>";
                                    // print_r($_SESSION['beretta_cart']);
                                    // echo "<BR>";

                                    $update_pro_color = mysqli_query($dbcon, "UPDATE sm_products_colors SET pc_qty ='$updated_size_qty' WHERE pc_pro_id = '$pro_id' AND pc_name = '$pro_color'") or die(mysqli_error($dbcon));
                                    if ($update_pro_color) {
                                        unset($_SESSION['beretta_cart']);
                                        $message =  '<div class="container">
                                        <div style="min-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center;" id="alert-box">
                                            <img src="imgs/accept.png" width="100" class="mb-2" alt="">
                                            <h3 class="font-bold text-2xl mb-3">Order Placed Successfully!</h3>
                                            <p class="text-center mb-5">Dear, customer thank you for shopping from Splash 30.<BR> Order details are sent to you via email.</p>
                                            <a href="index.php" class="text-white bg-pri py-3 px-5"> Continue Shopping</a>
                                            </div>
                                        </div>';
                                    }
                                }
                            }
                        } else {
                            $message =  '<div class="container">
                            <div style="min-height: 80vh; display: flex; flex-direction: column; align-items: center; justify-content: center;" id="alert-box">
                                <img src="imgs/cross.png" width="100" class="mb-2" alt="">
                                <h3 class="font-bold text-2xl mb-3">Something Went Wrong!</h3>
                                <p class="text-center mb-5">Dear, customer please check you internet connection and try again.</p>
                                <a href="index.php" class="text-white bg-pri py-3 px-5"> Continue Shopping</a>
                                </div>
                            </div>';
                        }
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    if (isset($message)) {
        echo $message;
    } else { ?>
        <section>
            <div class="container py-16 ">
                <form method="post" class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 pr-0 lg:pr-10 mb-10 lg:mb-0">
                        <div class="mb-8">
                            <h4 class="font-bold text-2xl lg:text-3xl text-pri mb-4">Contact Information</h4>
                            <div class="flex flex-col gap-3 justify-center">
                                <input type="text" name="odr_fullname" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Full Name" required>
                                <input type="email" name="odr_email" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Email Address" required>
                                <input type="number" name="odr_mobileno" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Mobile Number" required>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h4 class="font-bold text-2xl lg:text-3xl text-pri mb-4">Shipping Information</h4>
                            <div class="flex flex-col gap-3 justify-center">
                                <input type="text" name="odr_ship_address" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Address" required>
                                <input type="text" name="odr_ship_aparment" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Apartment, suite, etc. (optional)">
                                <div class="flex flex-wrap lg:flex-nowrap gap-3">
                                    <input type="text" name="odr_ship_country" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full lg:w-1/2" placeholder="Country">
                                    <input type="text" name="odr_ship_city" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full lg:w-1/2" placeholder="City">
                                </div>
                                <div class="flex flex-wrap lg:flex-nowrap gap-3">
                                    <input type="text" name="odr_ship_state" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full lg:w-1/2" placeholder="State">
                                    <input type="number" name="odr_ship_postalcode" class="text-sm text-base border outline-none hover:border-pri px-5 py-2 w-full lg:w-1/2" placeholder="Postal Code">
                                </div>
                                <!-- <div class="flex flex-col gap-2">
                                    <div>
                                        <input type="checkbox" name="odr_bill_ship" id="toggle_billingform">
                                        <label for="" class="text-sm">Billing Address is same as Shipping Address.</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="save_ship_address">
                                        <label for="" class="text-sm">Save this information for Future Shopping</label>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- <div class="mb-8" id="billingform">
                            <h4 class="font-bold text-2xl lg:text-3xl text-pri mb-4">Billing Information</h4>
                            <div class="flex flex-col gap-3 justify-center">
                                <input type="text" name="odr_bill_address" class="border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Address">
                                <input type="text" name="odr_bill_aparment" class="border outline-none hover:border-pri px-5 py-2 w-full" placeholder="Apartment, suite, etc. (optional)">
                                <div class="flex gap-2">
                                    <input type="text" name="odr_bill_country" class="border outline-none hover:border-pri px-5 py-2 w-1/2" placeholder="Country">
                                    <input type="text" name="odr_bill_city" class="border outline-none hover:border-pri px-5 py-2 w-1/2" placeholder="City">
                                </div>
                                <div class="flex gap-2">
                                    <input type="text" name="odr_bill_state" class="border outline-none hover:border-pri px-5 py-2 w-1/2" placeholder="State">
                                    <input type="number" name="odr_bill_postalcode" class="border outline-none hover:border-pri px-5 py-2 w-1/2" placeholder="Postal Code">
                                </div>
                                <div class="flex gap-2">
                                    <input type="checkbox" name="save_bill_address">
                                    <label for="" class="text-sm">Save this information for Future Shopping</label>
                                </div>
                            </div>
                        </div> -->

                        <div>
                            <h4 class="font-bold text-2xl lg:text-3xl text-pri mb-4">Payment Method</h4>
                            <div class="flex flex-col gap-3 justify-center">
                                <!--<div class="flex gap-2">-->
                                <!--    <input type="radio" name="odr_payment_method" value="Cheque Payment">-->
                                <!--    <label for="" class="text-sm">Cheque Payment</label>-->
                                <!--</div> -->

                                <div>
                                    <div class="flex gap-2 mb-2">
                                        <input type="radio" name="odr_payment_method" id="bank_transfer" value="Direct Bank Transfer" checked>
                                        <label for="" class="text-sm">Direct Bank Transfer</label>
                                    </div>
                                    <div id="bank_details">
                                        <table class="border text-sm">
                                            <tr>
                                                <td class="px-4 py-2"><b>Bank Name</b></td>
                                                <td class="px-4 py-2">Faysal Bank Limited</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2"><b>Account Name</b></td>
                                                <td class="px-4 py-2">SPLASH30 (PRIVATE) LIMITED</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2"><b>Account No</b></td>
                                                <td class="px-4 py-2">3105301000004348</td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-2"><b>IBAN</b></td>
                                                <td class="px-4 py-2">PK16FAYS3105301000004348</td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--    <td class="px-4 py-2"><b>Beneficiary Name</b></td>-->
                                            <!--    <td class="px-4 py-2">VISION 2020</td>-->
                                            <!--</tr>-->
                                        </table>
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <input type="radio" name="odr_payment_method" value="Cash On Delivery (COD)">
                                    <label for="" class="text-sm">Cash On Delivery (COD)</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 h-full bg-transparent lg:bg-gray-100 lg:border px-0 lg:px-10 py-5 sticky top-16">
                        <h3 class="text-xl lg:text-2xl font-medium mb-5">Cart (<span class="cart_count">0</span>)</h3>

                        <div class="relative overflow-x-auto mb-5">
                            <table class="w-[220%] lg:w-[170%]">
                                <tbody id="cart_details">

                                </tbody>
                            </table>
                        </div>

                        <div class="bg-pri p-5 ml-auto text-white">
                            <h3 class="text-lg lg:text-xl font-bold text-center mb-5">Order Summary</h3>
                            <div class="flex justify-between border-t py-3 text-sm lg:text-base font-medium">
                                <h4>Total Items:</h4>
                                <p class="cart_count">0</p>
                            </div>
                            <div class="flex justify-between border-y py-3 text-sm lg:text-base font-medium mb-12">
                                <h4>Total:</h4>
                                <p class="total_price">0</p>
                            </div>

                            <div class="flex justify-between items-center text-xs lg:text-base">
                                <a href="./" class="">Continue Shopping</a>
                                <button type="submit" name="place_order_guest" class="bg-white text-pri font-medium py-3 px-5">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
<?php
    }
} else {
    echo "<script>window.location.href = './'</script>";
}
?>




<?php include 'libs/footer.php' ?>