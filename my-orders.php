<?php include 'libs/header.php' ?>

<section class="bg-pri">
    <div class="contaienr py-4">
        <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">My Orders</h2>
    </div>
</section>


<?php
if (isset($_SESSION['sm_id'])) {
    $sm_id = $_SESSION['sm_id']; ?>

    <section class="relative py-16">
        <div class="container flex flex-wrap lg:flex-nowrap gap-8">
            <?php include 'libs/profile_sidenav.php'; ?>
            <div class="w-full lg:w-[75%] order-1 lg:order-2">
                <div class="mb-8">
                    <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Order under Approval</h3>
                    <?php
                    $get_order = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_user_id='$sm_id' AND odr_status = 1") or die(mysqli_error($dbcon));
                    if (mysqli_num_rows($get_order) > 0) { ?>
                        <div class="relative overflow-x-auto">
                            <table class="w-[200%] lg:w-full text-xs lg:text-base">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2">Order Number</th>
                                        <th class="p-2">Order Date/Time</th>
                                        <th class="p-2">Order Status</th>
                                        <th class="p-2">Order Details</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center divide-y">
                                    <?php
                                    while ($order_row = mysqli_fetch_array($get_order)) { ?>
                                        <tr>
                                            <td class="p-2"><?php echo $order_row['odr_no'] ?></td>
                                            <td class="p-2"><?php echo $order_row['odr_date_time'] ?></td>
                                            <td class="p-2">Pending</td>
                                            <td class="p-2">
                                                <a href="my-order-details.php?odr_no=<?php echo $order_row['odr_no'] ?>" class="underline">View Order</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else { ?>
                        <p class="bg-blue-100 text-blue-500 px-4 py-2 flex items-center justify-center gap-2"><i class="bi bi-info-circle-fill"></i>No order is under approval.</p>
                    <?php
                    }
                    ?>
                </div>
                <div class="mb-8">
                    <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Order in Process</h3>
                    <?php
                    $get_order = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_user_id='$sm_id' AND odr_status = 2") or die(mysqli_error($dbcon));
                    if (mysqli_num_rows($get_order) > 0) { ?>
                        <div class="relative overflow-x-auto">
                            <table class="w-[200%] lg:w-full text-xs lg:text-base">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2">Order Number</th>
                                        <th class="p-2">Order Date/Time</th>
                                        <th class="p-2">Order Status</th>
                                        <th class="p-2">Order Details</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center divide-y">
                                    <?php
                                    while ($order_row = mysqli_fetch_array($get_order)) { ?>
                                        <tr>
                                            <td class="p-2"><?php echo $order_row['odr_no'] ?></td>
                                            <td class="p-2"><?php echo $order_row['odr_date_time'] ?></td>
                                            <td class="p-2">In Process</td>
                                            <td class="p-2">
                                                <a href="my-order-details.php?odr_no=<?php echo $order_row['odr_no'] ?>" class="underline">View Order</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else { ?>
                        <p class="bg-blue-100 text-blue-500 px-4 py-2 flex items-center justify-center gap-2"><i class="bi bi-info-circle-fill"></i>No order is in process.</p>
                    <?php
                    }
                    ?>
                </div>
                <div class="mb-8">
                    <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Delivered Orders</h3>
                    <?php
                    $get_order = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_user_id='$sm_id' AND odr_status = 3") or die(mysqli_error($dbcon));
                    if (mysqli_num_rows($get_order) > 0) { ?>
                        <div class="relative overflow-x-auto">
                            <table class="w-[200%] lg:w-full text-xs lg:text-base">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2">Order Number</th>
                                        <th class="p-2">Order Date/Time</th>
                                        <th class="p-2">Order Status</th>
                                        <th class="p-2">Order Details</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center divide-y">
                                    <?php
                                    while ($order_row = mysqli_fetch_array($get_order)) { ?>
                                        <tr>
                                            <td class="p-2"><?php echo $order_row['odr_no'] ?></td>
                                            <td class="p-2"><?php echo $order_row['odr_date_time'] ?></td>
                                            <td class="p-2">Delivered</td>
                                            <td class="p-2">
                                                <a href="my-order-details.php?odr_no=<?php echo $order_row['odr_no'] ?>" class="underline">View Order</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else { ?>
                        <p class="bg-blue-100 text-blue-500 px-4 py-2 flex items-center justify-center gap-2"><i class="bi bi-info-circle-fill"></i>No order is delivered.</p>
                    <?php
                    }
                    ?>
                </div>
                <div>
                    <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Cancelled Orders</h3>
                    <?php
                    $get_order = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_user_id='$sm_id' AND odr_status = 4") or die(mysqli_error($dbcon));
                    if (mysqli_num_rows($get_order) > 0) { ?>
                        <div class="relative overflow-x-auto">
                            <table class="w-[200%] lg:w-full text-xs lg:text-base">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-2">Order Number</th>
                                        <th class="p-2">Order Date/Time</th>
                                        <th class="p-2">Order Status</th>
                                        <th class="p-2">Order Details</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center divide-y">
                                    <?php
                                    while ($order_row = mysqli_fetch_array($get_order)) { ?>
                                        <tr>
                                            <td class="p-2"><?php echo $order_row['odr_no'] ?></td>
                                            <td class="p-2"><?php echo $order_row['odr_date_time'] ?></td>
                                            <td class="p-2">Cancelled</td>
                                            <td class="p-2">
                                                <a href="my-order-details.php?odr_no=<?php echo $order_row['odr_no'] ?>" class="underline">View Order</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    } else { ?>
                        <p class="bg-blue-100 text-blue-500 px-4 py-2 flex items-center justify-center gap-2"><i class="bi bi-info-circle-fill"></i>No order is cancelled.</p>
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


?>



<?php include 'libs/footer.php' ?>