<?php
session_start();

// Clear the cart
unset($_SESSION['cart-items-container']);

// Destroy the session
session_destroy();

// Redirect to the login page 
header('Location: loginOrReg.php');
exit();
?>