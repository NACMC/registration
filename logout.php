<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other desired location
header("Location: Admin_login.php");
exit; // Ensure no further code is executed after redirection
?>
