<?php 
    session_start();
    require_once('new-connection.php');
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
            <h1>Bulletin Board View</h1>
<?php
        if(isset($_SESSION['message'])) {
?>
            <p class="<?= $_SESSION['message_type']?>"><?= $_SESSION['message'] ?></p>
<?php
        unset($_SESSION['message']);
        }
        $query = "SELECT *, DATE_FORMAT(created_at, '%m/%d/%Y') AS date FROM boards ORDER BY created_at DESC";
        $result = fetch_all($query);
        foreach($result as $row) {
?>  
            <section>
                <h3><?= $row['date']?> - <?= $row['subject']?></h3>
                <p><?= $row['details']?></p>
            </section>
<?php 
        }
?>
            <a id="get_back" href="index.php" class="nav" >Get back</a>
        </main>
    </body>
</html>