<?php include 'libs/header.php'; ?>

<?php
if (isset($_SESSION['sm_id'])) {
    $sm_id = $_SESSION['sm_id'];
    if (isset($_POST['update_account'])) {
        $user_name       = $_POST['user_name'];
        $user_mobileno       = $_POST['user_mobileno'];
        $user_email       = $_POST['user_email'];
        $cpass       =  md5($_POST['cpass']);




        $get_user = mysqli_query($dbcon, "select * from sm_users where sm_id = '$sm_id'") or die(mysqli_error($dbcon));
        if ($user_row = mysqli_fetch_assoc($get_user)) {
            if ($user_row['sm_password'] == $cpass) {
                if ($_POST['npass'] != "" && $_POST['rpass'] != "") {
                    $npass       = md5($_POST['npass']);
                    $rpass       = md5($_POST['rpass']);
                    if ($npass == $rpass) {
                        $update_user = mysqli_query($dbcon, "UPDATE sm_users SET sm_username = '$user_name', sm_email = '$user_email', sm_contact_no = '$user_mobileno', sm_password = '$npass' WHERE sm_id = '$sm_id'") or die(mysqli_error($dbcon));
                        if ($update_user) {
                            echo '<script> $("#success").show().delay(3000).fadeOut("slow"); $("#success_msg").html("Account updated successfully."); </script>';
                            $_SESSION['sm_username']    =    $user_name;
                            $_SESSION['sm_contact_no']    =   $user_mobileno;
                            $_SESSION['sm_email']    =    $user_email;
                        } else {
                            echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Something went wrong!"); </script>';
                        }
                    } else {
                        echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Password does not match!"); </script>';
                    }
                } else {
                    $update_user = mysqli_query($dbcon, "UPDATE sm_users SET sm_username = '$user_name', sm_email = '$user_email', sm_contact_no = '$user_mobileno' WHERE sm_id = '$sm_id'") or die(mysqli_error($dbcon));
                    if ($update_user) {
                        echo '<script> $("#success").show().delay(3000).fadeOut("slow"); $("#success_msg").html("Account updated successfully."); </script>';
                        $_SESSION['sm_username']    =    $user_name;
                        $_SESSION['sm_contact_no']    =   $user_mobileno;
                        $_SESSION['sm_email']    =    $user_email;
                    } else {
                        echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Something went wrong!"); </script>';
                    }
                }
            } else {
                echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Wrong Password!"); </script>';
            }
        }
    }
?>

    <section class="bg-pri">
        <div class="contaienr py-4">
            <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">Account Information</h2>
        </div>
    </section>
    <section class="relative py-16">
        <div class="container flex flex-wrap lg:flex-nowrap gap-8">
            <?php include 'libs/profile_sidenav.php'; ?>
            <?php
            $get_user = mysqli_query($dbcon, "select * from sm_users where sm_id = '$sm_id'") or die(mysqli_error($dbcon));
            if ($user_row = mysqli_fetch_assoc($get_user)) { ?>
                <div class="w-full lg:w-[75%] order-1 lg:order-2">
                    <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Personal Information</h3>
                    <form method="post">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-8">
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium" for="uname">Username <span class="text-red-500">*</span></label>
                                <input type="text" name="user_name" value="<?php echo $_SESSION['sm_username']; ?>" class="px-5 py-2 text-sm lg:text-base border outline-none" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium" for="phone_no">Phone Number <span class="text-red-500">*</span></label>
                                <input type="number" name="user_mobileno" value="<?php echo $_SESSION['sm_contact_no']; ?>" class="px-5 py-2 text-sm lg:text-base border outline-none" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium" for="email">Email <span class="text-red-500">*</span></label>
                                <input type="email" name="user_email" value="<?php echo $_SESSION['sm_email']; ?>" class="px-5 py-2 text-sm lg:text-base border outline-none" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium" for="cpass">Current Password <span class="text-red-500">*</span></label>
                                <input type="password" name="cpass" placeholder="Enter your password to update changes" class="px-5 py-2 text-sm lg:text-base border outline-none" required>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium" for="npass">New Password</label>
                                <input type="password" name="npass" placeholder="optional" class="px-5 py-2 text-sm lg:text-base border outline-none">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-sm lg:text-base font-medium" for="rpass">Repeat Password</label>
                                <input type="password" name="rpass" placeholder="optional" class="px-5 py-2 text-sm lg:text-base border outline-none">
                            </div>
                        </div>
                        <div>
                            <input type="submit" name="update_account" value="Update Account" class="text-sm lg:text-base cursor-pointer px-4 py-2 bg-pri text-white">
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
<?php
} else {
    echo "<script> window.location.href = 'index.php'; </script>";
}
?>





<?php include 'libs/footer.php'; ?>