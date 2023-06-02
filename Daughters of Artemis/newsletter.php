<?php

// checks if the registration form has been submitted
if (isset($_POST['newsletter'])) {
    // connects to the MySQL database
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "artemis";
    $link = mysqli_connect($host, $username, $password, $db);

    // takes the user input from the registration form and escapes any special characters
    $email = mysqli_real_escape_string($link, $_POST['email']);

    // if the connection to the database fails, display an error message and exit the function
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // SQL statement to insert user data into the table
    $sql = "INSERT IGNORE INTO newsletter (email) VALUES (?)";
    $stmt = mysqli_prepare($link, $sql);

    // binds the parameters
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // close the MySQL connection
    mysqli_close($link);

        // display a success message using JavaScript
        echo "<script>alert('Thank you! You have been successfully subscribed.');</script>";
        header('Refresh: 0.1; url=account.html');
    } else {
        // handle the error if the statement execution fails
        die("Error: " . mysqli_error($link));
}
?>