<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password | Authentication I</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <h1>Forgotten Password</h1>
            <div class="message">
<?php 
            if(!empty($_SESSION['errors'])) {
                foreach($_SESSION['errors'] as $error) {
?> 
                    <p><?= $error ?></p>
<?php
                }
                unset($_SESSION['errors']);
            } else if (empty($_SESSION['errors']) && !empty($_SESSION['success'])) {
?>
                <h5><?= $_SESSION['success'] ?></h5>
<?php
                unset($_SESSION['success']);
            }
?>
            </div>
            <form action="process.php" method="POST">
                <label for="email">Enter your email</span></label>
                <input type="text" name="email" id="email">

                <label for="contact">Enter contact number</span></label>
                <input type="text" name="contact" id="contact">

                <input type="submit" name="forgot_password" id="forgot_password" value="Submit">
            </form>
            <p class="nav"><a href="index.php">Sign in instead?</a></p>
        </main>
    </body>
</html>