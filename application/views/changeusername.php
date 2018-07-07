	<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="sp-logo-wrap text-center pa-0 mb-30">

										</div>
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Change Username</h3>
										</div>
										<div class="form-wrap">
											<form action="#" id="form_data">
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_1">Current Password</label>
													<input type="password"  name="cur_pass"  id="cur_pass" class="form-control" data-validation="required" data-validation-error-msg="Please Enter Old Password"  placeholder="Enter Password">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">New Username</label>
													<input type="text" name="new_username" id="new_username"  data-validation="required" data-validation-error-msg="Please Enter New Username" class="form-control"  placeholder="Enter New Username">
												</div>
												<div class="form-group text-center">
                                                <span class="success" id="success"></span>
												<span class="errors" id="errors"></span>
												</div>
                                                <span class="errors" id="errors"></span>

													<button type="submit" class="btn btn-info btn-rounded">Submit</button>
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

			<!-- /Main Content -->
                        <script>
          $('form').on('submit', function (e) {
          e.preventDefault();
          $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Dashboard/change_username',
            data: $('#form_data').serialize(),
            success: function (b) {
            	alert(b);
              if(b==1){
                window.location.href = "<?php echo base_url(); ?>Dashboard/logout";
                $("#success").html("Now login with New Username");
              }
              if(b==2){
                $("#errors").html("Something Went Wrong Cant change Username");
              }
              setTimeout(function() {
                        $("#success").html("")
                    }, 2000);
              setTimeout(function() {
                        $("#errors").html("")
                    }, 2000)
            }
          });


        });

                            </script>