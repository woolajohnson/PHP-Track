<?php 
    session_start();
    if (isset($_POST['reset'])) {
        $_SESSION['counter'] = 10;
        header('Location: index.php');
    } else if (isset($_POST['claim']) && $_SESSION['counter'] <= 0) {
        header('Location: coupons.php');
    } else if (isset($_POST['claim']) && $_SESSION['counter'] > 0) {
        header('Location: index.php');
    }
?>