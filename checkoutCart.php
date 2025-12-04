<?php
ob_start(); // optional, prevents accidental output issues
include "libs/dbconfig.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['sm_id'])) {
    header("Location: ./sign-in.php?toast=signin_required");
    exit();
}

// ✅ Only include header after redirect checks
include 'libs/header.php';

// ... baki checkout code ...
ob_end_flush();




?>

<!-- SECTION ONE ==================================================== -->
<section class="min-h-screen bg-gradient-to-l from-white to-gray-50 flex justify-center">
    <div class="w-full max-w-7xl flex flex-col md:flex-row">



        <!-- LEFT SIDE -->
        <div id="cart-summary-section"
            class="flex flex-col h-50 md:h-screen overflow-y-auto scrollbar-hide p-8 w-full md:w-1/2 text-sm md:text-base bg-gray-50  border-gray-200">
            <!-- Cart Item -->
            <?php

include 'libs/dbconfig.php';

$cartItems = [];
$grandTotal = 0;

// Logged-in user
if (isset($_SESSION['sm_id'])) {
    $sm_id = mysqli_real_escape_string($dbcon, $_SESSION['sm_id']);
$q = mysqli_query($dbcon, "
     SELECT 
        sc.cart_pro_id, 
        sc.cart_pro_qty,
        sc.cart_pro_color,   -- ✅ IMPORTANT
        p.pro_name, 
        p.pro_image, 
        p.pro_price, 
        p.pro_discount
    FROM sm_cart sc
    JOIN sm_products p ON p.pro_id = sc.cart_pro_id
    WHERE sc.cart_uid='$sm_id'
");

while ($row = mysqli_fetch_assoc($q)) {
    // Calculate discounted price
    $originalPrice = (float)$row['pro_price'];
    $discount = (float)$row['pro_discount'];
    $finalPrice = $discount > 0 ? $originalPrice - ($originalPrice * $discount / 100) : $originalPrice;

 $cartItems[] = [
    'id'    => $row['cart_pro_id'],
    'qty'   => (int)$row['cart_pro_qty'],
    'name'  => $row['pro_name'],
    'image' => $row['pro_image'],
    'price' => $finalPrice,
    'discount' => $discount,
    'originalPrice' => $originalPrice,

    // ✅ NEW
    'color' => $row['cart_pro_color']
];
}

} 
// Guest user
else {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $cartItems[] = [
                'id'    => $item['id'],
                'qty'   => max(1, (int)$item['qty']),
                'name'  => htmlspecialchars($item['name']),
                'image' => htmlspecialchars($item['image']),
                'price' => (float)$item['price']
            ];
        }
    }
}

