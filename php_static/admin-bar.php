<?php 
	session_name('adi-php-systems');
	session_start();

	if ($_SESSION['site_role'] <> "ADMIN") {
		header('location: ../pages/signin.php');
	}
?>
<!-- Admin Bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="../static/img/analog.png" alt="Logo" class="brand-image elevation-3">
		<span class="brand-text font-weight-light">&nbsp;ADMIN</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="admin_dashboard.php" class="nav-link<?php echo ($bar_whois_active == "admindashboard" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="exampleadminlink.php" class="nav-link<?php echo ($bar_whois_active == "exampleadminlink" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Example Admin Link</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="../php_api/logout_api.php" class="nav-link">
						<i class="nav-icon fas fa-circle"></i><p>Logout</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END Admin Bar -->