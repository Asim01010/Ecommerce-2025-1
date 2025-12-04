<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect safely (use header instead of JS)
header("Location: sign-in.php?toast=success&msg=" . urlencode("You have been signed out successfully."));
exit();
?>