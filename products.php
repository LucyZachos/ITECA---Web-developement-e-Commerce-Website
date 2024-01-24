<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://kit.fontawesome.com/9d09fcb341.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daughters of Artemis</title>
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- <Navigation bar> -->
  <?php include 'navbar.php'; ?>

  <!-- <Page header> -->
  <section id="page-header">
    <h2>#ShopTillYouDrop</h2>
  </section>

  <!-- <Category buttons> -->
  <section id="category-buttons">
    <?php
    $categories = ['All', 'Keychains', 'Scrunchies', 'Budget Binders'];

    foreach ($categories as $category) {
      echo '<button class="category-btn">' . $category . '</button>';
    }
    ?>

    <!-- <Checks if the customer is logged in. Only logged in user can add products to the cart> -->
    <?php if (!isset($_SESSION['email'])) { ?>
      <p style="color: red;">Please login or create an account to add items to your cart.</p>
    <?php } ?>

  </section>

  <section id="product-section" class="section-p1 section-m1">
    <div class="pro-container">

      <?php

      // Connects to the database
      require_once 'dbcon.php';

      // Preapred statement to retrieve all the ptoducts from the database
      $query = 'SELECT * FROM products';
      $stmt = mysqli_prepare($link, $query);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      // check if the query was successful
      if (!$result) {
        die('error executing the query: ' . mysqli_error($link));
      }

      // Generate the HTML for each product
      while ($row = mysqli_fetch_assoc($result)) {
        $productname = $row['name'];
        $productdescription = $row['description'];
        $productprice = $row['price'];
        $productimage = $row['image'];
        $productCategory = $row['category'];
      ?>

        <!-- <Prodcuct containers> -->
        <div class="pro" data-category="<?php echo $productCategory; ?>" data-name="<?php echo $productname; ?>" data-price="<?php echo $productprice; ?>">
          <img src="<?php echo $productimage; ?>" alt="<?php echo $productname; ?>">
          <div class="desc">
            <h5><?php echo $productname; ?></h5>
            <span><?php echo $productdescription; ?></span>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>

            <h4>R<?php echo $productprice; ?></h4>
          </div>

          <!-- <If teh iser is not logged in, hide the cart and wishlist button> -->
          <?php if (isset($_SESSION['email'])) { ?>
            <div class="cart">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <span class="alert">Item added to cart!</span>
            <div class="heart">
              <i class="fas fa-heart"></i>
            </div>
            <span class="alertHeart">*feature coming soon</span>
          <?php } else { ?>
            <div class="cart" style="display: none;">
              <i class="fas fa-shopping-cart"></i>
              <i class="fas fa-heart" style="display: none;"></i>
              <span class="alert">Please login or create an account to add items to your cart.</span>
            </div>

          <?php } ?>
        </div>
      <?php
      }
      mysqli_stmt_close($stmt);
      ?>
    </div>
  </section>
  <!-- <Newsletter> -->
  <?php include 'newsletter_section.php'; ?>

  <!-- <Page footer> -->
  <?php include 'footer.php'; ?>

  <!-- <Link to javascript> -->
  <script src="script.js"></script>
</body>

</html>