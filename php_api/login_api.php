<?php 
    session_name("adi-php-systems");
    session_start();

    require 'db_connection.php';

    if (isset($_POST['Login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // MySQL
        $sql = "SELECT email, password, approved, users_role, users_group FROM users 
                WHERE email = '$email' AND password = '$password'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conn = null;
        if ($stmt->rowCount() > 0) {
            foreach($stmt->fetchALL() as $x){

                //save all needed for session
                $_SESSION['users_role'] = $x['users_role'];
                $_SESSION['users_group'] = $x['users_group'];
                $_SESSION['email'] = $x['email'];

                if ($x['approved'] == '0') {
                    echo 'this account is not yet approved.';
                    exit;
                } else {
                    header('location: ../pages/dashboard.php');
                }
            }
        } else {
            echo 'sign-in failed. redirecting back to sign-in page';
            header('Refresh: 2; url=../pages/signin.php');
        }

    }
?>