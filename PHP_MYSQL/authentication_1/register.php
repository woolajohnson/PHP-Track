<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration | Authentication I</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <h1>Create a new account</h1>
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
                <label for="first_name">First name <span class="required">*</span></label>
                <input type="text" name="first_name">

                <label for="last_name">Last name <span class="required">*</span></label>
                <input type="text" name="last_name">

                <label for="email">Email address <span class="required">*</span></label>
                <input type="text" name="email">

                <label for="contact">Contact number <span class="required">*</span></label>
                <input type="text" name="contact">

                <label for="password">Password <span class="required">*</span></label>
                <input type="text" name="password">

                <label for="confirm_password">Confirm password <span class="required">*</span></label>
                <input type="text" name="confirm_password">

                <input type="submit" name="register" id="register" value="Register">
            </form>
            <p class="nav">Already have an account? <a href="index.php">Sign in</a></p>
        </main>
    </body>
</html>