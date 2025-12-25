<?php include 'libs/header.php'; ?>

<?php
if (isset($_SESSION['sm_id'])) {
    $sm_id = $_SESSION['sm_id'];
    if (isset($_POST['save_address'])) {
        $ab_address = $_POST['ab_address'];
        $ab_postal_code = $_POST['ab_postal_code'];
        $ab_country = $_POST['ab_country'];
        $ab_city = $_POST['ab_city'];
        $ab_state = $_POST['ab_state'];
        $ab_appartment_suite = $_POST['ab_appartment_suite'];

        $get_addressbook = mysqli_query($dbcon, "SELECT * FROM sm_addressbook WHERE ab_uid = '$sm_id'") or die(mysqli_error($dbcon));
        if (mysqli_num_rows($get_addressbook) > 0) {
            echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Address already exist!"); </script>';
        } else {
            $insert_address = mysqli_query($dbcon, "INSERT INTO sm_addressbook VALUES ('','$sm_id','$ab_postal_code','$ab_country','$ab_state','$ab_city','$ab_appartment_suite','$ab_address')") or die(mysqli_error($dbcon));
            if ($insert_address) {
                echo '<script> $("#success").show().delay(3000).fadeOut("slow"); $("#success_msg").html("New address added."); </script>';
            } else {
                echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Something went wrong!"); </script>';
            }
        }
    } else if (isset($_POST['update_address'])) {
        $ab_address = $_POST['ab_address'];
        $ab_postal_code = $_POST['ab_postal_code'];
        $ab_country = $_POST['ab_country'];
        $ab_city = $_POST['ab_city'];
        $ab_state = $_POST['ab_state'];
        $ab_appartment_suite = $_POST['ab_appartment_suite'];

        $update_address = mysqli_query($dbcon, "UPDATE sm_addressbook SET ab_postal_code='$ab_postal_code',ab_country='$ab_country',ab_state='$ab_state',ab_city='$ab_city',ab_appartment_suite='$ab_appartment_suite',ab_address='$ab_address' WHERE ab_uid = '$sm_id'") or die(mysqli_error($dbcon));
        if ($update_address) {
            echo '<script> $("#success").show().delay(3000).fadeOut("slow"); $("#success_msg").html("Default address updated."); </script>';
        } else {
            echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Something went wrong!"); </script>';
        }
    }
?>

    <section class="bg-pri">
        <div class="contaienr py-4">
            <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">Address Book</h2>
        </div>
    </section>

    <?php

    $get_addressbook = mysqli_query($dbcon, "SELECT * FROM sm_addressbook WHERE ab_uid = '$sm_id'") or die(mysqli_error($dbcon));
    if (mysqli_num_rows($get_addressbook) > 0) {
        if ($address_row = mysqli_fetch_assoc($get_addressbook)) { ?>
            <section class="relative py-16">
                <div class="container flex flex-wrap lg:flex-nowrap gap-8">
                    <?php include 'libs/profile_sidenav.php'; ?>
                    <div class="w-full lg:w-[75%] order-1 lg:order-2">
                        <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Default Address</h3>
                        <form method="post">

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-8">
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Address <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_address" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Address" value="<?php echo $address_row['ab_address'] ?>" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Apartment/Suite <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_appartment_suite" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Apartment, suite, etc. (optional)" value="<?php echo $address_row['ab_appartment_suite'] ?>" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Country <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_country" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Country" value="<?php echo $address_row['ab_country'] ?>" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">City <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_city" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="City" value="<?php echo $address_row['ab_city'] ?>" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">State <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_state" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="State" value="<?php echo $address_row['ab_state'] ?>" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Postal Code <span class="text-red-500">*</span></label>
                                <input type="number" name="ab_postal_code" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Postal Code" value="<?php echo $address_row['ab_postal_code'] ?>" required>
                            </div>
                        </div>
                        <input type="submit" name="update_address" value="Update Address" class="text-sm lg:text-base cursor-pointer px-4 py-2 bg-pri text-white">
                        </form>
                    </div>
                </div>
            </section>
        <?php
        }
    } else { ?>
        <section class="relative py-16">
            <div class="container flex gap-10 w-full">
                <?php include 'libs/profile_sidenav.php'; ?>
                <div class="w-[75%]">
                    <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Add New Address</h3>
                    <form method="post">

                        <div class="grid grid-cols-2 gap-5 mb-8">
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Address <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_address" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Address" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Apartment/Suite <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_appartment_suite" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Apartment, suite, etc. (optional)">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Country <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_country" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Country">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">City <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_city" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="City">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">State <span class="text-red-500">*</span></label>
                                <input type="text" name="ab_state" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="State">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium">Postal Code <span class="text-red-500">*</span></label>
                                <input type="number" name="ab_postal_code" class="text-sm lg:text-base border outline-none px-5 py-2" placeholder="Postal Code">
                            </div>
                        </div>
                        <input type="submit" name="save_address" value="Save Address" class="text-sm lg:text-base cursor-pointer px-4 py-2 bg-pri text-white">
                    </form>
                </div>
            </div>
        </section>
<?php
    }
} else {
    echo "<script> window.location.href = 'index.php'; </script>";
}


?>



<?php include 'libs/footer.php'; ?>