<?php 
    require 'db_connection.php';

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $users_role = $_POST['users_role'];
    $users_group = $_POST['users_group'];

    //password check
    if ($password <> $confirmpassword) {
        echo 'password and confirm password mismatch, redirecting back to register page';
        header('Refresh: 2; url=../pages/register.php');
        exit;
    }

    //username duplicate check
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() <> 0) {
        echo 'email taken, redirecting back to register page';
        header('Refresh: 2; url=../pages/register.php');
        exit;
    }

    //finally insert and success
    $sql = "INSERT INTO users (full_name, email, password, users_role, users_group) 
    VALUES ('$full_name', '$email', '$password', '$users_role', '$users_group')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo 'register success, wait for admin approval, redirecting back to sign-in page';
    header('Refresh: 2; url=../pages/signin.php');
    exit();