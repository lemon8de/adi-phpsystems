<?php
    $directory = " / Project List";
    $bar_whois_active = "project_list";
    require '../php_api/db_connection.php';
    session_name('adi-php-systems');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADI Systems</title>
        <?php include '../php_static/link-rels.php'?>
        <?php include '../php_static/scripts-rels.php'?>
    </head>
    <body class="sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php include '../php_static/nav-bar.php'?>
            <?php include '../php_static/sidebar.php'?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <?php include 'project_list_content.php'?>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <strong>ADI PHP Systems</strong>
                Development State.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>
        </div>
    </body>
</html>