<?php
if (isset($_POST['login'])) {

    // Connect to database
    require_once 'dbcon.php';

    // Checks if the connection was successful
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Retrieve the email and password from database
    $email = $_POST['email'];
    $password = $_POST['passwrd'];

    // Prepare statement to retrieve customer email and password from database
    $query = "SELECT * FROM customers WHERE email = ? AND passwrd = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Start a session to store user email
        session_start();
        $_SESSION['email'] = $row['email'];

        // Get the user's first name and last name
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];

        // If the user logs in successfully display customized message.
        echo "<script>alert('Welcome " . $firstName . " " . $lastName . "!')</script>";
        header('Refresh: 0.1; url=index.php');
        exit();
    } else {
        echo '<script>alert("Error: Please ensure you have entered the correct email address and password.")</script>';
        header('Refresh: 1; url=loginOrReg.php');
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
