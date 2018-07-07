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
                    <li class="active"><span><?php echo $title; ?></span></li>
                </ol>
                
            </div>
            <!-- /Breadcrumb -->
        </div>
        <?php $count = count($salesreturn); ?>
        <!-- /Title -->											
        <!-- Row -->
        <?php // print_r($salesreturn); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Salesreturn/report" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10" for="exampleInputuname_2">From Date</label>
                                    <div class="input-group">
                                        <input type="text" name="from_date" id="fromDate" class="form-control  input-daterange-datepicker" data-validation="required" data-validation-error-msg="Please Select From Date"/>
                                        <div class="input-group-addon"><i class="icon-calender"></i></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label mb-10" for="exampleInputuname_2">To Date</label>
                                    <div class="input-group">
                                        <input type="text" name="to_date" id="toDate" class="form-control  input-daterange-datepicker" data-validation="required" data-validation-error-msg="Please Select To Date"/>
                                        <div class="input-group-addon"><i class="icon-calender"></i></div>
                                    </div>
                                </div>
                                 <div class="form-group col-md-3">
                                    
                                     <div class="input-group" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-success btn-anim pull-right" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Filter</span></button>
                                    </div>
                                </div>
                            </div></form>
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <input type="button" name="Add New" id="Add New" class="btn btn-success btn-anim pull-right" value="Add New" onclick="window.location.href='<?php echo base_url().'Salesreturn/addnew' ?>'"/>
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Shop Name</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>S.No</th>
                                                <th>Shop Name</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Created By</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>	
                                           <?php if($count != 0) {?>
                                            <?php 
                                           
                                            $i=1;
                                            foreach ($salesreturn as $data) {
												 $name = userData($data->created_userid);
                                                $shop = getShopname($data->shop_id);
                                                $proname = getProname($data->product_id);
                                                if($data->created_usertype == 1){
                                                    $role = "Admin";
                                                }else if($data->created_usertype == 2){
                                                    $role = "ROTN";
                                                }if($data->created_usertype == 3){
                                                    $role = "ASM/ASO";
                                                }if($data->created_usertype == 4){
                                                    $role = "Distributor";
                                                }if($data->created_usertype == 5){
                                                    $role = "Sales Person";
                                                }
                                                
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $shop[0]->shop_name.' ('.$shop[0]->shop_landline.')'; ?></td>
                                                    <td><?php echo $proname[0]->product_name; ?></td>
                                                    <td><?php echo $data->qty; ?></td>
                                                    
                                                    <td><?php echo $name[0]->admin_username; ?></td>
                                                    <td><?php echo $data->created_date; ?></td>
                                                    <td class="text-nowrap">
                                                        <button data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-icon-anim btn-circle" onclick="deleteSale('<?php echo $data->salesreturn_id ?>')"> <i class="fa fa-trash"></i> </button>
                                                        <?php if($data->approval_status==0){ ?>
                                                        <button data-toggle="tooltip" data-original-title="Approved" class="btn btn-info btn-icon-anim btn-circle" onclick="approved('<?php echo $data->salesreturn_id ?>')"> <i class="fa fa-thumbs-o-up"></i> </button>
                                                        <?php } else{ ?>
                                                        <button data-toggle="tooltip" data-original-title="Already Approved" class="btn btn-success btn-icon-anim btn-circle"> <i class="fa fa-check"></i> </button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                           <?php } else{ ?>
                                                <tr>
                                                    <td colspan="7"> No Records Found</td>
                                                </tr>
                                           <?php } ?>     
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
<?php if (isset($_COOKIE['success'])) { ?>
            var success =<?php echo $_COOKIE['success']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Task List', text: 'Task Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Task List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Task List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
<?php if (isset($_COOKIE['update'])) { ?>
            var success =<?php echo $_COOKIE['update']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Task List', text: 'Task Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Task List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Task List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
        function deleteSale(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to delete this Schedule!",
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
                    url: '<?php echo base_url(); ?>Salesreturn/delete',
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
        function approved(key) {
//            alert(key);
            swal({
                title: "Are you sure?",
                text: "You won't be able to delete this Schedule!",
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
                    url: '<?php echo base_url(); ?>Salesreturn/approved',
                    data: {
                        id: key,
                    },
                    success: function (data) {
//                        alert(data);
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
</script>