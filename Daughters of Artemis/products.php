<!doctype html>
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

      <!-- <navigation bar> -->
      <section id="header">
            <a href="home.php"><img src="images/logo4.png" class="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="home.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                    <?php if (isset($_SESSION['email'])): ?>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                    <li><a href="loginOrReg.html"><img src="images/account.png" class=account></a></li>
                    <?php endif; ?>
                    <li id="lg-bag"><a href="cart.html"><img src="images/bag.png" class=basket></a></li>
                    <a href="#"><img src="images/close.png" id= "close" class="mobileNavBar"></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><img src="images/bag.png" class=basket></a>
                <a href="#"><img src="images/menu.png" id= "bar" class="mobileNavBar"></a>
            </div>
        </section>

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
      </section>

      <!-- display products dynamically -->
      <section id="product-section" class="section-p1 section-m1">
        <div class="pro-container">
          <?php
          $host = "localhost";
          $username = "root";
          $password = "";
          $dbname = "artemis";
          $link = mysqli_connect($host, $username, $password, $dbname);

          // check if the connection was successful
          if (!$link) {
            die('failed to connect to the database: ' . mysqli_connect_error());
          }

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
              <div class="cart"><i class="fas fa-shopping-cart"></i></div>
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
          <div class="form">
              <input type="text" placeholder="Please enter your email address">
              <button class="normal">SIGN ME UP</button>
          </div>
      </section>
        
        <!-- <page footer> -->
        <footer class="section-p1">
            <div class="col">
                <img  class="logo" src="images/logo.png" alt="">

                <div class="social">
                    <h4>Follow Us</h4>
                    
                    <!-- <social media links -->
                    <div class="icons">
                        <a href="#"><img src="images/facebook.png" class="social" alt=""></a>
                        <a href="#"><img src="images/instagram.png" class="social" alt=""></a>
                        <a href="#"><img src="images/twitter.png" class="social" alt=""></a>
                        <a href="#"><img src="images/tiktok.png" class="social" alt=""></a>
                        <a href="#"><img src="images/youtube.png" class="social" alt=""></a>
                    </div>
                </div>
            </div>

            <!-- <about links> -->
            <div class="col">
                <h4>About</h4>
                <a href="faq.html">Delivery Infomation</a>
                <a href="faq.html">Terms and Conditions</a>
                <a href="faq.html">FAQ's</a>
                <a href="contact.html">Contact Us</a>
            </div>

            <!-- <user account links> -->
            <div class="col">
                <h4>My Account</h4>
                <a href="loginOrReg.html">Login</a>
                <a href="cart.html">My Cart</a>
                <a href="account.php">My Account</a>
                <a href="contact.html">Help</a>
            </div>
        </footer>
        </body>
</html> 