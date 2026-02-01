<?php
session_start(); // Access the current session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session completely

// Redirect the user back to the login page
header("Location: login.php");
exit();
?>
