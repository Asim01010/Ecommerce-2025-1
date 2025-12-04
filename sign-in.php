<?php
ob_start();
session_start(); // ensure session is active

include "libs/dbconfig.php";

// ---------------------- FORM PROCESS ----------------------
if (isset($_POST['signin'])) {
    $user_email = trim($_POST['user_email'] ?? '');
    $user_password = $_POST['user_password'] ?? '';

    // 🧩 Validation
    if (empty($user_email) || empty($user_password)) {
        header("Location: sign-in.php?toast=error&msg=" . urlencode("All fields are required!"));
        exit();
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: sign-in.php?toast=error&msg=" . urlencode("Invalid email format!"));
        exit();
    }

    // 🧩 Safe query prepare
    $sql = "SELECT sm_id, sm_username, sm_email, sm_contact_no, sm_password
            FROM sm_users
            WHERE sm_email = ? AND sm_enable = '1' LIMIT 1";

    $stmt = mysqli_prepare($dbcon, $sql);
    if (!$stmt) {
        header("Location: sign-in.php?toast=error&msg=" . urlencode("Server error. Try again later."));
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // 🧩 Verify password
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $hashed = $row['sm_password'];
        if (password_verify($user_password, $hashed)) {

            // ✅ Login success — set session
            $_SESSION['sm_id']         = $row['sm_id'];
            $_SESSION['sm_username']   = $row['sm_username'];
            $_SESSION['sm_email']      = $row['sm_email'];
            $_SESSION['sm_contact_no'] = $row['sm_contact_no'];

            $user_id = $row['sm_id'];

            mysqli_free_result($result);
            mysqli_stmt_close($stmt);

          // 🟢 FIXED LOGIC: Merge guest cart into user's database cart
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $item) {
        $pro_id = (int)($item['id'] ?? 0);
        $qty = (int)($item['qty'] ?? 1);
        $size = $item['size'] ?? '';
        $color = $item['color'] ?? '';
        $max_qty = (int)($item['max_qty'] ?? 1000);

        // ✅ Check if product already exists in user's DB cart (match by product + color + size)
        $check_cart = mysqli_prepare($dbcon, 
            "SELECT cart_id, cart_pro_qty FROM sm_cart 
             WHERE cart_uid = ? AND cart_pro_id = ? 
             AND cart_pro_color = ? AND cart_pro_size = ?");
        mysqli_stmt_bind_param($check_cart, "iiss", $user_id, $pro_id, $color, $size);
        mysqli_stmt_execute($check_cart);
        $res = mysqli_stmt_get_result($check_cart);

        if ($res && mysqli_num_rows($res) > 0) {
            // Product already exists → update quantity
            $existing = mysqli_fetch_assoc($res);
            $new_qty = min($existing['cart_pro_qty'] + $qty, $max_qty);
            $update_cart = mysqli_prepare($dbcon, 
                "UPDATE sm_cart SET cart_pro_qty = ? WHERE cart_id = ?");
            mysqli_stmt_bind_param($update_cart, "ii", $new_qty, $existing['cart_id']);
            mysqli_stmt_execute($update_cart);
            mysqli_stmt_close($update_cart);
        } else {
            // Product not in DB → insert new row
            $insert_cart = mysqli_prepare($dbcon, 
                "INSERT INTO sm_cart (cart_uid, cart_pro_id, cart_pro_qty, cart_pro_max_qty, cart_pro_size, cart_pro_color, cart_datetime)
                 VALUES (?, ?, ?, ?, ?, ?, NOW())");
            mysqli_stmt_bind_param($insert_cart, "iiiiss",
                $user_id, $pro_id, $qty, $max_qty, $size, $color
            );
            mysqli_stmt_execute($insert_cart);
            mysqli_stmt_close($insert_cart);
        }

        mysqli_stmt_close($check_cart);
    }

    // ✅ Clear guest cart after merging
    unset($_SESSION['cart']);
}


            // 🟢 Load DB cart items back into session
            $_SESSION['cart'] = [];
            $fetch_cart = mysqli_query($dbcon, "SELECT * FROM sm_cart WHERE cart_uid = '$user_id'");
            while ($row_cart = mysqli_fetch_assoc($fetch_cart)) {
                $_SESSION['cart'][$row_cart['cart_pro_id']] = [
                    'id' => $row_cart['cart_pro_id'],
                    'name' => $row_cart['cart_pro_name'],
                    'image' => $row_cart['cart_pro_image'],
                    'price' => $row_cart['cart_pro_price'],
                    'qty' => $row_cart['cart_pro_qty'],
                    'max_qty' => $row_cart['cart_pro_max_qty'],
                    'size' => $row_cart['cart_pro_size'],
                    'color' => $row_cart['cart_pro_color'],
                    'color_code' => $row_cart['cart_pro_color_code']
                ];
            }

          // ✅ Redirect based on cart content
if (!empty($_SESSION['cart'])) {
    header("Location: checkoutCart.php?toast=success&msg=" . urlencode("Welcome back, {$_SESSION['sm_username']}!"));
} else {
    header("Location: index.php?toast=success&msg=" . urlencode("Welcome back, {$_SESSION['sm_username']}!"));
}
exit();


// ==========LOCAL STORAGE===============
// ✅ Redirect based on cart content with localStorage
$username = $_SESSION['sm_username'];
$email = $_SESSION['sm_email'];
$userId = $_SESSION['sm_id'];

$redirect = !empty($_SESSION['cart']) ? 'checkoutCart.php' : 'index.php';
$msg = urlencode("Welcome back, $username!");

echo "
<script>
    // Store user info in localStorage
    localStorage.setItem('sm_id', '$userId');
    localStorage.setItem('sm_username', '$username');
    localStorage.setItem('sm_email', '$email');

    // Redirect to appropriate page
    window.location.href = '$redirect?toast=success&msg=$msg';
</script>
";
exit();

// ==========LOCAL STORAGE===============


        } else {
            // ❌ Wrong password
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);
            header("Location: sign-in.php?toast=error&msg=" . urlencode("Incorrect password!"));
            exit();
        }
    } else {
        if ($result) { mysqli_free_result($result); }
        mysqli_stmt_close($stmt);
        header("Location: sign-in.php?toast=error&msg=" . urlencode("User not found or disabled!"));
        exit();
    }
}

