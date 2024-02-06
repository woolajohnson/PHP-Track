<?php 
    session_start();
    require_once('new-connection.php');
    $query = "SELECT * FROM users WHERE id = '{$_SESSION['user']}'";
    $user = fetch_record($query);
    if (!isset($_SESSION['user'])) {
        header("location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard | Authentication I</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            </div>
            <form action="process.php" method="POST">
                <h2>Welcome, <?= $user['first_name'] . " " . $user['last_name']?></h2>
                <input type="submit" name="logout" id="logout" value="Logout">
            </form>
        </main>
    </body>
</html>