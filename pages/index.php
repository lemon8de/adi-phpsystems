<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Web Template</title>

		<?php include '../php_static/link-rels.php';?>
	</head>

	<body class="login-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<img src="../static/img/analog_ico.ico" style="height:150px;">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<h2><b>ADI<br>PHP Systems</b></h2>	
				</div>
			</div>

			<div class="row">
				<div class="col-sm-5">
					<div class="card">
          				<div class="card-header">
            				<h3 class="card-title">Sign-in</h3>
            				<div class="card-tools">
              					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                					<i class="fas fa-minus"></i>
              					</button>
            				</div>
          				</div>
          				<div class="card-body">
							<?php include '../forms/signin_form.php';?>
          				</div>
					</div>
        		</div>
			</div>

			<div class="row">
				<div class="col-sm-5">
					<div class="card collapsed-card">
          				<div class="card-header">
            				<h3 class="card-title">Register</h3>
            				<div class="card-tools">
              					<button type="button" class="btn btn-tool" data-card-widget="collapse">
                					<i class="fas fa-plus"></i>
              					</button>
            				</div>
          				</div>
          				<div class="card-body" style="display:none;">
							<?php include '../forms/register_form.php';?>
          				</div>
					</div>
        		</div>
			</div>

		</div>
		<?php include '../php_static/scripts-rels.php';?>
	</body>
</html>
