<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">List Distributor Order</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Distributor Orders</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <?php //print_r($shop); ?>
        <!-- /Title -->								<!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form action="<?php echo base_url(); ?>Orders/distributorSearch" method="post">
                                    <div class="row">

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

                                        <div class="col-md-3">
                                            <?php
                                            $mss = $this->db->query("select sum(price) as t from tbl_order where  date(`created_on`) between '2018-04-01' and '$to' and shop_type=3")->row();
                                             $this->db->last_query();
                                            ?>
                                            <label class="control-label mb-10 text-left">Total Order value</label>
                                            <br>
                                            <strong>RS.<?php echo round($mss->t, 2); ?></strong>

                                            <?php
                                            $date = date("Y-m-d");
                                            $mss = $this->db->query("select sum(price) as t from tbl_order where date(`created_on`)='$date' and shop_type=3")->row();
                                            $this->db->last_query();
                                            ?>
                                            <br>
                                            <label class="control-label mb-10 text-left">Today Order value</label>
                                            <br>
                                            <strong>RS.<?php echo round($mss->t, 2); ?></strong>

                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th> Order No</th>
                                                <th> Agent</th>
                                                <th> Name</th>
                                                <th> Owner Name</th>
                                                <th> contact</th>
                                                <th> Location</th>
                                                <th> Remarks</th>
                                                <th>Order Value</th>
                                                 <th>Order Date</th>
                                                <th>Employee</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($shop as $da){?>
                                            <tr>
                                                <td> <?php   $aus=$da->agency_id;$aa = $this->db->query("select agencies_name from tbl_agencies where agencies_id=$aus")->row();
 echo $aa->agencies_name;?></td>
                                                 <td> <?php echo $da->order_no; ?></td>
                                                <td> <?php echo $da->shop_name ?></td>
                                               <td> <?php echo $da->shop_owner_name ?></td>
                                                <td> <?php echo $da->shop_contact ?></td>
                                               <td> <?php echo $da->shop_landline ?></td>
                                               <td> <?php echo $da->remarks ?></td>
                                               <td> <?php echo round($da->t,2); ?></td>
                                                <td> <?php echo $da->created_on ?></td>
                                                      <?php         $iss = $da->emp_id;
                $mm = $this->db->query("select employee_email from tbl_employee where employee_id=$iss")->row();
                $mails = $mm->employee_email;
                ?>
                                               
                                                <td> <?php echo  $mails; ?></td>
                                                                                                
                  <td> <?php 
                                  $edits = "window.location.href='";
                $edits .= base_url() . "Orders/order_view/$da->order_id'";

                $pdfs = "window.location.href='";
                  $pdfs .= base_url() . "Orders/order_view_pdf/$da->order_id'";


                $datas = '<button onclick="' . $edits . '" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye"></i> </button>
                                                        <button  onclick="' . $pdfs . '" class="btn btn-primary btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Download"> <i class="fa fa-download"></i> </button>';
         echo $datas;   ?>  </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th> Agent</th>
                                                <th> Name</th>
                                                <th> Owner Name</th>
                                                <th> contact</th>
                                                <th> Location</th>
                                                <th> Remarks</th>
                                                <th>Order Value</th>
                                                 <th>Order Date</th>

                                                <th>Employee</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <script>
<?php if (isset($_COOKIE['success_terms'])) { ?>
            var success =<?php echo $_COOKIE['success_terms']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Shop List', text: 'Shop List Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Shop List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Shop List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>

        function delete_shop(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to delete this Shop Details!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: "Yes, Do it!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm)
                    return;
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Shop_list/delete_shops',
                    data: {
                        id: key,
                    },
                    success: function (data) {
                        if (data == 1) {
                            swal({title: 'Done!',
                                text: 'It was succesfully Deleted!!',
                                type: 'success'}, function () {
                                window.location.reload();
                            });
                        } else {
                            swal("Error!", "Error Occured", "error");
                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("cancel!", "It was Cancelled", "error");
                    }
                });
            });
        }
    </script>
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
       
function orders(id,date){
       $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>Orders/order_view_pdf',
                    data: {
                        shop_id: id,
                        date:date,
                    },
                    success: function (data) {
                       
                    }
});
}
    </script>
