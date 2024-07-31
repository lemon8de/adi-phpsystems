<?php 
    session_name("adi-php-systems");
    session_start();

    //database
    date_default_timezone_set('Asia/Manila');
    $servername = 'localhost'; $username = 'root'; $password = '';
    try {
        $conn = new PDO ("mysql:host=$servername;dbname=adiphp_systems",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'NO CONNECTION'.$e->getMessage();
    }
    //end database

    if (isset($_POST['Register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        // MySQL
        $sql = "SELECT id FROM user_accounts WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $params = array($username);
        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            $_SESSION['registration_failed'] = "Username already taken";
            header('location: ../pages/signin.php');
            exit;
        }
        if ($password <> $confirmpassword) {
            $_SESSION['registration_failed'] = "Password do not match";
            header('location: ../pages/signin.php');
            exit;
        }

        // MySQL
        $sql = "INSERT INTO user_accounts (username, password) VALUES ('$username','$password')";
        $stmt = $conn->prepare($sql);
        $params = array($username);
        $stmt->execute($params);
        $conn = null;

        $_SESSION['registration_success'] = "Registration Complete. Await confirmation from admin";
        header('location: ../pages/signin.php');
    }
?>