<?php
require 'db_connection.php';
$generic = $_POST['generic'];

$sql = [
    "DELETE from critical_dates where generic = :generic",
    "DELETE from equipment where generic = :generic",
    "DELETE from general_project_info where generic = :generic",
    "DELETE from key_personnel where generic = :generic",
    "DELETE from links where generic = :generic"
];

foreach ($sql as $query) {
    $stmt = $conn -> prepare($query);
    $stmt -> bindParam(':generic', $generic);
    $stmt -> execute();
}

$conn = null;
header('location: ../pages/project_list.php');
exit();