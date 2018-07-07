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
                    <h5 class="txt-dark">Branch Edit</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Branch/listbranch">Branch List</a></li>
                        <li class="active"><span>Branch Edit</span></li>
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
                                   <?php 

                                      $employee=$this->db->query("select * from tbl_branch where branch_id=$lid")->row();
                                   
                                    ?>
                                   
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Branch/updatebranchdetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                          <div class="col-md-3">
                                               
                                            
												
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Branch Name</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="<?php echo $employee->branch_name;?>"id="l_name" name="l_name" placeholder="Location Name" data-validation="required" data-validation-error-msg="Please Enter Location Name">
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                   

                                        </div>
                                     
                                        </div> 
									
										<span id="xx"></span>
									


                                        <div class="row">
                                            <div class="form-group mb-0 col-md-12">
                                                <input type="hidden" name="id" value="<?php echo $lid;?>">
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
             placeholder: "Employee assigned to",
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
        </script>