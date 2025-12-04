<?php include 'libs/header.php' ?>

<section class="bg-pri">
    <div class="contaienr py-4">
        <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">My Orders Details</h2>
    </div>
</section>


<?php
if ($_GET['odr_no']) {
    $odr_no = $_GET['odr_no'];
    if (isset($_SESSION['sm_id'])) {
        $sm_id = $_SESSION['sm_id']; ?>

        <section class="relative py-16">
            <div class="container flex flex-wrap lg:flex-nowrap gap-8">
                <?php include 'libs/profile_sidenav.php'; ?>
                <div class="w-full lg:w-[75%] order-1 lg:order-2">
                    <div class="">
                        <?php
                        $get_order = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_no='$odr_no'") or die(mysqli_error($dbcon));
                        while ($order_row = mysqli_fetch_array($get_order)) {
                            $odr_pro_id = explode(", ", $order_row['odr_pro_id']);
                            $odr_pro_qty = explode(", ", $order_row['odr_pro_qty']);
                            $odr_pro_size = explode(", ", $order_row['odr_pro_size']);
                            $pro_count = count($odr_pro_id); ?>
                            <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5"><?= $odr_no ?> - Products Details</h3>
                            <div class="relative overflow-x-auto mb-8">
                                <table class="w-[200%] lg:w-full text-xs lg:text-base">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="p-2">Image</th>
                                            <th class="p-2">Name</th>
                                            <th class="p-2">Price</th>
                                            <th class="p-2">Quantity</th>
                                            <th class="p-2">Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center divide-y">
                                        <?php
                                        for ($i = 0; $i < $pro_count; $i++) {
                                            $get_pro = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_id = '" . $odr_pro_id[$i] . "'") or die(mysqli_error($dbcon));
                                            while ($pro_row = mysqli_fetch_assoc($get_pro)) { ?>
                                                <tr>
                                                    <td class="p-2"><img src="imgs/products/<?php echo $pro_row['pro_image'] ?>" style="height: 100px" alt=""></td>
                                                    <td class="p-2"><?php echo $pro_row['pro_name'] ?></td>
                                                    <td class="p-2"><?php echo $pro_row['pro_price'] ?></td>
                                                    <td class="p-2"><?php echo $odr_pro_qty[$i] ?></td>
                                                    <td class="p-2"><?php echo $pro_row['pro_price'] * $odr_pro_qty[$i] ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5"><?= $odr_no ?> - Delivery Details</h3>
                            <div class="flex flex-wrap lg:flex-nowrap gap-6 items-start">
                                <table class="w-full lg:w-1/2 text-xs lg:text-base">
                                    <tbody class="divide-y">
                                        <tr>
                                            <td class="p-2"><b>Full Name</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_full_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Mobile Number</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_contact_no'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Email</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_email'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Address, Appartment</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_address'] . ", " . $order_row['odr_appartment_suite'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Country, City</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_country'] . ", " . $order_row['odr_city'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>State, Postal Code</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_state'] . ", " . $order_row['odr_postal_code'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Payment Method</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_payment_method'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-full lg:w-1/2 text-xs lg:text-base">
                                    <tbody class="text-end divide-y">
                                        <tr>
                                            <td class="p-2"><b>Total Items</b></td>
                                            <td class="p-2"><?php echo $pro_count; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Shipping Charges</b></td>
                                            <td class="p-2">0</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2"><b>Total Amount</b></td>
                                            <td class="p-2"><?php echo $order_row['odr_total_price']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

<?php
    } else {
        echo "<script> window.location.href = 'index.php'; </script>";
    }
} else {
    echo "<script> window.location.href = 'index.php'; </script>";
}
?>



<?php include 'libs/footer.php' ?>