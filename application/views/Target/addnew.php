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
                    <h5 class="txt-dark"><?php echo $title; ?></h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Target/">Target List</a></li>
                        <li class="active"><span><?php echo $title; ?></span></li>
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
                                    
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Target/save" method="POST" enctype="multipart/form-data">
                                        <?php 
                                            if(!empty($edit_task)){$task = $edit_task[0];}
                                            if(!empty($task) && $task->target_id != ''){
                                        ?>
                                            <input type="hidden" name="tbl_target[target_id]" id="target_id" value="<?php echo $task->target_id; ?>"/>
                                        <?php } ?>
                                        <div class="row">
                                          <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left"> Choose Input type</label>
                                                    <div class="input-group">
                                                    <select name="tbl_target[target_type]" class="form-control" id="inputType" onchange="return selectType(this.value)">
                                                        <option value="1">Daywise Target</option>
                                                        <option value="2">Month wise Target</option>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-list"></i></div>
                                                </div>
                                                   

                                                </div></div>
                                            <span id="datepc">
                                              <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">From Date</label>
                                                <div class="input-group">
                                                    <input type="text" name="tbl_targets[from_date]" id="fromDate" class="form-control  input-daterange-datepicker"/>
                                                    <div class="input-group-addon"><i class="icon-calender"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">To Date</label>
                                                <div class="input-group">
                                                    <input type="text" name="tbl_targets[to_date]" id="toDate" class="form-control  input-daterange-datepicker"/>
                                                    <div class="input-group-addon"><i class="icon-calender"></i></div>
                                                </div>
                                            </div>
                                        </span>
                                            <div class="form-group col-md-3" id="monthpc" style="display: none">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Month</label>
                                                <div class="input-group">
                                                    <select name="tbl_target[month]" class="form-control" id="inputType" onchange="return selectType(this.value)">
                                                        <option value="1">JAN</option>
                                                        <option value="2">FEB</option>
                                                        <option value="3">MAR</option>
                                                        <option value="4">APR</option>
                                                        <option value="5">MAY</option>
                                                        <option value="6">JUN</option>
                                                        <option value="7">JUL</option>
                                                        <option value="8">AUG</option>
                                                        <option value="9">SEP</option>
                                                        <option value="10">OCT</option>
                                                        <option value="11">NOV</option>
                                                        <option value="12">DEC</option>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-calender"></i></div>
                                                </div>
                                            </div>  
												
                                                    
                                         <div class="form-group col-md-3">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Sales Person Assigned to</label>
                                                    <div class="input-group">	
                                                        <select  class="form-control" id="created_by"  multiple name="tbl_targets[salesPersonid][]" class="form-control" id="salesPersonid" data-validation="required" data-validation-error-msg="Please Select Assigned to">
                                                            <option value="">Please Select Assigned to</option>
                                                            <?php  foreach ($employee as $emp_data) { ?>
                                                                <option value="<?php echo $emp_data->employee_id; ?>"><?php echo $emp_data->employee_name; ?>(<?php echo $emp_data->employee_email; ?>)</option>
                                                            <?php } ?>
                                                        </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label class="control-label mb-10" for="exampleInputuname_2">Target Amount</label>
                                            <div class="input-group">
                                                <input type="text" name="tbl_target[target_amount]" id="targetAmount" class="form-control"/>
                                                <div class="input-group-addon"><i class="icon-target"></i></div>
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
        function selectType(str){
            if(str == 1){
                $("#datepc").show();
                $("#monthpc").hide();
            }else if(str == 2){
                $("#datepc").hide();
                $("#monthpc").show();
            }
        }
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