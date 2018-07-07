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
                    <h5 class="txt-dark">User </h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li class="active"><span>User Reports</span></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <!-- /Title -->
            <!-- Row -->
            <div class="row">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="<?php echo base_url(); ?>Reports/Search1" method="post">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Select User</label>
                                        <select class="form-control" name="employee" id="employees" data-validation="required" data-validation-error-msg="Please Select status">
                                            <option value="">Select Employee</option>
                                            <?php foreach ($get_datas as $getdata) { ?>
                                                <option value="<?php echo $getdata->employee_id; ?>"><?php echo $getdata->employee_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0 col-md-4" style="margin-top:30px">
                                        <button type="submit" class="btn btn-success btn-anim" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Date </th>
                                <th>From</th>
                                <th>To</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $total=0;
                            foreach ($fetch_users as $fetch_user) {
                                $id = $fetch_user->employee_id;
                                $query = $this->db->query("select * from tbl_employee where `employee_id`='$id'");
                                $result = $query->row();
                                ?>
                            <td><?php echo $sno++; ?></td>
                            <td><?php echo $result->employee_name; ?></td>
                            <td><?php
                            $dates = $fetch_user->date;
                            echo date('d-m-Y', strtotime($dates));
                            ?></td>
                            <td><?php echo $fetch_user->kilometer_in ?></td>
                            <td><?php echo $fetch_user->kilometer_out ?></td>
                            <td><?php
                            $total+=$fetch_user->kilometer_out-$fetch_user->kilometer_in;
                            echo $fetch_user->kilometer_out-$fetch_user->kilometer_in ?></td>
                            </tr>
<?php } ?>
                        </tbody>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Distance</th>
                            <th><?php echo $total ?> KM</th>
                        </tfoot>
                    </table>
                </div>
                <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>
                <script type="text/javascript" src="<?php echo base_url('app-assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>
                <!-- Bootstrap Daterangepicker JavaScript -->
                <script src="<?php echo base_url('app-assets/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
                <script src="<?php echo base_url('app-assets/dist/js/form-picker-data.js'); ?>"></script>
                <script>
                    //   $("#responsive").datatable();
                    $('.input-daterange-datepicker').daterangepicker({
                        buttonClasses: ['btn', 'btn-sm'],
                        applyClass: 'btn-info',
                        cancelClass: 'btn-default'
                    });
                    $("#company").select2({
                        placeholder: "Select a company",
                    });
                    $("#company").change(function () {
                        $(this).valid()
                    });
                    $("#employee").select2({
                        placeholder: "Select a employee",
                    });
                    $("#employee").change(function () {
                        $(this).valid()
                    });
                    function employee_reports() {
                        var company = $("#company").val();
                        var employee = $("#employee").val();
                        var range = $("#range").val();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url(); ?>Reports/export_employee_reports',
                            data: {
                                company: company,
                                employee: employee,
                                range: range
                            },
                            success: function (data) {
                                $("#export").html(data);
                            },
                        });
                    }
                </script>