<!-- User Bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="../static/img/analog.png" alt="Logo" class="brand-image elevation-3">
		<span class="brand-text font-weight-light">&nbsp;USER</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="user_dashboard.php" class="nav-link<?php echo ($bar_whois_active == "userdashboard" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="exampleuserlink.php" class="nav-link<?php echo ($bar_whois_active == "exampleuserlink" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Example User Link</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="../php_api/logout_api.php" class="nav-link">
						<button type="button" class="btn bg-danger btn-block">Logout</button>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END User Bar -->