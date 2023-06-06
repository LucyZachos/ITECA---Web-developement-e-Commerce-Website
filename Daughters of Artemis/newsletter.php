<?php

// checks if the registration form has been submitted
if (isset($_POST['newsletter'])) {

    // connects to the MySQL database
    require_once 'dbcon.php';

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // takes the user input from the registration form and escapes any special characters
    $email = mysqli_real_escape_string($link, $_POST['email']);

    // SQL statement to insert user data into the table
    $sql = "INSERT IGNORE INTO newsletter (email) VALUES (?)";
    $stmt = mysqli_prepare($link, $sql);

    // binds the parameters
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // close the MySQL connection
    mysqli_close($link);

    // store the current page URL in a session variable
    session_start();
    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];

    // display a success message using JavaScript and redirect back to the previous page
    echo "<script>
        alert('Thank you! You have been successfully subscribed.');
        window.location.href = document.referrer;
    </script>";
    exit;
    } else {
        // handle the error if the statement execution fails
        die("Error: " . mysqli_error($link));
}
?>