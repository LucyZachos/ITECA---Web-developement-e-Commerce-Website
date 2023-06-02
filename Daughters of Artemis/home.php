<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <script src="https://kit.fontawesome.com/9d09fcb341.js" crossorigin="anonymous"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- <Page Title> -->
        <title>Daughters of Artemis</title>

        <!-- <Style sheet> -->
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <!-- <Navigation bar> -->
        <section id="header">
            <a href="home.php"><img src="images/logo4.png" class="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="home.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                    <?php if (isset($_SESSION['email'])): ?>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                    <li><a href="loginOrReg.html"><img src="images/account.png" class=account></a></li>
                    <?php endif; ?>
                    <li id="lg-bag"><a href="cart.html"><img src="images/bag.png" class=basket></a></li>
                    <a href="#"><img src="images/close.png" id= "close" class="mobileNavBar"></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><img src="images/bag.png" class=basket></a>
                <a href="#"><img src="images/menu.png" id= "bar" class="mobileNavBar"></a>
            </div>
        </section>
        
        <!-- <Page Hero> -->
            <section id="hero">
                <h2>Shop Keychains</h2>
                <button class="normal" onclick="goToProductsPage('Keychains')">SHOP NOW</button>
              </section>
              
              <section id="hero2">
                <h2>Shop Scrunchies</h2>
                <button class="normal" onclick="goToProductsPage('Scrunchies')">SHOP NOW</button>
              </section>

              <section id="hero3">
                <h2>Shop Budget Binders</h2>
                <button class="normal" onclick="goToProductsPage('Budget Binders')">SHOP NOW</button>
              </section>

        <!-- <CTA sign up for newsletter> -->
            <section id="newsletter" class="section-p1">
                <div class="newstext">
                    <h4>Have you signed up for our newsletter yet?</h4>
                    <p>Sign up now to enjoy exclusive <span>discounts</span></p>
                </div>
                <form class="newsletter" name="news" action="newsletter.php" method="post">
                    <input type="text" name="email" placeholder="Please enter your email address" required>
                    <button type="submit" class="normal" name="newsletter">SIGN ME UP</button>
                </form>
            </section>
    

        <!-- <Page Footer> -->
        <footer class="section-p1">
            <div class="col">
                <img  class="logo" src="images/logo.png" alt="">
                <div class="social">
                    <h4>Follow us</h4>
                    <!-- <Social Media Links -->
                    <div class="icons">
                        <a href="#"><img src="images/facebook.png" class="social" alt=""></a>
                        <a href="#"><img src="images/instagram.png" class="social" alt=""></a>
                        <a href="#"><img src="images/twitter.png" class="social" alt=""></a>
                        <a href="#"><img src="images/tiktok.png" class="social" alt=""></a>
                        <a href="#"><img src="images/youtube.png" class="social" alt=""></a>
                    </div>
                </div>
            </div>

            <!-- <About Links> -->
            <div class="col">
                <h4>About</h4>
                <a href="faq.html">Delivery infomation</a>
                <a href="faq.html">Terms and conditions</a>
                <a href="faq.html">FAQ's</a>
                <a href="contact.html">Contact us</a>
            </div>

            <!-- <User Account Links> -->
            <div class="col">
                <h4>My Account</h4>
                <a href="loginOrReg.html">Sign in</a>
                <a href="cart.html">My cart</a>
                <a href="account.php">My Account</a>
                <a href="contact.html">Help</a>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>