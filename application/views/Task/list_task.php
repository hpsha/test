<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">LIST Task</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Task</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->											
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
                                                <th>S.No</th>
                                                <th>Task Title</th>
                                                <th>Task Assigned User</th>
                                                <th>Task date</th>
                                                <th>Status</th>
                                            
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>S.No</th>
                                                <th>Task Title</th>
                                                <th>Task Assigned User</th>
                                                <th>Task date</th> 
												<th>Status</th>
                                                                                            <th>Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                           // print_r($schedule);
                                            foreach ($schedule as $data) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $data->schedule_title ?></td>
                                                    <td><?php echo $data->employee_name ?> - <?php  echo $data->employee_email ?></td>
                                                    <td><?php 
                                                    $timestamp = $data->schedule_date;
                                                    echo date("d/M/y",strtotime($timestamp));
                                                    
                                                            ?></td>
                                                    <td><?php if($data->schedule_note!=""){ ?>   
  <button class="btn btn-success" style="border-radius:60px;" ><i class="fa fa-eye" ></i> Completed</button> </td>
  <?php } else { ?>  
  <button class="btn btn-danger" style="border-radius:60px;"> <i class="fa fa-eye" ></i> Not Completed</button> </td><?php }?>
                                                    <td class="text-nowrap">
                                                        <button onclick="window.location.href = '<?php echo base_url(); ?>Task/edit_task/<?php echo $data->schedule_id ?>'" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>
                                                        <button data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-icon-anim btn-circle" onclick="deleteschedule('<?php echo $data->schedule_id ?>')"> <i class="fa fa-trash"></i> </button>
                                                    </td>
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
        function deleteschedule(key) {
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
                    url: '<?php echo base_url(); ?>Task/delete_task',
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