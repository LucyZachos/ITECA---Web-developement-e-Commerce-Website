<?php
session_start();

// Database connection
require_once 'dbcon.php';

// Checks if the connection was successful
if (!$link) {
    die("database connection failed: " . mysqli_connect_error());
}

// If the user is not logged in, redirect them to the login/registration page
// if (!isset($_SESSION['email'])) {
//     echo "You need to be logged in to see this page.";
//     echo "<script>
//             setTimeout(function() {
//                 window.location.href = 'loginorreg.php'; // redirect to the login page
//             }, 2000); // delay in milliseconds (2 seconds)
//           </script>";
//     exit();
// }

// Get logged-in user's email and store the session
$email = $_SESSION["email"];

// Prepared statement to get the customer's info
$query = "SELECT * FROM customers WHERE email = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$customerdata = mysqli_fetch_assoc($result);

// Update the customer's information in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updateddata = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
    ];

    updatecustomerdata($updateddata, $email, $link);

    // Refresh after update
    $customerdata = getcustomerdata($email, $link);
}

function updatecustomerdata($data, $email, $link)
{
    // Checks if the connection was successful
    if (!$link) {
        die("database connection failed: " . mysqli_connect_error());
    }

    // Prepared statement to update the user's information
    $query = "UPDATE customers SET firstName=?, lastName=?, address=? WHERE email=?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $data['firstName'], $data['lastName'], $data['address'], $email);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Your account was successfully updated!');</script>";
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }

    mysqli_stmt_close($stmt);
}

function getcustomerdata($email, $link)
{
    // Checks if the connection was successful
    if (!$link) {
        die("database connection failed: " . mysqli_connect_error());
    }

    // Prepared statement to get the customer's info
    $query = "SELECT * FROM customers WHERE email = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $customerdata = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $customerdata;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <Page title> -->
    <title>daughters of artemis</title>

    <!-- <Style sheet> -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- <Navigation bar> -->
    <?php include 'navbar.php'; ?>

    <!-- <Page header> -->
    <section id="page-header">
        <h2>#YourAccount</h2>
    </section>

    <!-- <Account form which displays the customer's information where they can edit it> -->
    <div class="account">
        <div class="form-box">
            <div class="title">Update Your Details</div>
            <form id="account" class="input-group" name="account" method="post">
                <input type="text" class="input-field" name="firstName" placeholder="First Name.." value="<?php echo htmlspecialchars($customerdata['firstName']); ?>" required>

                <input type="text" class="input-field" name="lastName" placeholder="Last Name.." value="<?php echo htmlspecialchars($customerdata['lastName']); ?>" required>

                <!-- <Users cannot edit their email address as a precaution> -->
                <input type="email" class="input-field" name="email" placeholder="Email Address.." value="<?php echo htmlspecialchars($customerdata['email']); ?>" required readonly>

                <input type="text" class="input-field" name="address" placeholder="Shipping Address.." value="<?php echo htmlspecialchars($customerdata['address']); ?>" required>

                <button type="submit" class="submit-btn" name="submit" id="update-btn">Update Account</button>
            </form>
        </div>
        <p style="color: red">*To update your email address, please contact an administrator</p>
    </div>

    <!-- <Page footer> -->
    <?php include 'footer.php'; ?>

    <!-- <Link to javascript> -->
    <script src="script.js"></script>

</body>

</html>
