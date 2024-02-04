<?php 
    session_start();
    require_once('new-connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success | Raffle Entry</title>
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
        <table>
            <thead>
                <tr>
                    <th>Contact number</th>
                    <th>Date inserted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
            $query = "SELECT id, number, DATE_FORMAT(created_at, '%m-%d-%Y %h:%i:%s %p') AS date FROM numbers";
            $result = fetch_all($query);
            foreach($result as $row) {
?>
                <tr>
                    <td><?= $row['number'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><a href="process.php?id=<?= $row['id'] ?>">Delete</a></td>
                </tr>
<?php 
            }
?>
            </tbody>
        </table>
        <a href="index.php">Go back</a>
    </main>
    
</body>
</html>