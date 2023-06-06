<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
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

        <!-- <Page Header> -->
        <section id="page-header">
            <h2>#GetInTouch</h2>
        </section>

        <section id="contact-details" class=" section-p1">
            <form class="details" name="contact" action="contact.php" method="POST">

                <label for="firstName">First Name</label>
                <input type="text"name="firstName" placeholder="Your name.." required>
            
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" placeholder="Your last name.." required>

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Your email address.." required>

                <label for="query">Query</label>
                <textarea name="query" placeholder="Write something.." style="height:200px" required></textarea>
            
                <button type="submit" class="normal" name="contact">Submit</button>
            </form>
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
          <?php include 'footer.php'; ?>
                <script src="script.js"></script>
        </body>
    </html>

