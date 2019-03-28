<?php

session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        require_once 'database.php';
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();

        if (password_verify($_POST['password'],$user->password)  ) {
            $_SESSION['user'] = $user->username;
            header("location: index.php?msg=success");
            die();
        }
    }
}

header("location: login.php?error_msg=".urlencode("email or password is incorrect"));
die();
