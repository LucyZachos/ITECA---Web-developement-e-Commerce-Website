<section id="header">
    <a href="index.php"><img src="images/logo4.png" class="logo"></a>
    <div>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contactform.php">Contact us</a></li>
            <?php if (isset($_SESSION['email'])): ?>
                <li><a href="account.php">Account</a></li>
                <li><a href="logout.php" onclick="clearCart()">Logout</a></li>
            <?php else: ?>
                <li><a href="loginOrReg.php"><img src="images/account.png" class=account></a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['email'])): ?>
                <li id="lg-bag"><a href="cart.php"><img src="images/bag.png" class="basket"></a></li>
            <?php endif; ?>
            <a href="#"><img src="images/close.png" id="close" class="mobileNavBar"></a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.html"><img src="images/bag.png" class="basket"></a>
        <a href="#"><img src="images/menu.png" id="bar" class="mobileNavBar"></a>
    </div>
</section>


        