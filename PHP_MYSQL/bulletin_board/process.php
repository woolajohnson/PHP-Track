<?php 
    session_start();
    require_once('new-connection.php');

    if(isset($_POST['submit'])) {
        $number = $_POST['mobile_number'];

        if(substr($number, 0, 2) !== "09" && strlen($number) !== 11) {
            $_SESSION['message'] = "Please fill up correctly!";
            $_SESSION['message_type'] = "error_message";
            header('Location: index.php');
            exit();
        } else {
            $query = $connection->query("INSERT INTO numbers (number) VALUES ('$number')");
            $_SESSION['message'] = "You have successfully inserted a new contact number!";
            $_SESSION['message_type'] = "success_message";
            header('Location: success.php');
            exit();
        }
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $connection->query("DELETE FROM numbers WHERE id = $id");
        $_SESSION['message'] = "Contact number has been successfully removed!";
        $_SESSION['message_type'] = "error_message";
        header('Location: success.php');
        exit();
    }   
    header('Location: index.php');
    exit();
?>