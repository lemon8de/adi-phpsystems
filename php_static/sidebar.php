<!-- User Bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="../static/img/analog.png" alt="Logo" class="brand-image elevation-3">
		<span class="brand-text font-weight-light">&nbsp;ADI</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="dashboard.php" class="nav-link<?php echo ($bar_whois_active == "dashboard" ? ' active': '');?>">
						<i class="nav-icon fas fa-circle"></i><p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="project_list.php" class="nav-link<?php echo ($bar_whois_active == "project_list" ? ' active': '');?>">
						<i class="nav-icon fas fa-circle"></i><p>Project List</p>
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
<!-- END User Bar -->