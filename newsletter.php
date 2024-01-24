<?php

// Checks if the newsletter signup has been submitted
if (isset($_POST['newsletter'])) {

    // Connects to the database
    require_once 'dbcon.php';

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Takes the user input from the newsletter signup form and escapes any special characters
    $email = mysqli_real_escape_string($link, $_POST['email']);

    // Prepared staement to insert the user email into the newsletter table
    $sql = "INSERT IGNORE INTO newsletter (email) VALUES (?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    mysqli_close($link);

    // Store the current page URL in a session variable
    session_start();
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];

    // Display a success message using JavaScript and redirect back to the previous page
    echo "<script>
        alert('Thank you! You have been successfully subscribed.');
        window.location.href = document.referrer;
    </script>";
    exit;
    } else {
        die("Error: " . mysqli_error($link));
}
