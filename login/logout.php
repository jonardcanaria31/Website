<?php
// Start session to access session variables
session_start();

// Destroy the session to clear all session variables
session_destroy();

// Redirect back to the landing page
header("Location: landingpage.php");
exit();
?>
