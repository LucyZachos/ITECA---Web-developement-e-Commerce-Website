<?php
//checks if the registration form has been submitted
if(isset($_POST['register'])){

    //connects to the MySQL database
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "artemis";
    $link = mysqli_connect($host, $username, $password, $db);

    //takes the user input from the registration form and escapes  any special characters
    $firstName = mysqli_real_escape_string($link, $_REQUEST['firstName']);
    $lastName = mysqli_real_escape_string($link, $_REQUEST['lastName']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $passwrd = mysqli_real_escape_string($link, $_REQUEST['passwrd']);

    //if the connection to the database fails display an error message and exit
    if(!$link){
        die("Database connection failed: " . mysqli_connect_error()) ;
    }else{
            //SQL statement to insert user data into the table
            $sql = "INSERT IGNORE INTO customers (firstName, lastName, email, passwrd)
            VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $sql);

            //Binds the parameters
            mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $passwrd);
            mysqli_stmt_execute($stmt);

            if(mysqli_affected_rows($link) > 0){
            echo "<script> alert('Registration successful. Welcome " . $firstName . " " . $lastName . "!')</script>";

            //Redirect the user to the login page after registering
            header('Refresh: 0.1; url=loginOrReg.html'); 
            }else{
            echo "<script> alert('This email already exists. Please try again!')</script>";
            
            //Redirect the user to the login page after registering
            header('Refresh: 0.1; url=loginOrReg.html'); 
            exit();
    }

   
    }
    //close the MySQL connection
    mysqli_close($link);
}
?>