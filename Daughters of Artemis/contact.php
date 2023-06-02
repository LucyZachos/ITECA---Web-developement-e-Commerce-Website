<?php
//checks if the registration form has been submitted
if(isset($_POST['contact'])){

    //connects to the MySQL database
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "artemis";
    $link = mysqli_connect($host, $username, $password, $db);

    //takes the user input from the registration form and escapes  any special characters
    $firstName = mysqli_real_escape_string($link, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($link, $_POST['lastName']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $query = mysqli_real_escape_string($link, $_POST['query']);

    //if the connection to the database fails display an error message and exit
    if(!$link){
        die("Database connection failed: " . mysqli_connect_error()) ;
    }else{
            //SQL statement to insert user data into the table
            $sql = "INSERT IGNORE INTO queries (firstName, lastName, email, query)
            VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $sql);

            //Binds the parameters
            mysqli_stmt_bind_param($stmt, "ssss", $firstName, $lastName, $email, $query);
            mysqli_stmt_execute($stmt);

            if(mysqli_affected_rows($link) > 0){
            echo "<script> alert('Thank you for your query " . $firstName . "! A customer representitive will be in touch with you shortly')</script>";
            header('Refresh: 0.1; url=contact.html'); 

            }else{
            echo "<script> alert('We seem to be have a gremlin lose in the system. Please try again later once we've caught him.')</script>";
            exit();
        }
    }
    //close the MySQL connection
    mysqli_close($link);
}
?>