// Now display checkout summary
if (!empty($cartItems)) {
    foreach ($cartItems as $item) {
        $itemTotal = $item['qty'] * $item['price'];
        $grandTotal += $itemTotal;
?>
            <div
                class="flex items-center justify-between bg-white rounded-2xl p-1 sm:p-6 mb-4 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-blue-100 group">

                <!-- Left Section: Image + Info -->
                <div class="flex items-center gap-4 sm:gap-6">

                    <!-- Image with Qty Badge -->
                    <div class="relative">
                        <div
                            class="relative overflow-hidden rounded-xl shadow-md group-hover:shadow-lg transition-shadow duration-300">
                            <img src="./imgs/products/<?= $item['image'] ?>"
                                alt="<?= htmlspecialchars($item['name']) ?>"
                                class="w-20 h-20 sm:w-24 sm:h-24 object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>

                        <!-- Qty Badge -->
                        <span
                            class="absolute -top-2 -right-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xs font-bold w-7 h-7 flex items-center justify-center rounded-full shadow-lg border-2 border-white">
                            <?= $item['qty'] ?>
                        </span>
                    </div>

                    <!-- Product Name + Color + Price -->
                    <div class="flex flex-col min-w-0 flex-1 max-w-xs">
                        <!-- Product Name -->
                        <h3 class="font-semibold text-gray-900 text-base sm:text-lg leading-tight line-clamp-2 mb-1">
                            <?= htmlspecialchars($item['name']) ?>
                        </h3>

                        <!-- Color -->
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-gray-600 text-sm ">Color:</span>
                            <span
                                class="text-gray-800 text-sm font-medium"><?= htmlspecialchars($item['color']) ?></span>
                        </div>

                        <!-- Price Section -->
                        <div class="flex flex-col gap-1">
                            <?php if ($item['discount'] > 0): ?>
                            <div class="flex items-center gap-3">
                                <span class="text-lg font-medium text-gray-900">
                                    $<?= number_format($item['price'], 2) ?>
                                </span>
                                <span class="text-sm text-gray-500 line-through">
                                    $<?= number_format($item['originalPrice'], 2) ?>
                                </span>
                                <span
                                    class="bg-gradient-to-r from-red-500 to-red-600 text-white text-xs font-bold px-2 py-1 rounded-full whitespace-nowrap">
                                    -<?= $item['discount'] ?>%
                                </span>
                            </div>
                            <?php else: ?>
                            <span class="text-lg font-bold text-gray-900">
                                $<?= number_format($item['price'], 2) ?>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Right Section: Qty Block -->
                <div class="flex-shrink-0 ml-4">
                    <div
                        class="bg-gradient-to-br from-green-400 to-green-500 text-white rounded-xl w-12 h-12 flex items-center justify-center text-base font-bold shadow-lg border-2 border-white transition-transform duration-300 group-hover:scale-110">
                        <?= $item['qty'] ?>
                    </div>
                </div>

            </div>



            <?php 
    } // end foreach 
?>

            <!-- Summary -->
            <div class="mt-5 space-y-2">
                <div class="flex justify-between text-gray-600 text-sm">
                    <p>Subtotal</p>
                    <p class="font-medium text-gray-800"><?php echo '$' . number_format($grandTotal, 2); ?></p>
                </div>
                <div class="flex justify-between text-gray-600 text-sm">
                    <p>Shipping</p>
                    <p class="font-medium text-gray-800">Enter address</p>
                </div>
                <div class="flex justify-between border-t border-gray-300 pt-2">
                    <p class="text-sm font-semibold">Total</p>
                    <p class="text-base font-bold text-blue-600">
                        <span class="text-gray-500 text-xs">USD</span>
                        <?php echo '$' . number_format($grandTotal, 2); ?>
                    </p>
                </div>
            </div>

            <?php
} else {
    echo '
<div class="flex flex-col items-center justify-center text-center py-16 px-6 bg-white rounded-2xl shadow-md border border-gray-200">
    <div class="bg-gray-100 p-6 rounded-full mb-4">
        <i class="bi bi-cart-x text-5xl text-gray-400"></i>
    </div>
    <h2 class="text-2xl font-semibold text-gray-700 mb-2">Your cart is empty</h2>
    <p class="text-gray-500 mb-6 max-w-sm">Looks like you haven’t added anything yet. Start exploring our products and add your favorites to the cart!</p>
    <a href="index.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-full transition duration-200">
        Continue Shopping
    </a>
</div>';

}
?>
        </div>

        <!-- SECTION TWO ==================================================================== -->

        <!-- LEFT SIDE -->
        <div
            class="flex flex-col h-50 md:h-screen  overflow-y-auto scrollbar-hide p-8 w-full md:w-1/2 text-sm md:text-base bg-white">

            <!-- CONTACT FORM -->
            <form class="space-y-6">
                <!-- Contact -->
                <div>
                    <div class="flex items-center justify-between">
                        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                        <!-- <a href="#" class="text-xs text-blue-600 underline">Sign in</a> -->
                    </div>
                    <input type="email" id="email" placeholder="you@example.com"
                        class="mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 text-sm"
                        readonly value="<?php echo htmlspecialchars($_SESSION['sm_email'] ?? 'N/A'); ?>">
                    <label for="newsletter" class="flex items-center mt-3 cursor-pointer">
                        <input type="checkbox" id="newsletter"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-xs text-gray-600">Email me with news and offers</span>
                    </label>
                </div>

                <!-- Delivery -->
                <div class="space-y-3">
                    <!-- SHIPPING & BILLING -->
                    <div class="bg-white border rounded-lg p-4 shadow-sm relative">
                        <div class="flex justify-between items-start">
                            <h3 class="text-sm font-semibold text-gray-800">Shipping & Billing</h3>
                            <button id="editAddressBtn" type="button"
                                class="text-blue-600 text-sm font-semibold hover:underline">Select,Change
                                or Add
                                Address</button>
                        </div>

                        <div class="mt-2 text-gray-700 text-sm">
                            <p class="font-medium">
                                <?php echo htmlspecialchars($_SESSION['sm_username'] ?? 'Guest'); ?>
                                <span
                                    class="ml-2 text-gray-500"><?php echo htmlspecialchars($_SESSION['sm_contact_no'] ?? 'N/A'); ?></span>
                            </p>
                            <div class="flex items-center mt-1">
                                <?php
