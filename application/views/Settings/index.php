<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->

    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Update Settings</h5>
                </div>

                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="active"><span>Edit Settings</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->

            </div>
            <!-- /Title -->

            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel card-view">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">

                                    <form data-toggle="validator" role="form" name="settings" action="Settings/update" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Company Name</label>

                                                <input type="text" class="form-control" id="c_name" value="<?php echo $companies->company_name;?>" name="c_name" placeholder="Company Name" data-validation="required" data-validation-error-msg="Please enter Company Name">

                                            </div> </div>
                                        <div class="row ">
                                            <div class=" form-group mb-30 col-md-4">
                                                <label class="control-label mb-10 text-left">Company Logo</label>
                                                 <div class="fileinput fileinput-exists input-group " data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <span class="fileinput-filename" style="font-size:  12px;"><?php echo $companies->company_logo ;?></span></div>
                                                            <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> 
                                                                <span class="fileinput-new btn-text">Select file</span> 
                                                                <span class="fileinput-exists btn-text">Change</span>
                                                                <input type="hidden" value="" name="">
                                                                <input type="hidden" value="<?php echo $companies->company_logo ;?>" name="filename">       <input type="hidden" value="<?php echo $companies->company_favicon ;?>" name="filenames">
                                                                <input type="file" name="logo"  value="<?php echo $companies->company_logo ;?>" id="c_logo" accept=".png,.jpg,.jpeg"   >
                                                            </span> 
                                                            <a href="#"  onclick="datas()" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
                                                        </div>
                                            </div>
                                             <div class=" form-group mb-30 mt-30 col-md-4">
                                                  <img src="<?php echo base_url(); ?>uploads/<?php echo $companies->company_logo ?>">
                                        </div>	
                                        </div>	
                                        <div class="row">
                                            <div class=" form-group mb-30 col-md-4">
                                                <label class="control-label mb-10 text-left">Fav Icon</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"><?php echo $companies->company_logo ;?></span></div>
                                                    <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
                                                        <input type="file" name="icon"  value="<?php echo $companies->company_favicon ;?>" id="c_icon" accept=".png,.jpg,.jpeg" >
                                                    </span> <a href="#" onclick="datas_icon()" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> </span></a> 
                                                </div>
                                            </div>
                                            <div class=" form-group mb-30 mt-30 col-md-4">
                                                  <img src="<?php echo base_url(); ?>uploads/<?php echo $companies->company_favicon ?>">
                                        </div>	
                                        </div>		

                                        <div class="row">

                                            <div class="form-group mb-30 col-md-6">
                                                <label class="control-label mb-10">Financial Year</label>
                                                <div class="radio-inline pl-0">
                                                    <span class="radio radio-info">
                                                        <input type="radio" name="years" id="radio_5" value="1" <?php if($companies->company_financial_year==1){ echo "checked";}?> data-validation="required" data-validation-error-msg="Please select Financial Year">
                                                        <label for="radio_5">January to Decemeber</label>
                                                    </span>
                                                </div>
                                                <div class="radio-inline">
                                                    <span class="radio radio-info">
                                                        <input type="radio" name="years" id="radio_6" value="2" <?php if($companies->company_financial_year==2){ echo "checked";}?>data-validation="required" data-validation-error-msg="Please enter Company Name">
                                                        <label for="radio_6">April To March</label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-10" for="exampleInputEmail_2">Target</label>
                                         
                                             <select class="form-control select2" id="settarget" name="settarget"  data-validation="required" data-validation-error-msg="Please  Select Target Wise">
                                                    <option value="">Please Select Target Wise</option>
                                                    <option value="12"<?php if($companies->company_target_wise==12){ echo "Selected";}?>>Yearly Once</option>
                                                    <option value="6"<?php if($companies->company_target_wise==6){ echo "Selected";}?> >6 Month Once </option>
                                                    <option value="4"<?php if($companies->company_target_wise==4){ echo "Selected";}?>>4 Month Once</option>
                                                    <option value="3"<?php if($companies->company_target_wise==3){ echo "Selected";}?>>3 Month Once</option>
                                                    <option value="2"<?php if($companies->company_target_wise==2){ echo "Selected";}?>>2 Month Once</option>
                                                    <option value="1"<?php if($companies->company_target_wise==1){ echo "Selected";}?>>1 Month Once</option>
                                                </select>    
                                           
                                        </div>
                                       
                                
                                </div>
                                         <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Sales Email Id</label>

                                                <input type="text" class="form-control" value="<?php echo $companies->company_contact_email_id;?>" id="emp_addr1" name="email_id" placeholder="Email ID" data-validation="email" data-validation-error-msg="Please enter Valid Email id">

                                            </div> </div>
                                        <div class="row">
                                        	<div class="form-group col-md-4">
                            <label class="control-label mb-10" for="exampleInputuname_2">Current Password</label>
                               <div class="input-group">
								<input type="password" class="form-control" onfocusout="my_current_pass()" id="role_current_pass"  name="role_current_pass" placeholder="Enter Current password" data-validation="required" data-validation-error-msg="Please enter Current password">
                               <div class="input-group-addon"><i class="icon-user"></i></div>
							</div>
						</div>	</div>	
                                <div class="row">

                                    <div class="form-group mb-0 col-md-12">

                                        <button type="submit" class="btn btn-success btn-anim pull-right"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                    </div> 
                                </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
       
 <script>
  function my_current_pass(){
		var session_pass = '<?php echo $_SESSION['userdata']['email']; ?>';
		var login_pass = $('#role_current_pass').val();
		//alert(login_pass);
	   if(session_pass==login_pass){
			
	   }
	   else{
		   $('#role_current_pass').val('');
	   }
  }

    <?php if (isset($_COOKIE['update'])) { ?>
                                         var success =<?php echo $_COOKIE['update']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Settings', text: 'Settings Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Settings', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } 
                                         });
    <?php } ?>  </script>