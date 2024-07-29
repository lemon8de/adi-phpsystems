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

    if (isset($_POST['Login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // MySQL
        $sql = "SELECT username, password, approved FROM user_accounts 
                WHERE username = ? AND password = ?";

        $stmt = $conn->prepare($sql);
        $params = array($username, $password);
        $stmt->execute($params);
        if ($stmt->rowCount() > 0) {
            foreach($stmt->fetchALL() as $x){
                if ($x['approved'] == '0') {
                    echo 'this account is not yet approved. wait for admin';
                } else {
                    header('location: ../pages/dashboard.php');
                }
            }
        } else {
            echo 'sign in failed.';
        }

    }
?>