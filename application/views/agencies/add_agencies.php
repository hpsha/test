<?php //print_r($customergroup);exit();  ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Agencies Add</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Agencies/">Agencies List</a></li>
                        <li class="active"><span>Agencies Add</span></li>
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
                                    
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Agencies/adddetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                          <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Date</label>

                                                    <input type="text" class="form-control input-daterange-datepicker" placeholder="mm/dd/yyyy" name="from">

                                                </div></div>
                                              <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Branch Name</label>
                                                <div class="input-group">
                                                   <select class="form-control" id="names" name="names" onchange="getagencies()" data-validation="required" data-validation-error-msg="Please Select Agencies">
                                                            <option value="">Please Select Branch </option>
                                                            
                                                            <?php 
                                                            $where = "branch_act=1";
$branch= $this->db->select('*')->from('tbl_branch')->where($where)->get()->result();
        foreach ($branch as $emp_data) { 
                                                               ?>

                                                               <option value="<?php echo $emp_data->branch_id; ?>"><?php echo $emp_data->branch_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Agencies Name</label>
                                                <div class="input-group">
                                                   <select class="form-control" id="name" name="name"  data-validation="required"  onchange="getlocation()"data-validation-error-msg="Please Select Agencies">
                                                            <option value="">Please Select Agencies </option>
                                                          
                                                        </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                              
												
                                                         <div class="form-group col-md-3">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Locations </label>
													
											 <div class="input-group">	
												<select class="form-control" id="location"  name="Locations"  data-validation="required" data-validation-error-msg="Please Select Location to">
                                                            <option value="">Please Select Locations </option>
                                                            
                                                        </select>
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                               

                                        </div>
                                         <div class="form-group col-md-3">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Agencies Assigned to</label>
												  <div class="input-group">	
												<select class="form-control" id="created_by"  multiple name="created_by[]"  data-validation="required" data-validation-error-msg="Please Select Assigned to">
                                                            <option value="">Please Select Assigned to</option>
                                                            <?php  foreach ($employee as $emp_data) { ?>
                                                               < <option value="<?php echo $emp_data->employee_id; ?>" ><?php echo $emp_data->employee_name; ?>(<?php echo $emp_data->employee_email; ?>)</option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                        </div> 
									
										<span id="xx"></span>
									


                                        <div class="row">
                                            <div class="form-group mb-0 col-md-12">
                                                <button type="submit" class="btn btn-success btn-anim pull-right" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
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
           
<script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>

        <!-- Bootstrap Daterangepicker JavaScript -->
        <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>    <script>
    
     $('.input-daterange-datepicker').datetimepicker({
                format: 'DD-MM-YYYY',
                sideBySide: true,
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
            });
        //SCHEDULE page select2
        $("#created_by").select2({
             placeholder: "Agencies assigned to",
             allowClear: true});
               $("#names").select2({
             placeholder: "Branch name",
             allowClear: true});
              $("#name").select2({
             placeholder: "Agencies name",
             allowClear: true});
                 $("#location").select2({
             placeholder: "Locations name",
             allowClear: true});
           
             function getlocation(){
                
                 var id=$("#name").val();
                     $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Agencies/get_location',
                    data: {
                        id: id,
						
                    },
                    success: function (data) {
                          $("#location").html('');
                      $("#location").html(data);

                    }
                });
             }
             
               function getagencies(){
                
                 var id=$("#names").val();
                     $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Agencies/getagencies',
                    data: {
                        id: id,
						
                    },
                    success: function (data) {
                        
                          $("#name").html('');
                      $("#name").html(data);

                    }
                });
             }
        </script>