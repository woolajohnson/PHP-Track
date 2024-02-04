<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Raffle Entry</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <main>
<?php
        if(isset($_SESSION['message'])) {
?>
            <p class="<?= $_SESSION['message_type']?>"><?= $_SESSION['message'] ?></p>
<?php
        unset($_SESSION['message']);
        }
?>
            <form action="process.php" method="POST">
                <label for="mobile_number">Enter Your Number:</label>
                <input type="text" name="mobile_number">
                <input type="submit" name="submit" id="submit" value="Submit">
            </form>
            <a class="nav" href="success.php">Show records</a>
        </main>
    </body>
</html>