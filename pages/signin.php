<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHP Systems Sign-in</title>

		<?php include '../php_static/link-rels.php';?>
	</head>

	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<img src="../static/img/analog_ico.ico" style="height:150px;">
				<h2><b>PHP<br>Systems</b></h2>
			</div>
			<!-- /.login-logo -->
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg"><b>Sign in to start your session</b></p>
					<?php include '../forms/signin_form.php';?>
					
					<div class="row mb-2">
						<div class="col">
							<a href="register.php">
								<button type="button" class="btn bg-info btn-block">Register</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include '../php_static/scripts-rels.php';?>
	</body>
</html>