<?php
session_start();

    // if the user is not logged, redirect them to the login/ registration page
if (!isset($_SESSION['email'])) {
    echo "You need to be logged in to see this page.";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'loginorReg.php'; // Redirect to the login page
            }, 2000); // Delay in milliseconds (3 seconds)
          </script>";
    exit();
}

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

    <!-- <Cart display table> -->
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
            <!-- <checkout button -  will only work if there are items in the cart> -->
            <button type="submit" class="normal" id="checkout" name="checkout">Checkout</button>
        </form>

        <style>
            p {
                margin: 0;
            }
        </style>

        <!-- <Banking details for EFT> -->
        <div class="banking-details">
            <br>
            <p><strong>Banking Details:</strong></p><br>
            <p>Standard Bank</p>
            <p>Account Holder: Daughters of Artemis</p>
            <p>Account Number: 127900072</p>
            <p>Branch: Rosebank</p><br>
            <p style="color:red">*Once payment is received, your order will be shipped</p>
        </div>
        <p class="empty-cart-message" id="emptyCartMessage" style="display: none;">Cart is empty. Please add items to your cart.</p>
    </section>

    <!-- <Page Footer> -->
    <?php include 'footer.php'; ?>

    <!-- <link to javascript> -->
    <script src="script.js"></script>
</body>

</html>