$sm_id = $_SESSION['sm_id'];
$userAddress = '';

// Fetch latest address for the logged-in user
$query = mysqli_query($dbcon, "SELECT * FROM sm_addressbook WHERE ab_uid = '$sm_id' ORDER BY ab_id DESC LIMIT 1");

if ($query && mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $userAddress = htmlspecialchars($row['ab_address']) . ', ' .
                   htmlspecialchars($row['ab_appartment_suite']) . ', ' .
                   htmlspecialchars($row['ab_city']) . ', ' .
                   htmlspecialchars($row['ab_state']) . ', ' .
                   htmlspecialchars($row['ab_country']) . ' - ' .
                   htmlspecialchars($row['ab_postal_code']);
} else {
    $userAddress = "No address found. Please add one.";
}
?>

                                <div class="flex items-center mt-1">
                                    <p><?php echo $userAddress; ?></p>
                                </div>


                            </div>
                        </div>
                    </div>


                    <!-- ============================ -->
                    <!-- ===========sidebar================= -->
                    <!-- ============================ -->

                    <!-- ADDRESS SIDEBAR -->
                    <div id="addressSidebar"
                        class="fixed inset-y-0 right-0 hidden w-96 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out z-50 flex flex-col">

                        <!-- Header -->
                        <div class="flex justify-between items-center p-4 border-b flex-shrink-0">
                            <i id="closeSidebarBtn" class="bi bi-x-lg text-xl cursor-pointer" role="button"
                                aria-label="Close address sidebar"></i>
                            <button id="openAddAddressModal" type="button"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold text-sm transition duration-200 flex items-center justify-center">
                                <i class="bi bi-plus-lg mr-2"></i> Add New Address
                            </button>

                        </div>

                        <!-- Scrollable Content -->
                        <div class="p-4 overflow-y-auto flex-1">




                            <div class="space-y-4 selectUserAddress ">
                                <?php

include 'libs/dbconfig.php';

// Make sure user is logged in
if (!isset($_SESSION['sm_id'])) {
    echo "Please login to see addresses";
    exit;
}

$sm_id = $_SESSION['sm_id']; // <-- ADD THIS LINE

$fetch = "SELECT * FROM sm_addressbook WHERE ab_uid = '$sm_id'";
$result = mysqli_query($dbcon, $fetch);

