<?php //print_r($_SESSION['userdata']['email']);exit();      ?>

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

            <!-- Row -->
            <?php // print_r($fetch_users); ?>

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
                        
                        <div class="row">

                                    <table id="example" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                                  <th>Agencies Name</th>
                                        <th>Shop Name</th>
                                       

                                        <th>Date </th>
                                        <th>Time</th>

                                        <th>Location</th>
 <th>Contact No</th>
  <th>Order Value</th>



                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sno = 1;
                                    foreach ($fetch_users as $fetch_user) {

                                        $id = $fetch_user->emp_id;
                                          $ids = $fetch_user->agency_id;
                                        $query = $this->db->query("select * from tbl_employee where `employee_id`='$id'");

                                        $result = $query->row();
                                        
                                          $querym = $this->db->query("select * from tbl_agencies where `agencies_id`='$ids'");

                                        $resultm = $querym->row();
                                        ?>
                                    <td><?php echo $sno++; ?></td>
                                    <td><?php echo $result->employee_name; ?>(<?php echo $result->employee_email; ?>)</td>
                                    <td><?php  echo $resultm->agencies_name;?></td>
                                    <td><?php echo $fetch_user->shop_name; ?></td>
                                    <td><?php
                                        $dates = $fetch_user->shop_created_on;
                                        echo date('d-m-Y', strtotime($dates));
                                        ?></td>
                                    <td><?php
                                        $dates = $fetch_user->shop_created_on;
                                        echo date('h:i:s a ', strtotime($dates));
                                        ?></td>
                                    <?php
                                    ?>
                                    <td><?php
                                echo $fetch_user->address;
                                    ?></td>
                                      <td><?php
                                echo $fetch_user->shop_contact;
                                    ?></td>
                                      <td><?php
                                echo $fetch_user->shop_location;
                                    ?></td>






                                    </tr>
<?php } ?>           

                                </tbody>
                            </table> 




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
