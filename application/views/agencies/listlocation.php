<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">LIST LOCATION</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>LIST LOCATION</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        <div class="row heading-bg">				
            <div class="col-sm-12">
            </div>            </div>	
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                              
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                              
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                          
 <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            
                                            foreach ($employee as $data) {
                                              
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->location_name; ?></td>
                                                   <?php 
                                                  $lid=$data->location_id;
                                                 ?>

                                                   <td><button onclick="window.location.href = '<?php echo base_url(); ?>Agencies/edit_location/<?php echo $lid; ?>'" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-pencil"></i> </button>

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
                        $.toast({heading: 'Location List', text: 'Location Group Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Location List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Location List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
<?php if (isset($_COOKIE['update'])) { ?>
            var success =<?php echo $_COOKIE['update']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Location  List', text: 'Location Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Location  List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Employee Group List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
        function deleteemployee(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
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
                    url: '<?php echo base_url(); ?>Employee/delete_employee',
                    data: {
                        id: key,
						value:0,
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
     function active(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
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
                    url: '<?php echo base_url(); ?>Employee/delete_employee',
                    data: {
                        id: key,
						value:1,
                    },
                    success: function (data) {
                        if (data == 1) {
                            swal({title: 'Done!',
                                text: 'It was succesfully Activated!',
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