<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">LIST Product </h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Product </span></li>
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
                                    <table id="" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product Group</th>
                                                <th>Product</th>
                                                <th>Distributor Price</th>
                                                <th>Retail Price</th>
                                                 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                 <th>S.No</th>
                                             <th>Product Group</th>
                                             <th>Product</th>
                                           <th>Distributor Price</th>
                                                <th>Retail Price</th>
                                            <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $j=1;foreach($list as $data){ ?>
                                            <tr>
                                                 <td><?php echo $j++;?></td>
                                            <td><?php echo $data->productgroup_name ?></td>
                                            <td><?php echo $data->product_name ?></td>
                                            <td><?php $i=1;$dd=$this->db->query("select branch_id,branch_name from tbl_branch where branch_act=1")->result();
                                            foreach($dd as $branch){
                                               $bid=$branch->branch_id;
                                               echo $i++;echo ".";
                                               echo $branch->branch_name.'<br>';
                                               $wholesale_count=$this->db->query("select distributor_price from tbl_price where branch_id=$bid and act=1 and product_id=$data->product_id")->num_rows();
if($wholesale_count>0){
	
                                               $wholesale=$this->db->query("select product_id, distributor_price, price_updatedate, price_updateuserId from tbl_price where branch_id=$bid and act=1 and product_id=$data->product_id")->row();
											   $users = userData($wholesale->price_updateuserId);
											   $date = date('d-m-Y H:i:s',strtotime($wholesale->price_updatedate));
                                               echo "<span style='color: red; font-weight:600'>Price : Rs."; echo $wholesale->distributor_price." <br> Last Updated : ".$users[0]->admin_username." <br>  Updated DateTime :".$date.'</span>';
}
                                               echo "<br>";
                                            }
                                             ?></td>
                                           <td><?php $i=1; $dd=$this->db->query("select branch_id,branch_name from tbl_branch where branch_act=1")->result();
                                            foreach($dd as $branch){
                                               $bid=$branch->branch_id;
                                                echo $i++;echo ".";
                                               echo $branch->branch_name.'<br>';  
                                                 $wholesale_count=$this->db->query("select retail_price from tbl_price where branch_id=$bid and act=1 and product_id=$data->product_id")->num_rows();
if($wholesale_count>0){
											
                                               $wholesale=$this->db->query("select product_id, retail_price, price_updatedate, price_updateuserId from tbl_price where branch_id=$bid and act=1 and product_id=$data->product_id")->row();
											  $users = userData($wholesale->price_updateuserId);
											   $date = date('d-m-Y H:i:s',strtotime($wholesale->price_updatedate));
                                               echo "<span style='color: red; font-weight: 600'>Price : Rs.".$wholesale->retail_price." <br> Last Updated : ".$users[0]->admin_username." <br> Updated DateTime : ".$date.'</span>';
}
                                                echo "<br>";
                                            }
                                             ?></td>
                                            <td class="text-nowrap">
                                                        <button onclick="window.location.href = '<?php echo base_url(); ?>Products/edit_product/<?php echo $data->product_id ?>'"                                                                class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>
                                                                <button data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-icon-anim btn-circle" onclick="deletecompany('<?php echo $data->product_id ?>')"> <i class="fa fa-trash"></i> </button>
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
                        $.toast({heading: 'Product List', text: 'Product Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                }  else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Product List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
                else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Product List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
<?php if (isset($_COOKIE['update'])) { ?>
            var success =<?php echo $_COOKIE['update']; ?>;
            $(window).load(function () {
                if (success == 1) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Product List', text: 'Product Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                }
                 else if (success == 2){
                    window.setTimeout(function () {
                        $.toast({heading: 'Product List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
                 else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Product List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>
        function deletecompany(key) {
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
                    url: '<?php echo base_url(); ?>Products/delete_product',
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