<?php
session_start();
date_default_timezone_set('Asia/Manila');
$now = date("m-d-Y g:i A");
$previous_message = isset($_SESSION['message']) ? $_SESSION['message'] : '';

if (isset($_POST['reset'])) {
    unset($_SESSION['money']);
    unset($_SESSION['message']);
    header('Location: index.php');
    exit();
}
$risk_levels = array(
    'low_risk' => rand(-25, 100),
    'moderate_risk' => rand(-100, 1000),
    'high_risk' => rand(-500, 2500),
    'severe_risk' => rand(-3000, 5000)
);
if ($_SESSION['money'] <= 0) {
    $current_message = "You don't have enough balance to play. You can Reset the Game!";
    $_SESSION['message'] = $previous_message . "<br><span class='{$_SESSION['color']}'>{$current_message}</span>";
    header('Location: index.php');
    exit();
} elseif ($_SESSION['money'] > 0) {
    foreach ($risk_levels as $key => $result) {
        if (isset($_POST[$key])) {
            $_SESSION['money'] += $result;
            $_SESSION['color'] = ($result > 0) ? 'win_color' : 'lose_color';
            $current_message = $now . " You pushed " . ucfirst(str_replace('_', ' ', $key)) . ". Value is " . $result . ". Your current money is " . $_SESSION['money'];
            $_SESSION['message'] = $previous_message . "<br><span class='{$_SESSION['color']}'>{$current_message}</span>";
            header('Location: index.php');
            exit();
        }
    }
}
?>