<?php 
    session_start();
    require_once('new-connection.php');

    if(isset($_POST['add'])) {
        $subject = $_POST['subject'];
        $details = $_POST['details'];

        if(empty($subject) || empty($details)) {
            $_SESSION['message'] = "Subject and Details cannot be empty!";
            $_SESSION['message_type'] = "error_message";
            header('Location: index.php');
            exit();
        } else {
            $query = $connection->query("INSERT INTO boards (subject, details) VALUES ('$subject', '$details')");
            $_SESSION['message'] = "You have successfully added a new announcement!";
            $_SESSION['message_type'] = "success_message";
            header('Location: main.php');
            exit();
        }
    }  
    header('Location: index.php');
    exit();
?>