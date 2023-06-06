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

        <div class="heroLR">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick=login()>Login</button>
                    <button type="button" class="toggle-btn" onclick=register() >Register</button>
                </div>
                <form id="login" class="input-group" name="log" action="login.php" method="post">
                    <input type="text" class="input-field" name="email" placeholder="User email" required>
                    <input type="password" class="input-field" name="passwrd" placeholder="User password" required>
                    <button type="submit" class="submit-btn" name="login" id="log-btn">Login</button>
                </form>
                <form id="register" class="input-group" name="reg" action="register.php" method="post">
                    <input type="text" class="input-field" name="firstName" placeholder="First Name" required>
                    <input type="text" class="input-field" name="lastName" placeholder="Last Name" required>
                    <input type="email" class="input-field" name="email" placeholder="User email" required>
                    <input type="text" class="input-field" name="address" placeholder="Delivery address" required>

                    <input type="password" class="input-field" name="passwrd" placeholder="User password" required>
                    <button type="submit" class="submit-btn" name="register" id="reg-btn">Register</button>
                </form>
            </div>
        </div>
    </body>
</html>