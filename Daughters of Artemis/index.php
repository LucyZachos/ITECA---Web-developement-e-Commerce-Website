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
        <?php include 'navbar.php'; ?>
        
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

            <?php include 'footer.php'; ?>

        <script src="script.js"></script>
        
    </body>
</html>