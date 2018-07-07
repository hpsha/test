<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>ANIL TRACK LOGIN</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="<?php echo base_url('app-assets/favicon.ico');?>" type="image/x-icon">		
		<!-- vector map CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css'); ?>">
		<!-- Custom CSS -->
		<link href="<?php echo base_url('app-assets/full-width-light/dist/css/style.css');?>" rel="stylesheet" type="text/css">

		<style>
		 .errors{

                color:red;

            }

            .success{

                color:green;

            }
</style>
	</head>
        <body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
	
		<div class="wrapper box-layout pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="javascript:void(0);">
						<img class="brand-img" src="<?php  echo base_url(); ?>app-assets/img/inner-logo.png" alt="anil" style="width:55%;"/>
						<!--<span class="brand-text">SIMTA</span>-->
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10"></span>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page"  style="background-image: url('<?php echo base_url(); ?>app-assets/dist/img/background_login.jpg');">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap" style="padding: 100px 0 27px 0;">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12" style="background-color: #fff;padding: 48px 40px 36px;border-radius: 5px;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign in to Anil Foods</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form action="#">
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">User Name</label>
													<input type="email" class="form-control" id="email" name="email" placeholder="User Name" data-validation="email" data-validation-error-msg="Please enter a valid e-mail">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													<div class="clearfix"></div>
													<input type="password" class="form-control" id="pass_wrd" name="pass_wrd" placeholder="Enter Password" data-validation="required" data-validation-error-msg="Please Enter Valid Password">
												</div>
												<!--
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required="" type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>-->
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10">
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="text-center"> 
												  <span class="success" id="success"></span>
												    												    <span class="errors" id="errors"></span>
												    												    </div>

												<div class="form-group text-center">
												    
												  
													<button type="submit" class="btn btn-info  btn-rounded">Sign in</button>
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
			 $('form').on('submit', function (e) {

e.preventDefault();


                                                

                                                            $.ajax({

                                                                type: 'post',

                                                                url: '<?php echo base_url(); ?>User/login',

                                                                data:$('form').serialize(),
                                                                

                                                                success: function (b) {
                                                                      alert(b);
                                                                    if (b == 2 || b == 3) {


                                                                        window.location.href = "<?php echo base_url(); ?>Dashboard";

                                                                        $("#success").html("Please wait");

                                                                    } else {


                                                                        $("#errors").html("Username or Password is wrong");

                                                                    }

                                                                    setTimeout(function () {

                                                                        $("#success").html("")

                                                                    }, 2000);

                                                                    setTimeout(function () {

                                                                        $("#errors").html("")

                                                                    }, 2000);
                                                                }

                                                            });



                                               



                                                    });
		</script>
        </body>
</html>
