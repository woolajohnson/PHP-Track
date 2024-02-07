<?php 
    require_once('new-connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Wall</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="css/wall.css">
    </head>
    <body>
        <section class="nav_container">
            <nav>
<?php 
            if(isset($_SESSION['user'])) {
?>
                <h3>Welcome, <?= $_SESSION['first_name']?></h3>
                <form id="form_logout" action="process.php" method="POST">
                    <input type="submit" name="logout" id="logout" value="Logout">
                </form>
<?php
            } else {
?>
                <a href="login.php">Login</a>
<?php
            }
?>
            </nav>
        </section>
        <main>
            <h1>My Wall</h1>
<?php 
    if(isset($_SESSION['user'])) {
?>
            <!-- Form for messages -->
            <h2>Post a message</h2>
            <form action="process_wall.php" method="POST">
                <input type="hidden" name="action" value="create_message">
                <label for="message_content"></label>
                <textarea name="message_content" id="message_content" cols="30" rows="10" placeholder="Post a message here.."></textarea>
                <input type="submit" id="message_button" value="Create a message">
            </form>
<?php 
    }   
?>
<?php 
    $query = "SELECT messages.*, CONCAT(users.first_name, ' ', users.last_name) AS name FROM messages LEFT JOIN users ON messages.user_id = users.id ORDER BY created_at DESC";
    $result = fetch_all($query);
    foreach($result as $message) {
?>
            <!-- Messages -->
            <div class="message_area">
                <h3>Message from <?= $message['name'] ?>(<?= $message['created_at'] ?>)</h3>
                <p><?= $message['content'] ?></p>
            </div>
<?php 
        $comments = fetch_all("SELECT comments.*, CONCAT(users.first_name, ' ', users.last_name) AS name FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE comments.message_id = {$message['id']} ORDER BY created_at");
        foreach($comments as $comment) {
?>
            <!-- Comments -->
            <div class="comment_area">
                <h3>Comment from <?= $comment['name'] ?>(<?= $comment['created_at'] ?>)</h3>
                <p><?= $comment['content'] ?></p>
            </div>
<?php 
        }
        if(isset($_SESSION['user'])) {
?>
            <!-- Form for comments -->
            <form action="process_wall.php" method="POST">
                <input type="hidden" name="action" value="create_comment">
                <input type="hidden" name="message_id" value="<?= $message['id'] ?>">
                <label for="comment_content"></label>
                <textarea name="comment_content" id="comment_content" cols="30" rows="10" placeholder="Post a comment here.."></textarea>
                <input type="submit" id="comment_button" value="Post a comment">
            </form>
<?php
        }
    }
?>
        </main>
    </body>
</html>