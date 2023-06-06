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
            
        <section id="faq">
            <div class="faq-main">
                <br>
            <h4>How do I pay for my orders?</h4>
            <p>All orders must be paid via EFT. Once payment is recieved, your order will be updated with a trackin number.</p>

            <h4>How much is shipping?</h4>
            <p>Shipping is based on a flat rate of R200 for anywhere within South Africa</p>

            <h4>How long will it take my parcel to arrive?</h4>
            <p>Shipping time depends on your location. Shipping can take anywhere between 3-7 days.</p>

            <h4>If I need help with my order, who do I contact?</h4>
            <p>You can go to the contact us page and send us a message there. We'll be happy to help you.</p>
        </div>
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