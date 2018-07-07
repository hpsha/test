<?php //print_r($_SESSION['userdata']['email']);exit();       ?>

<body>

    <div class="right-sidebar-backdrop"></div>

    <!-- /Right Sidebar Backdrop -->

    <!-- Main Content -->

    <div class="page-wrapper">

        <div class="container-fluid">

            <!-- Title -->

            <div class="row heading-bg">

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

                    <h5 class="txt-dark">User Reports </h5>

                </div>

                <!-- Breadcrumb -->

                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">

                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>



                        <li class="active"><span> Reports</span></li>

                    </ol>

                </div>

                <!-- /Breadcrumb -->

            </div>

            <!-- /Title -->
            <?php // print_r($get_datas); ?>
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Select User</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-wrap">
                                    <form action="<?php echo base_url(); ?>Reports/Search" method="post">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Select User</label>
                                                <div class="input-group">
                                                    <select class="form-control required select2" id="employees" name="employee" data-validation="required" data-validation-error-msg="Please Select User">
                                                        <option>Select Employee</option>
                                                        <option value="0">All</option>
                                                        <?php foreach ($get_datas as $getdata) { ?>
                                                        <option value="<?php echo $getdata->employee_id; ?>"><?php echo $getdata->employee_email; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left">Select From Date</label>

                                                    <input type="text" class="form-control input-daterange-datepicker" placeholder="mm/dd/yyyy" name="from">

                                                </div></div>
                                            <div class="col-md-3">
                                                <div class="example">
                                                    <label class="control-label mb-10 text-left">Select To Date</label>

                                                    <input type="text" class="form-control input-daterange-datepicker" placeholder="mm/dd/yyyy" name="to">

                                                </div>
                                            </div>    
                                               <div class="col-md-3">
                                                <div class="example">
                                                    <button type="submit" class="btn btn-success btn-anim" id="but" style="margin-top: 30px;"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                                </div>
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
        <script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>

        <script>
            $("#employees").select2({
        placeholder: "Select a User",
        allowClear: true});
    
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
        </script>
