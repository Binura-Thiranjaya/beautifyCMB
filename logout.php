<?php

// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page (or any other page you want)
header("Location: login.php");
exit();

?>
