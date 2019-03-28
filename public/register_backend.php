<?php

$error_msg = '';

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) && isset( $_POST['password-repeat'] ) ) {
        if( $_POST['password'] === $_POST['password-repeat']){
            require_once 'database.php';
            $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();

            if(mysqli_num_rows($result) == 0){
                $stmt = $con->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param('ss', $_POST['username'],password_hash ( $_POST['password'] , PASSWORD_DEFAULT));
                $stmt->execute();
                header("location: login.php?error_msg= ".urlencode("success, now login"));
                die();
            }
            else{
                $error_msg = 'Username already taken';
            }
        }
        else{
            $error_msg = 'The passwords are different';
        }
    }
    else{
        $error_msg = 'Something is not filled in';
    }
}

header("location: register.php?error_msg=".urlencode($error_msg));
die();
