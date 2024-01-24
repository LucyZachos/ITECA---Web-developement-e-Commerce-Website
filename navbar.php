<?php

//connects to database
require_once 'dbcon.php';

// Checks if the connection was successful
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

//Check if the user is an admin
function isAdmin($email, $link)
{
    // Prepared statement to fetch records for the admins table
    $query = "SELECT * FROM admins WHERE adminEmail = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if the admin exists
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
?>

<!-- <Navbar> -->
<section id="header">
    <a href="index.php"><img src="images/logo4.png" class="logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contactform.php">Contact us</a></li>

            <!-- <Only show the product management option if the signed in user is an admin> -->
            <?php if (isset($_SESSION['email'])) : ?>
                <?php if (isAdmin($_SESSION['email'], $link)) : ?>
                    <!-- <Only show the accounts and logout menu option if the user is signed in> -->
                    <li><a href="products_admin.php">Product Management</a></li>
                <?php endif; ?>
                <li><a href="account.php">Account</a></li>
                <li><a href="logout.php" onclick="clearCart()">Logout</a></li>
            <?php else : ?>
                <li><a href="loginOrReg.php"><img src="images/account.png" class="account"> Login/Register</a></li>
            <?php endif; ?>

            <!-- <Only show the cart menu option if the user is signed in> -->
            <?php if (isset($_SESSION['email'])) : ?>
                <li id="lg-bag"><a href="cart.php"><img src="images/bag.png" class="basket"></a></li>
            <?php endif; ?>
            <a href="#"><img src="images/close.png" id="close" class="mobileNavBar"></a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.php"><img src="images/bag.png" class="basket"></a>
        <a href="#"><img src="images/menu.png" id="bar" class="mobileNavBar"></a>
    </div>
</section>