// ✅ If already logged in
if (isset($_SESSION['sm_id'])) {
    header("Location: index.php");
    exit();
}

include 'libs/header.php';
ob_end_flush();
?>

<!-- Toast Messages -->
<?php if (isset($_GET['toast'])) : ?>
<div id="toastMessage" class="fixed bottom-4 left-4 z-50
        flex items-center px-4 py-3
        text-white text-sm font-medium
        rounded-lg shadow-lg min-w-[250px] max-w-[350px]
        transform -translate-x-full opacity-0 transition-all duration-500 ease-in-out
        <?php echo ($_GET['toast'] === 'success') ? 'bg-green-500' : 
                   (($_GET['toast'] === 'error') ? 'bg-red-500' : 'bg-yellow-500'); ?>">
    <i
        class="bi <?php echo ($_GET['toast'] === 'success') ? 'bi-check-circle-fill' : 
                            (($_GET['toast'] === 'error') ? 'bi-x-circle-fill' : 'bi-exclamation-triangle-fill'); ?> text-white text-lg mr-2"></i>
    <p class="truncate inline">
        <?php 
        if ($_GET['toast'] === 'signin_required') {
            echo 'Please sign in to continue checkout';
        } elseif ($_GET['toast'] === 'success' && isset($_GET['msg'])) {
            echo htmlspecialchars($_GET['msg']);
        } elseif ($_GET['toast'] === 'error' && isset($_GET['msg'])) {
            echo htmlspecialchars($_GET['msg']);
        }
        ?>
    </p>
</div>
<?php endif; ?>


<section class="min-h-[80vh]">
    <div class="container py-16 relative flex">
        <div class="mx-auto w-full lg:w-1/2 bg-gray-100 border p-6 lg:p-10">
            <h4 class="font-bold text-center text-2xl lg:text-3xl text-pri mb-8">Sign In</h4>
            <form method="post" class="mb-5">
                <div class="flex flex-col gap-5 justify-center mb-4">
                    <input type="email" name="user_email"
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Email"
                        required>
                    <input type="password" name="user_password"
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Password"
                        required>
                </div>
                <button type="submit" name="signin"
                    class="text-white bg-pri py-3 px-5 w-full text-sm lg:text-base mt-5 hover:opacity-90 transition">
                    Sign In
                </button>
            </form>
            <p class="text-center text-xs lg:text-base">
                Don't have an account?<br class="block lg:hidden">
                <a href="sign-up.php" class="text-orange-500 hover:underline">Register Now!</a>
            </p>
        </div>
    </div>
</section>

<?php include 'libs/footer.php'; ?>

<script>
$(document).ready(function() {
    let $toast = $("#toastMessage");
    if ($toast.length) {
        setTimeout(() => {
            $toast.removeClass("-translate-x-full opacity-0")
                .addClass("translate-x-0 opacity-100");
        }, 100);
        setTimeout(() => {
            $toast.removeClass("translate-x-0 opacity-100")
                .addClass("-translate-x-full opacity-0");
        }, 4000);
    }
});
</script>