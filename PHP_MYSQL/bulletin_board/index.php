<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bulletin Board</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <main>
            <h1>Bulletin Board Entry</h1>
<?php
        if(isset($_SESSION['message'])) {
?>
            <p class="<?= $_SESSION['message_type']?>"><?= $_SESSION['message'] ?></p>
<?php
        unset($_SESSION['message']);
        }
?>
            <form action="process.php" method="POST">
                <label for="subject">Subject:</label>
                <input class="field" id="subject" type="text" name="subject">

                <label for="details">Details:</label>
                <textarea class="field" name="details" id="details" cols="30" rows="5"></textarea>
                <!-- <input class="field" type="text" name="details"> -->
                <input type="submit" class="nav" name="add" id="add" value="Add">
                <a href="main.php" class="nav" >Skip</a>
            </form>
        </main>
    </body>
</html>