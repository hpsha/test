<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Jetson I Fast build Admin dashboard for any platform</title>
		<meta name="description" content="Jetson is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Jetson Admin, Jetsonadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="<?php echo base_url('app-assets/favicon.ico');?>" type="image/x-icon">		
		
		<!-- vector map CSS -->
		<link href="<?php echo base_url('app-assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url('app-assets/full-width-light/dist/css/style.css');?>" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper box-layout pa-0">
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="sp-logo-wrap text-center pa-0 mb-30">
											<a href="<?php echo base_url(); ?>">
						<img class="brand-img mr-10" src="<?php  echo base_url(); ?>app-assets/img/inner-logo.png" alt="simta"/>
						<!--<span class="brand-text">SIMTA</span>-->
					</a>
										</div>
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Need help with your password?</h3>
											<h6 class="text-center txt-grey nonecase-font">Enter the email you use for Simta, and we’ll help you create a new password.</h6>
										</div>	
										<div class="form-wrap">
											<form action="#">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                            <input type="email" class="form-control" id="exampleInputEmail_2" placeholder="Enter email" data-validation="email" data-validation-error-msg="Please enter a valid e-mail">
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">Reset</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('app-assets/vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
                <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
                <script src="<?php echo base_url('app-assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'); ?>"></script>
                
		
		<!-- Slimscroll JavaScript -->
                <script src="<?php echo base_url('app-assets/full-width-light/dist/js/jquery.slimscroll.js'); ?>"></script>
		
		<!-- Init JavaScript -->
                <script src="<?php echo base_url('app-assets/full-width-light/dist/js/init.js'); ?>"></script>
		<script src="<?php echo base_url('app-assets/dist/js/form-validation.min.js');?>"></script> 
	<script>
			$.validate({
			});
		</script>
                
	</body>
</html>
