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
        if(!empty($_SESSION['error_message'])) {
            foreach($_SESSION['error_message'] as $error_message) {

                
?>
            <p><?= $error_message ?></p>
<?php
            }
        unset($_SESSION['error_message']);
        }
?>
        <form action="success.php" method="POST">
            <label for="mobile_number">Enter Your Number</label>
            <input type="text" name="mobile_number">
            <input type="submit" name="submit" value="Submit">
        </form>
    </main>
    
</body>
</html>