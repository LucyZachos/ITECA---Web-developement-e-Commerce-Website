<?php
session_start();

require_once 'dbcon.php';

// Checks if the connection was successful
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the logged-in user's email address
$email = $_SESSION["email"]; 

// Query the database for the user's account information
$query = "SELECT * FROM customers WHERE email = '$email'";
$result = mysqli_query($link, $query);

// Fetch the customer data from the query result
$customerData = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($link);

// Checking if the form has been submitted for updates
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Updating the customer data in the database
    $updatedData = [
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
    ];

    updateCustomerData($updatedData, $email); // Replace this with your actual method of updating customer data

    // Refreshing the customer data after the update
    $customerData = $updatedData;
}

function updateCustomerData($data, $email)
{
    require_once 'dbcon.php';

    // Checks if the connection was successful
    if (!$link) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare the update query
    $firstName = mysqli_real_escape_string($link, $data['firstName']);
    $lastName = mysqli_real_escape_string($link, $data['lastName']);
    $email = mysqli_real_escape_string($link, $data['email']);
    $address = mysqli_real_escape_string($link, $data['address']);

    $query = "UPDATE customers SET firstName='$firstName', lastName='$lastName', email='$email', address='$address' WHERE email='$email'";

    // Execute the update query
    if (mysqli_query($link, $query)) {
        echo('Your account has been successfully updated.');
        // Update successful
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <Page Title> -->
    <title>Daughters of Artemis</title>

    <!-- <Style sheet> -->
    <link rel="stylesheet" href="style.css">

    <script src="script.js"></script>
</head>

<body>

        <!-- <Navigation bar> -->
        <?php include 'navbar.php'; ?>
        
            <!-- <Page Header> -->
            <section id="page-header">
            <h2>#YourAccount</h2>
        </section>

    <div class="account">
        <div class="form-box">
            <div class="title"> Update Your Details</div>
            <form id="account" class="input-group" name="account" method="post">
                <input type="text" class="input-field" name="firstName" placeholder="First Name.." value="<?php echo $customerData['firstName']; ?>" required>
                <input type="text" class="input-field" name="lastName" placeholder="Last Name.." value="<?php echo $customerData['lastName']; ?>" required>
                <input type="email" class="input-field" name="email" placeholder="Email address.." value="<?php echo $customerData['email']; ?>" required>
                <input type="text" class="input-field" name="address" placeholder="Shipping Address.." value="<?php echo $customerData['address']; ?>" required>
                <button type="submit" class="submit-btn" name="submit" id="update-btn">Update Account</button>
            </form>
        </div>
    </div>
</body>

        <!-- <CTA sign up for newsletter> -->
        <section id="newsletter" class="section-p1">
                <div class="newstext">
                    <h4>Have you signed up for our newsletter yet?</h4>
                    <p>Sign up now to enjoy exclusive <span>discounts</span></p>
                </div>
                <form class="newsletter" name="news" action="newsletter.php" method="post">
                    <input type="text" name="email" placeholder="Please enter your email address" required>
                    <button type="submit" class="normal" name="newsletter">SIGN ME UP</button>
                </form>
            </section>
          <!-- <Page Footer> -->
          <?php include 'footer.php'; ?>
                <script src="script.js"></script>
        </body>
    </html>

