<?php
// ✅ 1. Start session (safely)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ 2. Include DB first (safe, no HTML output)
include "libs/dbconfig.php";

// ✅ 3. Handle form before ANY output
if (isset($_POST['signup'])) {
    $user_name = trim($_POST['user_name']);
    $user_email = trim($_POST['user_email']);
    $user_number = trim($_POST['user_number']);
    $user_password = $_POST['user_password'];
    $repeat_password = $_POST['repeat_password'];

    // Validation
    if (empty($user_name) || empty($user_email) || empty($user_number) || empty($user_password)) {
        header("Location: sign-up.php?toast=error&msg=" . urlencode("All fields are required!"));
        exit();
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        header("Location: sign-up.php?toast=error&msg=" . urlencode("Invalid email format!"));
        exit();
    }

    if ($user_password !== $repeat_password) {
        header("Location: sign-up.php?toast=error&msg=" . urlencode("Passwords do not match!"));
        exit();
    }

    if (strlen($user_password) < 6) {
        header("Location: sign-up.php?toast=error&msg=" . urlencode("Password must be at least 6 characters!"));
        exit();
    }

    $datetime = date('Y-m-d H:i:s');

    // Check if user already exists
    $check_stmt = mysqli_prepare($dbcon, "SELECT sm_id FROM sm_users WHERE sm_username = ? OR sm_email = ?");
    mysqli_stmt_bind_param($check_stmt, "ss", $user_name, $user_email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);

    if (mysqli_stmt_num_rows($check_stmt) > 0) {
        mysqli_stmt_close($check_stmt);
        header("Location: sign-up.php?toast=error&msg=" . urlencode("Username or Email already registered!"));
        exit();
    }
    mysqli_stmt_close($check_stmt);

    // Hash password
    $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);

    // Insert new user
    $insert_stmt = mysqli_prepare($dbcon, 
        "INSERT INTO sm_users (sm_username, sm_email, sm_password, sm_contact_no, sm_accgen, sm_enable) 
         VALUES (?, ?, ?, ?, ?, 1)");
    mysqli_stmt_bind_param($insert_stmt, "sssss", $user_name, $user_email, $encrypted_password, $user_number, $datetime);

    if (mysqli_stmt_execute($insert_stmt)) {
        mysqli_stmt_close($insert_stmt);
        header("Location: sign-in.php?toast=success&msg=" . urlencode("Account created successfully! Please login."));
        exit();
    } else {
        mysqli_stmt_close($insert_stmt);
        header("Location: sign-up.php?toast=error&msg=" . urlencode("Something went wrong! Please try again."));
        exit();
    }
}

// ✅ 4. Session check (still before HTML)
if (isset($_SESSION['sm_id'])) {
    header("Location: ./index.php");
    exit();
}

// ✅ 5. NOW include the header (HTML starts here)
include 'libs/header.php';
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
        if ($_GET['toast'] === 'signup_required') {
            echo 'Please sign up to continue checkout';
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
            <h4 class="font-bold text-center text-2xl lg:text-3xl text-pri mb-8">Sign Up</h4>
            <form method="post" class="mb-5">
                <div class="flex flex-col gap-5 justify-center mb-8">
                    <input type="text" name="user_name" required
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Username"
                        value="<?php echo isset($_POST['user_name']) ? htmlspecialchars($_POST['user_name']) : ''; ?>">
                    <input type="email" name="user_email" required
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Email"
                        value="<?php echo isset($_POST['user_email']) ? htmlspecialchars($_POST['user_email']) : ''; ?>">
                    <input type="tel" name="user_number" required
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full"
                        placeholder="Enter Mobile Number"
                        value="<?php echo isset($_POST['user_number']) ? htmlspecialchars($_POST['user_number']) : ''; ?>">
                    <input type="password" name="user_password" required minlength="6"
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full"
                        placeholder="Enter Password (min 6 characters)">
                    <input type="password" name="repeat_password" required minlength="6"
                        class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Repeat Password">
                </div>
                <button type="submit" name="signup"
                    class="text-white bg-pri py-3 px-5 w-full text-sm lg:text-base hover:opacity-90 transition">
                    Sign Up
                </button>
            </form>
            <p class="text-center text-xs lg:text-base">
                Have an account? <a href="sign-in" class="text-orange-500 hover:underline">Login Now!</a>
            </p>
        </div>
    </div>
</section>

<?php include 'libs/footer.php' ?>

<script>
$(document).ready(function() {
    let $toast = $("#toastMessage");

    if ($toast.length) {
        // Show toast
        setTimeout(() => {
            $toast
                .removeClass("-translate-x-full opacity-0")
                .addClass("translate-x-0 opacity-100");
        }, 100);

        // Hide toast after 4 seconds
        setTimeout(() => {
            $toast
                .removeClass("translate-x-0 opacity-100")
                .addClass("-translate-x-full opacity-0");
        }, 4000);
    }
});
</script>