<?php include 'libs/header.php' ?>

<section class="bg-pri">
    <div class="contaienr py-4">
        <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">My Account</h2>
    </div>
</section>

<section class="relative py-16">

    <div class="container flex flex-wrap lg:flex-nowrap gap-8">
        <?php include 'libs/profile_sidenav.php'; ?>
        <div class="w-full lg:w-[75%] order-1 lg:order-2">
            <div class="mb-8">
                <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Account Information</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 text-sm lg:text-base">
                    <div class="border px-3 py-4 tracking-wide">
                        <h4 class="font-medium mb-3">Contact Information</h4>
                        <p class="mb-1 text-gray-600"><?php echo $_SESSION['sm_username']; ?></p>
                        <p class="mb-1 text-gray-600"><?php echo $_SESSION['sm_contact_no']; ?></p>
                        <p class="mb-5 text-gray-600"><?php echo $_SESSION['sm_email']; ?></p>
                        <div class="flex justify-between">
                            <a href="account-information" class="text-pri font-medium">Edit</a>
                            <a href="account-information" class="text-pri font-medium">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="bg-gray-100 font-bold text-base lg:text-lg px-3 py-2 border-b border-pri mb-5">Address Book</h3>

                <?php
                $u_id = $_SESSION['sm_id'];
                $get_addressbook = mysqli_query($dbcon, "select * from sm_addressbook where ab_uid = '$u_id'") or die(mysqli_error($dbcon));
                if (mysqli_num_rows($get_addressbook) > 0) { ?>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 text-sm lg:text-base">
                        <?php
                        while ($abrow = mysqli_fetch_assoc($get_addressbook)) { ?>
                            <div class="border px-3 py-4 tracking-wide">
                                <h4 class="font-medium mb-3 capitalize">Default Address</h4>
                                <p class="mb-1 text-gray-600"><?php echo $abrow['ab_address'].", ".$abrow['ab_city'].", ".$abrow['ab_country'] ?></p>
                                <p class="mb-5 text-gray-600"><?php echo $abrow['ab_state'].", ".$abrow['ab_postal_code'] ?></p>
                                <a href="address-book" class="text-pri font-medium capitalize">Edit Address</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else { ?>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 text-sm lg:text-base">
                        <div class="border px-3 py-4 tracking-wide flex flex-col justify-between">
                            <div>
                                <h4 class="font-medium mb-3">Default Address</h4>
                                <p class="mb-5 text-gray-600">You have not set a default address.</p>
                            </div>
                            <a href="address-book" class="text-pri font-medium">Add Address</a>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>

<?php include 'libs/footer.php' ?>