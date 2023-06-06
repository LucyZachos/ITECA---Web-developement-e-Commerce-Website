<?php
session_start();
?>

<!Doctype html>
<html lang="en">

    <head>
    <script src="https://kit.fontawesome.com/9d09fcb341.js" crossorigin="anonymous"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- <page title> -->
      <title>Daughters of Artemis</title>

      <!-- <style sheet> -->
      <link rel="stylesheet" href="style.css">
      
      <script src="script.js"></script>
    </head>

    <body>

        <!-- <Navigation bar> -->
        <?php include 'navbar.php'; ?>

      <!-- <page header> -->
      <section id="page-header">
          <h2>#ShopTillYouDrop</h2>
      </section>

        <!-- category buttons -->
        <section id="category-buttons">
        <?php
        $categories = ['All', 'Keychains', 'Scrunchies', 'Budget Binders']; 

        foreach ($categories as $category) {
          echo '<button class="category-btn">' . $category . '</button>';
        }
        ?>
        
      <?php if (!isset($_SESSION['email'])) { ?>
            <p style="color: red;">Please login or create an account to add items to your cart.</p>
          <?php } ?>

      </section>

      <!-- display products dynamically -->
      <section id="product-section" class="section-p1 section-m1">
        <div class="pro-container">

          <?php

          require_once 'dbcon.php';

          // assuming your product table is called "products"
          $query = 'select * from products';

          // execute the query
          $result = mysqli_query($link, $query);

          // check if the query was successful
          if (!$result) {
            die('error executing the query: ' . mysqli_error($link));
          }

          // iterate over the result and generate html markup for each product
          while ($row = mysqli_fetch_assoc($result)) {
            $productname = $row['name'];
            $productdescription = $row['description'];
            $productprice = $row['price'];
            $productimage = $row['image'];
            $productCategory = $row['category'];
            ?>
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
              <div class="cart" <?php if (!isset($_SESSION['email'])) { echo 'style="display: none;"'; } ?>>
                  <i class="fas fa-shopping-cart"></i>
            </div>
            </div>
          <?php
          }
          ?>
        </div>
      </section>

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
        
        <!-- <page footer> -->
        <?php include 'footer.php'; ?>
        </body>
</html> 