if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
        ?>
                                <div class="addressBox border border-gray-200 rounded-xl p-5 bg-white shadow-sm hover:shadow-lg transition-shadow duration-300 cursor-pointer"
                                    data-id="<?php echo $row['ab_id']; ?>"
                                    data-address="<?php echo htmlspecialchars($row['ab_address']); ?>"
                                    data-apartment="<?php echo htmlspecialchars($row['ab_appartment_suite'] ?: '-'); ?>"
                                    data-city="<?php echo htmlspecialchars($row['ab_city']); ?>"
                                    data-state="<?php echo htmlspecialchars($row['ab_state'] ?: '-'); ?>"
                                    data-country="<?php echo htmlspecialchars($row['ab_country']); ?>"
                                    data-postal="<?php echo htmlspecialchars($row['ab_postal_code']); ?>">

                                    <!-- Header: Name + Postal Code -->
                                    <div class="flex justify-between items-center mb-3">
                                        <span
                                            class="text-xs sm:text-sm text-gray-500"><?php echo htmlspecialchars($row['ab_postal_code']); ?></span>
                                    </div>

                                    <!-- Address Details Grid -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700 text-xs sm:text-sm">
                                        <div>
                                            <span class="font-medium">Address:</span>
                                            <span
                                                class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_address']); ?></span>
                                        </div>
                                        <div>
                                            <span class="font-medium">Apartment/Suite:</span>
                                            <span
                                                class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_appartment_suite'] ?: '-'); ?></span>
                                        </div>
                                        <div>
                                            <span class="font-medium">City:</span>
                                            <span
                                                class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_city']); ?></span>
                                        </div>
                                        <div>
                                            <span class="font-medium">State:</span>
                                            <span
                                                class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_state'] ?: '-'); ?></span>
                                        </div>
                                        <div>
                                            <span class="font-medium">Country:</span>
                                            <span
                                                class="block text-gray-600 mt-1"><?php echo htmlspecialchars($row['ab_country']); ?></span>
                                        </div>
                                    </div>

                                    <!-- Delete Button -->
                                    <div class="mt-4 flex justify-end">
                                        <button type="button"
                                            class="deleteAddressBtn p-2 rounded-md text-white bg-red-500 hover:bg-red-600"
                                            data-id="<?php echo $row['ab_id']; ?>">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>
                                </div>

                                <?php
    }
}
?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Remember Me -->
                <div>
                    <div
                        class="p-3 bg-gray-100 border border-gray-300 rounded-b-md remember-me-data transition-all duration-300 ease-in-out opacity-0 max-h-0 overflow-hidden space-y-2">
                        <input type="text" placeholder="Email address"
                            class="border border-gray-300 rounded-md p-3 text-sm w-full">
                    </div>
                </div>
                <button
                    class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-md font-semibold text-sm transition paynow">
                    Pay now
                </button>
            </form>
        </div>
    </div>
    </div>
</section>
<!-- ADD NEW ADDRESS MODAL -->
<!-- ========================================================= -->
<div id="addAddressModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-xl p-6 relative">
        <button id="closeAddAddressModal" type="button"
            class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
            <i class="bi bi-x-lg text-2xl"></i>
        </button>
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Add New Address</h2>
        <form id="newAddressForm" class="space-y-3">
            <input type="text" name="postal_code" placeholder="ZIP/Postal Code"
                class="w-full border p-3 rounded-md postal_code">
            <input type="text" name="apartment_suite" placeholder="Apartment/Suite"
                class="w-full border p-3 rounded-md apartment_suite">
            <input type="text" name="state" placeholder="State/Province" class="w-full border p-3 rounded-md state">
            <input type="text" name="city" placeholder="City" class="w-full border p-3 rounded-md city">
            <input type="text" name="country" placeholder="Country" class="w-full border p-3 rounded-md country">
            <input type="text" name="address" placeholder="Address" class="w-full border p-3 rounded-md address">
            <div class="flex justify-end space-x-3 mt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </form>

    </div>
</div>



<!-- CSS -->
<style>
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.remember-me-data.active {
    opacity: 1;
    max-height: 1000px;
}

/* selected address visual */
.addressBox.selected {
    border-color: #2563eb;
    /* blue-600 */
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.15);
}

/* ensure sidebar doesn't push layout when visible */
body.sidebar-open {
    overflow: hidden;
}
</style>

<?php include 'libs/footer.php' ?>

