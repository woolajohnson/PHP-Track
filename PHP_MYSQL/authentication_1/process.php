<?php 
    session_start();
    if(isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $errors = array();

        $fields = array(
            "First name "=> $first_name,
            "Last name" => $last_name,
            "Email address" => $email,
            "Contact number" => $contact,
            "Password" => $password,
            "Confirm password" => $confirm_password
        );
        foreach($fields as $key => $value) {
            if (empty($value)) {
                $empty_error = $key . " is required! <br>";
                $errors[] = $empty_error;
            }
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