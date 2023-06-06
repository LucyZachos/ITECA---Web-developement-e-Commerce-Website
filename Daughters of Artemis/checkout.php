<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {

    require_once 'dbcon.php';

    // Retrieve the cart items from the hidden input field
    $cartItems = json_decode($_POST['cartItems'], true);

    // Check if the cart items are not empty
    if (!empty($cartItems)) {

        // Get the customer email from the session
        $customerEmail = $_SESSION['email'];

        // Get the total cart amount
        $cartTotal = 0;
        foreach ($cartItems as $item) {
            $cartTotal += ($item['price'] * $item['quantity']);
        }

        // Get the current date
        $orderDate = date('Y-m-d');

        // Insert the order details into the orders table
        $query = "INSERT INTO orders (customerEmail, `orderItems`, cartTotal, orderDate) 
                  VALUES ('$customerEmail', '" . mysqli_real_escape_string($link, json_encode($cartItems)) . "', '$cartTotal', '$orderDate')";

        // After the successful order is stored in the database
        if (mysqli_query($link, $query)) {
            // Redirect to the order confirmation page or display a success message
            header('Location: order.php');
            exit();
        } else {
            // Failed to store the order in the database
            // Handle the error or display an error message
            echo "Error: " . mysqli_error($link);
        }
    }
}
?>
