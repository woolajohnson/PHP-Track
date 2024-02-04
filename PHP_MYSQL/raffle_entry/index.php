<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle Entry</title>
</head>
<body>
    <main>
<?php
    if(isset($_SESSION['message'])) {
?>
        <p><?= $_SESSION['message'] ?></p>
<?php
    unset($_SESSION['message']);
    }
?>
        <form action="process.php" method="POST">
            <label for="mobile_number">Enter Your Number</label>
            <input type="text" name="mobile_number">
            <input type="submit" name="submit" value="Submit">
        </form>
    </main>
    
</body>
</html>