<?php
session_start();

require_once 'dbcon.php';

// Checks if the connection was successful
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the logged-in user's email address
$email = $_SESSION["email"];

// Query the database for the user's latest order information
$query = "SELECT orderID FROM orders WHERE customerEmail = '$email' ORDER BY orderID DESC LIMIT 1";
$result = mysqli_query($link, $query);

// Fetch the latest order data from the query result
$latestOrderData = mysqli_fetch_assoc($result);

// Check if the thank you button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thank'])) {
    // Clear the cart items from the session
    unset($_SESSION['cart-items-container']);
}

// Close the database connection
mysqli_close($link);
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

    <script src="script.js"></script>
</head>

<body>

    <!-- <Navigation bar> -->
    <?php include 'navbar.php'; ?>
        
    <!-- <Page Header> -->
    <section id="page-header">
        <h2>#YourOrder</h2>
    </section>

    <div class="order">
        <div class="form-box">
            <div class="title"> Your Order Details</div>
            <form id="order" action="index.php" method="post">
                <p>Your order will be on its way to you shortly! As soon as payment clears, we'll ship your items off. I'm sure you can't wait!</p>
                <input type="text" class="input-field" name="orderNumber" placeholder="Order number..." value="<?php echo $latestOrderData['orderID']; ?>" readonly>
                <p>We are so grateful for your support. Should you need any further assistance, please feel free to contact us via our contact form.</p>

                <button class="normal" id="thank" name="thank" onclick="clearCart()">Thank you!</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
