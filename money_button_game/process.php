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

$risk_levels = [
    'low_risk' => ['min' => -25, 'max' => 100],
    'moderate_risk' => ['min' => -100, 'max' => 1000],
    'high_risk' => ['min' => -500, 'max' => 2500],
    'severe_risk' => ['min' => -3000, 'max' => 5000]
];

if ($_SESSION['money'] <= 0) {
    $current_message = "You don't have enough balance to play. You can Reset the Game!";
    $_SESSION['message'] = $previous_message . "<br><span class='{$_SESSION['color']}'>{$current_message}</span>";
    header('Location: index.php');
    exit();
} elseif ($_SESSION['money'] > 0) {
    foreach ($risk_levels as $key => $range) {
        if (isset($_POST[$key])) {
            $result = rand($range['min'], $range['max']);
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
