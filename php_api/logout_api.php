<?php 
	session_name('adi-php-systems');
	session_start();

    session_unset();
    session_destroy();

    echo 'session destroyed. redirecting back to sign in page';
    header('Refresh: 2; url=../pages/signin.php');
?>