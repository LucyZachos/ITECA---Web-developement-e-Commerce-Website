<footer class="section-p1">
    <div class="col">
        <img class="logo" src="images/logo.png" alt="">
        <div class="social">
            <h4>Follow us</h4>
            
            <!-- <Social Media Links -->
            <div class="icons">
                <a href="https://www.facebook.com/"><img src="images/facebook.png" class="social" alt=""></a>
                <a href="https://www.instagram.com/"><img src="images/instagram.png" class="social" alt=""></a>
                <a href="https://twitter.com/"><img src="images/twitter.png" class="social" alt=""></a>
                <a href="https://www.tiktok.com/en/"><img src="images/tiktok.png" class="social" alt=""></a>
                <a href="https://www.youtube.com/"><img src="images/youtube.png" class="social" alt=""></a>
            </div>
        </div>
    </div>

    <!-- <About Links> -->
    <div class="col">
        <h4>About</h4>
        <a href="faq.php">FAQ's</a>
        <a href="contactform.php">Contact us</a>
    </div>

    <!-- <User Account Links> -->
    <div class="col">
        <h4>My Account</h4>
        <?php if (isset($_SESSION['email'])) : ?>
            <a href="account.php">My Account</a>
        <?php else : ?>
            <a href="loginOrReg.php">My Account</a>
        <?php endif; ?>
        <a href="contactform.php">Help</a>
    </div>
</footer>