<!-- JS -->
<script>
$(function() {
    // Remember Me toggle
    $('#remember').on('change', function() {
        $('.remember-me-data').toggleClass('active', this.checked);
        $('.remember-me').toggleClass('rounded-b-none border-b-0', this.checked);
    });

    // Billing Section toggle
    $('#billing').on('change', function() {
        $('.billing-section').toggleClass('active', !this.checked);
    });
});
$(document).ready(function() {
    let $signupToast = $("#signupToast");

    if ($signupToast.length) {
        console.log("Toast found, showing...");

        setTimeout(() => {
            $signupToast
                .removeClass("-translate-x-full opacity-0")
                .addClass("translate-x-0 opacity-100");
            console.log("Toast should now be visible");
        }, 300);

        setTimeout(() => {
            $signupToast
                .removeClass("translate-x-0 opacity-100")
                .addClass("-translate-x-full opacity-0");
            console.log("Toast hidden again");
        }, 3000);
    } else {
        console.log("Toast div NOT found in DOM");
    }
});
$(document).ready(function() {
    // Open sidebar
    $('#editAddressBtn').on('click', function(e) {
        e.preventDefault();
        $('#addressSidebar').removeClass('translate-x-full hidden').addClass('translate-x-0');
        $('body').addClass('sidebar-open'); // Prevent scroll behind

        // add overlay
        if (!$('#addressOverlay').length) {
            $('body').append(
                '<div id="addressOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>');
        }
    });

    // Close sidebar (by cross icon)
    $('#closeSidebarBtn').on('click', function() {
        $('#addressSidebar').removeClass('translate-x-0').addClass('translate-x-full');
        $('body').removeClass('sidebar-open');
        $('#addressOverlay').remove();
    });

    // Close sidebar when clicking on overlay
    $(document).on('click', '#addressOverlay', function() {
        $('#addressSidebar').removeClass('translate-x-0').addClass('translate-x-full');
        $('body').removeClass('sidebar-open');
        $('#addressOverlay').remove();
    });
});
$(document).ready(function() {
    // Open Add Address Modal
    $('#openAddAddressModal').on('click', function(e) {
        e.preventDefault();
        $('#addAddressModal').removeClass('hidden');
        $('body').addClass('sidebar-open');
    });

    // Close Modal on clicking outside
    $('#addAddressModal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
            $('#newAddressForm')[0].reset();
            $('body').removeClass('sidebar-open');
        }
    });

    // close button inside modal
    $('#closeAddAddressModal').on('click', function() {
        $('#addAddressModal').addClass('hidden');
        $('#newAddressForm')[0].reset();
        $('body').removeClass('sidebar-open');
    });
});

$(document).on("click", ".addressBox", function(e) {
    // prevent from triggering when clicking delete icon
    if ($(e.target).closest('.deleteAddressBtn').length) return;

    // Grab all details from clicked box
    var addressId = $(this).data("id");
    var address = $(this).data("address");
    var apartment = $(this).data("apartment") || '-';
    var city = $(this).data("city");
    var state = $(this).data("state") || '-';
    var country = $(this).data("country");
    var postal = $(this).data("postal");

    // Build the display text
    var fullAddress = address;
    if (apartment !== '-') fullAddress += ', ' + apartment;
    if (city) fullAddress += ', ' + city;
    if (state !== '-') fullAddress += ', ' + state;
    if (country) fullAddress += ', ' + country;
    if (postal) fullAddress += ' - ' + postal;

    // Populate the Shipping & Billing div
    var $shippingDiv = $(".bg-white.border.rounded-lg.p-4.shadow-sm.relative");
    $shippingDiv.find("p.font-medium").html(
        "<?= htmlspecialchars($_SESSION['sm_username'] ?? 'Guest') ?> <span class='ml-2 text-gray-500'><?= htmlspecialchars($_SESSION['sm_contact_no'] ?? 'N/A') ?></span>"
    );
    $shippingDiv.find(".flex.items-center.mt-1 p").text(fullAddress);

    // Optionally, store selected address ID for form submission
    $shippingDiv.attr("data-selected-address-id", addressId);

    // highlight selected box
    $(".addressBox").removeClass("selected");
    $(this).addClass("selected");
});

let deleteAddressId = null;

// Delete button handler: open confirm (simple browser confirm kept to avoid changing backend flow)
$(document).on('click', '.deleteAddressBtn', function(e) {
    e.preventDefault();
    deleteAddressId = $(this).data('id');

    if (!confirm('Are you sure you want to delete this address?')) {
        deleteAddressId = null;
        return;
    }

    $.ajax({
        url: "delete_address.php",
        type: "POST",
        data: {
            ab_id: deleteAddressId
        },
        success: function(res) {
            res = res.trim();
            if (res === "success") {
                // Remove address box from UI
                $(".addressBox[data-id='" + deleteAddressId + "']").remove();
                alert('Address deleted successfully');
            } else {
                alert('Error deleting address: ' + res);
            }
            deleteAddressId = null;
        },
        error: function() {
            alert('AJAX error!');
            deleteAddressId = null;
        }
    });
});
</script>