<?php
session_start();

// Destroy the session
session_destroy();

// Redirect the user to the homepage or any other desired page
header("Location: home.php");
exit();
?>