<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Ticket</title>
</head>
<body>
    <main>
<?php 
        if(!empty($_SESSION['errors'])) {
            foreach($_SESSION['errors'] as $error) {
?> 
                <p><?= $error ?></p>
<?php
            }
            unset($_SESSION['errors']);
        }
?>
        <form action="process.php" method="POST">
            <label for="date_today">Date</label>
            <input type="date" name="date_today" id="date_today">

            <label for="first_name">First Name</label>
            <input type="text" name="first_name">

            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">

            <label for="email">Email Address</label>
            <input type="text" name="email">

            <label for="issue_title">Issue Title</label>
            <input type="text" name="issue_title">

            <label for="issue_details">Issue Details</label>
            <textarea name="issue_details" id="issue_details" cols="30" rows="10"></textarea>

            <input type="submit" name="submit" value="Submit">
        </form>
    </main>
</body>
</html>