<?php 
    session_start();
    if (!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 10;
    }
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
            <p> for first <?= $_SESSION['counter'] ?> customer(s)</p>
            <form action="coupons.php" method="POST">
                <label for="name">Kindly type your name:</label>
                <input type="text" id="name" name="name">
                <input type="submit" id="submit" name="submit" value="Submit">
            </form>
        </main>
    </body>
</html>