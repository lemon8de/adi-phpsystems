<?php
    session_name('adi-php-systems');
    session_start();

    $_SESSION['logout_success'] = "User logged out successfully";
    header('location: ../pages/signin.php');
?>