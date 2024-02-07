<?php 
    session_start();
    require_once('new-connection.php');

    if(isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        $salt = bin2hex(openssl_random_pseudo_bytes(10));
        $encrypted_password = md5($password . '' . $salt);
        $confirm_password = $_POST['confirm_password'];
        $find_contact = $connection->query("SELECT * FROM users WHERE contact = '$contact' ");
        $find_email = $connection->query("SELECT * FROM users WHERE email = '$email' ");
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
        if(!empty($first_name) && strlen($first_name) < 2) {
            $errors[] = "First name must be a minimum of 2 characters long!";
        }
        if(!empty($last_name) && strlen($last_name) < 2) {
            $errors[] = "Last name must be a minimum of 2 characters long!";
        }
        if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid Email Address!";
        }
        if(!empty($email) && $find_email->num_rows > 0) {
            $errors[] = "Email already exists.";
        }
        if(!empty($contact) && substr($contact, 0, 2) !== "09" && strlen($contact) !== 11 && !is_numeric($contact)) {
            $errors[] = "Please enter a valid number!";
        }
        if(!empty($contact) && $find_contact->num_rows > 0) {
            $errors[] = "Contact number already exists.";
        }
        if(!empty($password) && strlen($password) < 8) {
            $errors[] = "Password must be a minimum of 8 characters long!";
        }
        if(!empty($password) && $password !== $confirm_password) {
            $errors[] = "Passwords do not match!";
        }
        if(empty($errors)) {
            $query = "INSERT INTO users (first_name, last_name, email, contact, password, salt) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$contact}', '{$encrypted_password}', '{$salt}')";
            $connection->query($query);
            $_SESSION['success'] = "Congratulations! You have successfully registered. Log in now to get started.";
            header('Location: login.php');
            exit();
        }
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }
    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_query = "SELECT * FROM users WHERE email = '$email'";
        $user = fetch_record($user_query);
        if(!empty($user)) {
            $encrypted_password = md5($password . '' . $user['salt']);
            if($user['password'] == $encrypted_password) {
                $_SESSION['user'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                header('Location: index.php');
                exit();
            } else {
                $errors[] = "Sorry, the entered credentials are not valid. Try again.";
            }
        } else {
            $errors[] = "Sorry, the entered credentials are not valid. Try again.";
        }
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
        exit();
    }
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }
    if(isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = "village88";
        $salt = bin2hex(openssl_random_pseudo_bytes(10));
        $encrypted_password = md5($password . '' . $salt);

        $query = "SELECT * FROM users WHERE email = '{$email}' AND contact = '{$contact}'";
        $user = fetch_record($query);
        if(empty($user)) {
            $errors[] = "Sorry, the entered credentials are not correct. Try again.";
        } else {
            $_SESSION['success'] = "Congratulations! You have successfully recover your account. Please use the default password when you sign in.";
            $update_password = $connection->query("UPDATE users SET password = '{$encrypted_password}', salt = '{$salt}' WHERE contact = '{$contact}'");
        }
        $_SESSION['errors'] = $errors;
        header('Location: forgot_password.php');
        exit();
    }
    header('Location: index.php');
    exit();
?>