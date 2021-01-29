
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN HERE</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>admin_assets/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>admin_assets/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>admin_assets/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>admin_assets/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>admin_assets/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body class="bg-slate-800" >

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form action="<?php echo site_url('manage_ad/login'); ?>" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><img src="<?php echo base_url(); ?>admin_assets/assets/logo.png" width="100"/></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>
							
								
							 <?php
							if($this->session->flashdata('abc'))
								{
									?>
									<span class="text-semibold" style="color:red;">Opps! Invalid username or Password !	</span>							<?php
										
								}
								?>
							
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							
							<div class="form-group">
								<button type="submit" name="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
								
							</div>
							<div class="text-center">
								<a href="forgot_password.php">Forgot Password</a>
							</div>

							

							</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted">
						
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
