<?php

// Checks if the registration form has been submitted
if (isset($_POST['contact'])) {

    //databse connection
    require_once 'dbcon.php';

    // Takes the user input from the registration form and escapes any special characters
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $query = $_POST['query'];

    // If the connection to the database fails, display an error message and exit
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    } else {
        // Inserts user regsitration data into the customer table
        $sql = "INSERT IGNORE INTO queries (firstName, lastName, email, query) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $query);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script> alert('Thank you for your query " . $firstName . "! A customer representative will be in touch with you shortly')</script>";
            header('Refresh: 0.1; url=contactform.php');
        } else {
            echo "<script> alert('We seem to have a gremlin loose in the system. Please try again later once we've caught him.')</script>";
            exit();
        }
    }
    mysqli_close($link);
}
