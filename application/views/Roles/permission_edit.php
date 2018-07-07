<body>
  <div class="right-sidebar-backdrop"></div>
  <!-- /Right Sidebar Backdrop -->  <!-- Main Content -->  
  <div class="page-wrapper" style="min-height: 460px;">
    <div class="container-fluid">
      <!-- Title -->      
      <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">User Permission</h5>
        </div>
        <!-- Breadcrumb -->        
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>Roles">List Roles</a></li>
            <li class="active"><span>Add Roles</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->      
      </div>
      <!-- /Title -->      <!-- Row -->      
      <div class="row">
        <div class="col-md-12">
          <div class="panel card-view">
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="form-wrap">
                  <form data-toggle="validator" role="form" action="<?php echo base_url(); ?>Roles/edit_roles" method="POST">
                    <div class="row">
					<?php 
						//print_r($roles_data);
						foreach($roles_data as $data){
					?>
						<div class="form-group col-md-4">
                            <label class="control-label mb-10" for="exampleInputuname_2">Company Name</label>
                               <div class="input-group">
                                <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter role" data-validation="required" data-validation-error-msg="Please Enter role Name" value="<?php echo $data->admin_role_name; ?>"> 
                               <div class="input-group-addon"><i class="icon-user"></i></div>
							</div>
						</div>
						<input type="hidden" name="role_id" id="role_id" value="<?php echo $data->admin_role_id; ?>">
						<input type="hidden" value="">
						
						<div class="form-group col-md-4">
                            <div class="form-group">
                                <label class="control-label mb-10">Roles</label>
                                <select class="form-control select2" id="roles_category" name="roles_cat[]" multiple data-validation="required" data-validation-error-msg="Please Select Roles">
								  
										<?php 
											 $str = $data->admin_role_permission; 
											 $arry_val = explode(",",$str); 
										?>
											<option value="1" <?php foreach($arry_val as $item){ if($item==1){echo "selected";} } ?>>Company</option>
											<option value="2" <?php foreach($arry_val as $item){ if($item==2){echo "selected";} } ?>>Customer</option>
											<option value="3" <?php foreach($arry_val as $item){ if($item==3){echo "selected";} } ?>>Quotation</option>
											<option value="4" <?php foreach($arry_val as $item){ if($item==4){echo "selected";} } ?>>Employee</option>
											<option value="5" <?php foreach($arry_val as $item){ if($item==5){echo "selected";} } ?>>Product</option>
											<option value="6" <?php foreach($arry_val as $item){ if($item==6){echo "selected";} } ?>>DA</option>
											<option value="7" <?php foreach($arry_val as $item){ if($item==7){echo "selected";} } ?>>Agent</option>
											<option value="8" <?php foreach($arry_val as $item){ if($item==8){echo "selected";} } ?>>Enquiry</option>
                                </select>
                            </div>
						</div>
						<div class="form-group col-md-4">
                            <label class="control-label mb-10" for="exampleInputuname_2">Current Password</label>
                               <div class="input-group">
								<input type="password" class="form-control" onfocusout="my_current_pass()" id="role_current_pass"  name="role_current_pass" placeholder="Enter Current password" data-validation="required" data-validation-error-msg="Please enter Current password">
                               <div class="input-group-addon"><i class="icon-user"></i></div>
							</div>
						</div>	
					<?php } ?>						
				   </div>
                </div>
                <div class="row">              
                <div class="form-group mb-0 col-md-12">   
                <button type="submit"  class="btn btn-success btn-anim pull-right">
					<i class="fa fa-cloud-upload"> Submit</i>
					<span class="btn-text">Submit</span>
				</button>              
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
	  //alert();
		var session_pass = '<?php echo $_SESSION['userdata']['email']; ?>';
		var login_pass = $('#role_current_pass').val();
		//alert(login_pass);
	   if(session_pass==login_pass){
			
	   }
	   else{
		   $('#role_current_pass').val('');
	   }
  }
  </script>