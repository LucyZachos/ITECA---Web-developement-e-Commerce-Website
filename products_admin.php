<?php
session_start();

// Connects to the database
require_once 'dbcon.php';

// Connects to the navbar
require_once 'navbar.php';

// Checks if the connection was successful
if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in and is an admin -  If the user is not logged in or not an admin, redirect them
if (!isset($_SESSION['email']) || !isAdmin($_SESSION['email'], $link)) {
    echo "You need to be logged in as an admin to see this page.";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'loginorReg.php'; // Redirect to the login page
            }, 2000); // Delay in milliseconds (2 seconds)
          </script>";
    exit();
}

// Get users email address
$email = $_SESSION["email"];

// Retrieve products data from the database
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);

// Checking if the form has been submitted for updates and update in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_product'])) {

        //Update the product
        $updatedData = $_POST['products'];
        updateProductData($updatedData, $link);
    } elseif (isset($_POST['add_product'])) {

        //Add new product
        $newProductData = $_POST['new_product'];
        addNewProduct($newProductData, $link);
    } elseif (isset($_POST['delete_product'])) {

        // Delete product
        $productID = $_POST['delete_product'];
        deleteProduct($productID, $link);
    }
    // Refreshing after changes
    $result = mysqli_query($link, $query);
}

//function to update the product table
function updateProductData($data, $link)
{
    // Prepared statement to update the product table
    $update_query = "UPDATE products SET name=?, description=?, stockLevel=?, image=?, price=?, category=? WHERE productID=?";
    $stmt = mysqli_prepare($link, $update_query);

    foreach ($data['name'] as $key => $name) {
        $description = $data['description'][$key];
        $stockLevel = $data['stockLevel'][$key];
        $image = $data['image'][$key];
        $price = $data['price'][$key];
        $category = $data['category'][$key];
        $id = $data['productID'][$key];

        // Check if any required field is empty
        if (!empty($name) && !empty($description) && !empty($stockLevel) && !empty($image) && !empty($price) && !empty($category)) {
            mysqli_stmt_bind_param($stmt, "sssssss", $name, $description, $stockLevel, $image, $price, $category, $id);
            mysqli_stmt_execute($stmt);
        }
    }
    mysqli_stmt_close($stmt);
}

//function to add new products to the product table
function addNewProduct($data, $link)
{
    // Prepared statement to insert the new products into the products table
    $insert_query = "INSERT INTO products (name, description, stockLevel, image, price, category) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $insert_query);

    // fetch the data from the form
    $names = $data['name'];
    $descriptions = $data['description'];
    $stockLevels = $data['stockLevel'];
    $images = $data['image'];
    $prices = $data['price'];
    $categories = $data['category'];

    // Loop through and insert each product individually
    for ($i = 0; $i < count($names); $i++) {
        $name = $names[$i];
        $description = $descriptions[$i];
        $stockLevel = $stockLevels[$i];
        $image = $images[$i];
        $price = $prices[$i];
        $category = $categories[$i];

        // Check if any required field is empty
        if (!empty($name) && !empty($description) && !empty($stockLevel) && !empty($image) && !empty($price) && !empty($category)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $description, $stockLevel, $image, $price, $category);
            mysqli_stmt_execute($stmt);
        }
    }
    mysqli_stmt_close($stmt);
}

//function to delete products from the products table
function deleteProduct($productID, $link)
{
    // Prepared statement to delete products from the products table
    $delete_query = "DELETE FROM products WHERE productID=?";
    $stmt = mysqli_prepare($link, $delete_query);
    if (!empty($productID)) {
        mysqli_stmt_bind_param($stmt, "s", $productID);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <Page Title> -->
    <title>Product Management</title>

    <!-- <Style sheet> -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- <Page Header> -->
    <section id="page-header">
        <h2>Product Management</h2>
    </section>

    <!-- Display the products table -->
    <div class="admin-products">
        <form method="post" action="">
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>#Product Name</th>
                        <th class="description-column">Description</th>
                        <th>Stock Level</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><input type="text" name="products[name][]" value="<?php echo $row['name']; ?>" style="width: 250px;"></td>

                            <td><input type="text" name="products[description][]" value="<?php echo $row['description']; ?>" style="width: 300px;"></td>

                            <td><input type="number" name="products[stockLevel][]" value="<?php echo $row['stockLevel']; ?>" style="width: 100px;"></td>

                            <td><input type="text" name="products[image][]" value="<?php echo $row['image']; ?>" style="width: 400px;"></td>

                            <td><input type="number" name="products[price][]" value="<?php echo $row['price']; ?>" style="width: 100px;"></td>

                            <td><input type="text" name="products[category][]" value="<?php echo $row['category']; ?>" style="width: 150px;"></td>
                            <td>
                                <!-- Update and delete buttons -->
                                <button type="submit" name="delete_product" value="<?php echo $row['productID']; ?>">Delete</button>
                                <button type="submit" name="update_product" value="<?php echo $row['productID']; ?>">Update</button>
                            </td>
                            <input type="hidden" name="products[productID][]" value="<?php echo $row['productID']; ?>">
                        </tr>
                    <?php } ?>
                    <tr>
                        <td><input type="text" name="new_product[name][]" placeholder="Product Name" style="width: 250px;"></td>

                        <td><input type="text" name="new_product[description][]" placeholder="Description" style="width: 300px;"></td>

                        <td><input type="number" name="new_product[stockLevel][]" placeholder="Stock Level" style="width: 100px;"></td>

                        <td><input type="text" name="new_product[image][]" placeholder="Image URL" style="width: 400px;"></td>

                        <td><input type="number" name="new_product[price][]" placeholder="Price" style="width: 100px;"></td>

                        <td><input type="text" name="new_product[category][]" placeholder="Category" style="width: 150px;"></td>

                        <!-- Add new product button-->
                        <td><button type="submit" name="add_product">Add Product</button></td>
                        <input type="hidden" name="new_product[productID][]" value="">

                        <p style="color: red">*Be sure to fill in all columns when adding new products</p>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <!-- Page footer -->
    <?php include 'footer.php'; ?>
</body>

</html>