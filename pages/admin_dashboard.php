<?php
    $directory = " / Dashboard";
    $bar_whois_active = "admindashboard";

	session_name('adi-php-systems');
	session_start();

	if ($_SESSION['site_role'] <> "ADMIN") {
		header('location: ../pages/signin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADI Systems</title>
        <?php include '../php_static/link-rels.php'?>
    </head>
    <body class="sidebar-mini layout-fixed">
        <div class="wrapper">
            <?php include '../php_static/nav-bar.php'?>
            <?php include '../php_static/admin-bar.php'?>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <?php include 'admin_dashboard_content.php'?>
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
            <?php include '../php_static/scripts-rels.php'?>
        </div>
    </body>
</html>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    })
</script>
<?php
//alerting after an api redirect
    if (isset($_SESSION['login_attempt_success'])) {
        echo "
        <script>
        Toast.fire({
            icon: 'success',
            title: '" . $_SESSION['login_attempt_success'] . "',
        })
        </script>
        ";
        $_SESSION['login_attempt_success'] = null;
    }
?>

