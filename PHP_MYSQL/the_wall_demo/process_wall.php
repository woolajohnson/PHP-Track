<?php 
    require_once('new-connection.php');
    session_start();

    if(isset($_POST['action']) && $_POST['action'] == "create_message") {
        $content = $_POST['message_content'];
        $user_id = $_SESSION['user'];

        $query = $connection->query("INSERT INTO messages (user_id, content) VALUES ('$user_id', '$content')");
        header("location: index.php");
        exit();
    }
    if(isset($_POST['action']) && $_POST['action'] == "create_comment") {
        $content = $_POST['comment_content'];
        $user_id = $_SESSION['user'];
        $message_id = $_POST['message_id'];

        $query = $connection->query("INSERT INTO comments (user_id, message_id, content) VALUES ('$user_id', '$message_id', '$content')");
        header("location: index.php");
        exit();
    }
?>