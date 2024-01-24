<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://kit.fontawesome.com/9d09fcb341.js" crossorigin="anonymous"></script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <Page Title> -->
  <title>Daughters of Artemis</title>

  <!-- <Style sheet> -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- <Navigation bar> -->
  <?php include 'navbar.php'; ?>

  <!-- <Page Hero> -->
  <section id="hero">
    <h2>Shop Keychains</h2>
    <button class="normal" onclick="goToProductsPage('Keychains')">SHOP NOW</button>
  </section>

  <section id="hero2">
    <h2>Shop Scrunchies</h2>
    <button class="normal" onclick="goToProductsPage('Scrunchies')">SHOP NOW</button>
  </section>

  <section id="hero3">
    <h2>Shop Budget Binders</h2>
    <button class="normal" onclick="goToProductsPage('Budget Binders')">SHOP NOW</button>
  </section>

  <!-- <Newletter signup> -->
  <?php include 'newsletter_section.php'; ?>

  <!-- <page footer> -->
  <?php include 'footer.php'; ?>

  <!-- <Page Footer> -->
  <script src="script.js"></script>

</body>

</html>