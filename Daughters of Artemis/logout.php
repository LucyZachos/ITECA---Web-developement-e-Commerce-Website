<?php
session_start();

// Clear the cart items from the session
unset($_SESSION['cart-items-container']);

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header('Location: loginOrReg.php');
exit();
?>