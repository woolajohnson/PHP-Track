<?php 
    session_start();
    if(isset($_POST['submit'])) {
        $date = $_POST['date_today'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $issue_title = $_POST['issue_title'];
        $issue_details = $_POST['issue_details'];
        $errors = array();

        $fields = array(
            "Date" => $date,
            "First Name "=> $first_name,
            "Last Name" => $last_name,
            "Email Address" => $email,
            "Issue Title" => $issue_title,
            "Issue Details" => $issue_details
        );
        foreach($fields as $key => $value) {
            if (empty($value)) {
                $empty_error = $key . " is required! <br>";
                $errors[] = $empty_error;
            }
        }
        $current_date = date("Y-m-d");
        $date_array = explode('-', $date);
        $year = $date_array[0];
        $month = $date_array[1];
        $day = $date_array[2];
        $check_date = checkdate($month, $day, $year);
        if(!empty($date) && !$check_date) {
            $errors[] = "You entered invalid date!";
        }
        if(!empty($date) && $current_date != $date) {
            $errors[] = "Please enter today's date!";
        }
        for($i = 0; $i < strlen($first_name); $i++) {
            if(is_numeric($first_name[$i])) {
                $errors[] = "First Name cannot contain a number!";
                break;
            }
        }
        for($i = 0; $i < strlen($last_name); $i++) {
            if(is_numeric($last_name[$i])) {
                $errors[] = "Last Name cannot contain a number!";
                break;
            }
        }
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid Email Address!";
        }
        if(!empty($issue_title) && strlen($issue_title) > 50) {
            $errors[] = "The Issue Title cannot be more than 50 characters!";
        }
        if(!empty($issue_details) && strlen($issue_details) > 250) {
            $errors[] = "The Issue Details cannot be more than 250 characters!";
        }
        if(empty($errors)) {
            $_SESSION['success'] = "Thank you for your patience! Please wait for a response from our IT team.";
        }
        $_SESSION['errors'] = $errors;
        header('Location: index.php');
        exit();
    } 
    header('Location: index.php');
    exit();
?>