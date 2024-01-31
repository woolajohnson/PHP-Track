<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Ticket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="message">
<?php 
        if(!empty($_SESSION['errors'])) {
            foreach($_SESSION['errors'] as $error) {
?> 
                <p><?= $error ?></p>
<?php
            }
            unset($_SESSION['errors']);
        } else if (empty($_SESSION['errors']) && !empty($_SESSION['success'])) {
?>
            <h5><?= $_SESSION['success'] ?></h5>
<?php
            unset($_SESSION['success']);
        }
?>
        </div>
        <form action="process.php" method="POST">
            <label for="date_today">Date Today <span class="required">*</span></label>
            <input type="date" name="date_today" id="date_today">

            <label for="first_name">First Name <span class="required">*</span></label>
            <input type="text" name="first_name">

            <label for="last_name">Last Name <span class="required">*</span></label>
            <input type="text" name="last_name">

            <label for="email">Email Address <span class="required">*</span></label>
            <input type="text" name="email">

            <label for="issue_title">Issue Title <span class="required">*</span></label>
            <input type="text" name="issue_title">

            <label for="issue_details">Issue Details <span class="required">*</span></label>
            <textarea name="issue_details" id="issue_details" cols="30" rows="10"></textarea>

            <input type="submit" name="submit" id="submit" value="Submit">
        </form>
    </main>
</body>
</html>