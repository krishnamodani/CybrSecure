<?php
// Start session
session_start();

// Check if session data exists
if (isset($_SESSION['custno'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();
}

// Redirect to the homepage
header("Location: index.php");
exit;
?>
