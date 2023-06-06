<?php

  if (isset($_POST['login'])) {

    //connects to the MySQL database
    require_once 'dbcon.php';

    // Checks if the connection was successful
    if (!$link) {
      die("Database connection failed: " . mysqli_connect_error());
    }


    //Retrieve the email and password
    $email = $_POST['email'];
    $passwrd = $_POST['passwrd'];

    //takes the user input from the registration form and escapses any special characters
    $email = mysqli_real_escape_string($link, $email);
    $passwrd = mysqli_real_escape_string($link, $passwrd);

    //Retrieve the user's information from the database:
    $query = "SELECT * FROM customers WHERE email='$email' AND passwrd='$passwrd'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);

    //if the record exists then redirect to account
    if ($row) { 

      //Start a session to store user email
      session_start(); 
      $_SESSION['email'] = $row['email'];

      //Get the users first name and last name
      $firstName = $row['firstName']; 
      $lastName= $row['lastName'];

      //If the user logs in successfully an alert is displayed and they are redirected to the home page
      echo "<script>alert('Welcome " . $firstName . " " . $lastName . "!')</script>"; 
      header('Refresh: 0.1; url=index.php'); 
      exit();
    } else { 
      //If the user logs is unsuccessful an alert is displayed and the login page will relaod for them to try again
      echo '<script>alert("Error: Please ensure you have entered the correct email address and password.")</script>'; 
      header('Refresh: 1; url=loginOrReg.php');
      exit();
    }
  }
?> 