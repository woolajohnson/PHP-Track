<?php 
    session_start();
    if(isset($_POST['submit'])) {
        $number = $_POST['mobile_number'];
        $error = array();

        if(substr($number, 0, 2) !== "09" && strlen($number) !== 11) {
            $error[] = "You have entered an invalid number!";
            $_SESSION['error_message'] = $error;
            header('Location: index.php');
            exit();
        } else {
            echo "success";
            exit();
        }
    }   
    header('Location: index.php');
    exit();
?>