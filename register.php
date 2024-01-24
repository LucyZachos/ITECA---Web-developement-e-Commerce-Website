<?php
//checks if the registration form has been submitted
if(isset($_POST['register'])){

    //connects to the MySQL database
    require_once 'dbcon.php';

    //takes the user input from the registration form and escapes any special characters
    $firstName = $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
    $email = $_REQUEST['email'];
    $passwrd = $_REQUEST['passwrd'];
    $address = $_REQUEST['address'];

    //if the connection to the database fails display an error message and exit otherwise insert the data into the customer table
    if(!$link){
        die("Database connection failed: " . mysqli_connect_error());
    }else{
        $sql = "INSERT IGNORE INTO customers (firstName, lastName, email, passwrd, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $passwrd, $address);
        mysqli_stmt_execute($stmt);

        if(mysqli_affected_rows($link) > 0){
            echo "<script> alert('Registration successful. Welcome " . $firstName . " " . $lastName . "!')</script>";
            header('Refresh: 0.1; url=loginOrReg.php');
        }else{
            echo "<script> alert('This email already exists. Please try again!')</script>";
            header('Refresh: 0.1; url=loginOrReg.php');
            exit();
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
