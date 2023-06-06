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

        <!-- <Page Header> -->
        <section id="page-header">
            <h2>#YourCart</h2>
        </section>

        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody id="cart-items-container">
                    <tr>
                    </tr>
                </tbody>
                <tfoot>
                </tfoot>
                </table>
                <form id="checkout-form" name="checkout-form" action="checkout.php" method="post">
                <input type="hidden" name="cartItems" id="cartItemsInput" value="">
                    <button type="submit" class="normal" id="checkout" name="checkout">Checkout</button>
                </form>
                <div class="banking-details">
                  <p>Banking Details: xxxxxxxx</p>
                  <p>Once payment is received, your order will be shipped</p>
                </div>
        </section>

        <!-- <Page Footer> -->
        <?php include 'footer.php'; ?>

        <script src="script.js"></script>

    </body>
</html>