<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Authentication I</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <main>
            <h1>Sign in to your account</h1>
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
                <label for="email">Email</span></label>
                <input type="text" name="email" id="email">

                <label for="password">Password</span></label>
                <input type="password" name="password">

                <input type="submit" name="login" id="login" value="Login">
            </form>
            <p class="nav">Don&apos;t have an account? <a href="register.php">Join here</a></p>
            <p class="nav" id="forgot_password"><a href="forgot_password.php">Forgot password?</a></p>
        </main>
    </body>
</html>