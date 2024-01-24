<?php
session_start();

// Connects to the database
require_once 'dbcon.php';

// Connects to the navbar


// Checks if the connection was successful
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the logged-in user's email address
$email = $_SESSION["email"];

// Prepared statement fetch the user's latest order information
$query = "SELECT orderID FROM orders WHERE customerEmail = ? ORDER BY orderID DESC LIMIT 1";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch the latest order data
$latestOrderData = mysqli_fetch_assoc($result);

// Check if the thank you button has been clicked and clears the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thank'])) {
    // Insert the order into the table
    $insertQuery = "INSERT INTO orders (customerEmail) VALUES (?)";
    $insertStmt = mysqli_prepare($link, $insertQuery);
    mysqli_stmt_bind_param($insertStmt, "s", $email);
    mysqli_stmt_execute($insertStmt);
    mysqli_stmt_close($insertStmt);

    // Clear the cart
    unset($_SESSION['cart-items-container']);
}

mysqli_stmt_close($stmt);
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

    <? require_once 'navbar.php';?>
</head>

<body>

    <!-- <Page Header> -->
    <section id="page-header">
        <h2>#YourOrder</h2>
    </section>

    <!-- <Order Details form - The order number cannot be edited and is pulled from the database> -->
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
