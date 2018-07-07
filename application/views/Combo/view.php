<br><br>
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
        <!-- /Title -->											
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <input type="button" name="Add New" id="Add New" class="btn btn-success btn-anim pull-right" value="Add New" onclick="window.location.href='<?php echo base_url().'combo/addnew' ?>'"/>
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Offer Name</th>
                                                <th>Scheme Code</th>
                                                <th>Date Period</th>
                                                <th>Category Name</th>
                                                <th>No.Of Product</th>
                                                <th>Amount</th>
                                                <th align="center">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                              <tr>
                                                <th>S.No</th>
                                                <th>Offer Name</th>
                                                <th>Scheme Code</th>
                                                <th>Date Period</th>
                                                <th>Category Name</th>
                                                <th>No.Of Product</th>
                                                <th>Amount</th>
                                                <th align="center">Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                            $k=1;
                                            foreach ($combo as $data) {
                                               
                                                $category = getcategoryname($data->category_id);
                                                $prodId = explode(",", $data->product_id);
                                                $count = count($prodId);
                                                $product = "";
                                                for($i=0; $i<$count; $i++){
                                                    $proname = getProname($prodId[$i]);
                                                    $productval = $proname[0]->product_name;
                                                    $product .= $productval.',<br>';
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $k++; ?></td>
                                                    <td><?php echo $data->offer_name; ?></td>
                                                    <td><?php echo $data->scheme_code; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($data->from_date)).' - '.date('d-m-Y',strtotime($data->to_date)); ?></td>
                                                    <td><?php echo $category[0]->productgroup_name; ?></td>
                                                    <td><?php echo $product; ?></td>
                                                    <td><?php echo number_format($data->amount,2); ?></td>
                                                    <td>
                                                        <?php if($data->approval_status == 1) { ?>
                                                            <button type="button" class="btn btn-success btn-anim pull-right" style="margin-left: 40px;" onclick="approveCombo('<?php echo $data->combo_id ?>', 0)"><i class="fa fa-cloud-upload"> Approved </i> <span class="btn-text">Approved</span></button>
                                                        <?php }else { ?>
                                                            <button type="button" class="btn btn-danger btn-anim pull-right" style="margin-left: 40px;" onclick="approveCombo('<?php echo $data->combo_id ?>', 1)"><i class="fa fa-cloud-upload"> Processing </i> <span class="btn-text">Processing</span></button>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <button data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-icon-anim btn-circle" onclick="deleteCombo('<?php echo $data->combo_id ?>')"> <i class="fa fa-trash"></i> </button>
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
        function deleteCombo(key) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to delete this Combo Offer!",
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
                    url: '<?php echo base_url(); ?>Combo/delete',
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
        function approveCombo(key, status) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to change the Status!",
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
                    url: '<?php echo base_url(); ?>Combo/changeStatus',
                    data: {
                        id: key,
                        statusval : status
                    },
                    success: function (data) {
                        
                        if (data == 1) {
                            swal({title: 'Done!',
                                text: 'It was succesfully Changed!!',
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