<?php 
    session_start();
    $couponsNumber = rand(1000000, 9999999);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Free Coupons</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <h1>Welcome Customer!</h1>
            <p>We're giving away <span>free coupons</span> as token of appreciation</p>
            <form id="coupons" action="process.php" method="POST">
<?php 
            if ($_SESSION['counter'] <= 0) {                  
?>
                <h3>Sorry!</h3>
                <h2>Unavailable</h2>
                <input type="submit" id="reset" name="reset" value="Reset count">
                <input type="submit" id="claim" name="claim" value="Claim again">
<?php
            }
            else if ($_SESSION['counter'] > 0) {              
?>
                <h3>50% Discount</h3>
                <h2><?= $couponsNumber ?></h2>
                <input type="submit" id="reset" name="reset" value="Reset count">
                <input type="submit" id="claim" name="claim" value="Claim again">
<?php
            }
            if (isset($_POST['submit']) && $_SESSION['counter'] > 0) {
                $_SESSION['counter']--;
            }
?>
            </form>
        </main>
    </body>
</html>