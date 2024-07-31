<?php
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

// MySQL
$sql = "SELECT id FROM user_accounts";
$stmt = $conn->prepare($sql);
$stmt->execute();
$_SESSION['user_total'] = $stmt->rowCount();

$sql = "SELECT id FROM user_accounts WHERE approved = '1'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$_SESSION['user_active'] = $stmt->rowCount();

$sql = "SELECT id FROM user_accounts WHERE approved = '0'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$_SESSION['user_toapprove'] = $stmt->rowCount();

$conn = null;
?>