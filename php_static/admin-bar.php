<!-- Admin Bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="main.php" class="brand-link">
		<img src="../static/img/analog.png" alt="Logo" class="brand-image elevation-3">
		<span class="brand-text font-weight-light">&nbsp;PHP Systems</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="dashboard.php" class="nav-link<?php echo ($adminbar_whois_active == "dashboard" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="examplelink.php" class="nav-link<?php echo ($adminbar_whois_active == "examplelink" ? ' active': '');?>">
						<i class="nav-icon fas fa-bus"></i><p>Example Link</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END Admin Bar -->