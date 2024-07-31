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
        $sql = "SELECT username, password, approved, site_role FROM user_accounts 
                WHERE username = ? AND password = ?";

        $stmt = $conn->prepare($sql);
        $params = array($username, $password);
        $stmt->execute($params);
        $conn = null;
        if ($stmt->rowCount() > 0) {
            foreach($stmt->fetchALL() as $x){
                $_SESSION['site_role'] = $x['site_role'];
                $_SESSION['username'] = $x['username'];
                if ($x['approved'] == '0') {
                    $_SESSION['login_attempt_failed'] = "Sign in Failed. Registered Account still not approved";
                    header('location: ../pages/signin.php');
                } else {
                    $_SESSION['login_attempt_success'] = "Sign in Successful. Signed in as " . $_SESSION['username'] . "-" . $_SESSION['site_role'];
                    if ($x['site_role'] == "ADMIN") {
                        header('location: ../pages/admin_dashboard.php');
                    } else {
                        header('location: ../pages/user_dashboard.php');
                    }
                }
            }
        } else {
            $_SESSION['login_attempt_failed'] = "Sign in Failed. Verify your credentials";
            header('location: ../pages/signin.php');
        }

    }
?>