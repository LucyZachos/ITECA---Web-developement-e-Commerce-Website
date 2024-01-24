<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {

    // Connects to the database
    require_once 'dbcon.php';

    // Connects to the navbar
    require_once 'navbar.php';

    // Retrieve the cart items from the hidden input field
    $cartItems = json_decode($_POST['cartItems'], true);

    // Check if the cart items are not empty
    if (!empty($cartItems)) {

        // Get the customer session email
        $customerEmail = $_SESSION['email'];

        // Get cart total
        $cartTotal = 0;
        foreach ($cartItems as $item) {
            $cartTotal += ($item['price'] * $item['quantity']);
        }

        // Get the date
        $orderDate = date('Y-m-d');

        // Prepared statement to insert the cart order into the database
        $query = "INSERT INTO orders (customerEmail, orderItems, cartTotal, orderDate) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);

        mysqli_stmt_bind_param($stmt, "ssss", $customerEmail, json_encode($cartItems), $cartTotal, $orderDate);

        // Redirect to the order confirmation page or display a success message
        if (mysqli_stmt_execute($stmt)) {
            header('Location: order.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}
