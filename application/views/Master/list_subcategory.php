<?php //echo"<pre>"; print_r($contact);exit();?>
<div class="page-wrapper">
			<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">LIST Machinery Subcategory</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="active"><span>List Machinery Subcategory</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<div><a href="<?php echo base_url(); ?>Master/add_subcategory" class="btn btn-success pull-right">+ Add More</a></div>
				<br/><br/><br/>
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
														<th>Machinery Category</th>
                            <th>Machinery Subategory</th>
														<th>Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>S.No</th>
														<th>Machinery Category</th>
                            <th>Machinery Subategory</th>
														<th>Action</th>
													</tr>
												</tfoot>
												<tbody>
													<?php
													$i=1;
													foreach($subcategory as $data){ ?>
													<tr>
														<td><?php echo $i++ ?></td>
														<td><?php echo $data->machiney_category_name ?></td>
                            <td><?php echo $data->machinery_subcategory_name ?></td>
														<td class="text-nowrap">
														<button onclick="window.location.href = '<?php echo base_url(); ?>Master/edit_subcategory/<?php echo $data->machinery_subcategory_rand ?>'" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>
                                                        <button data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-icon-anim btn-circle" onclick="delete_subcategory('<?php echo $data->machinery_subcategory_rand ?>')"> <i class="fa fa-trash"></i> </button>
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
                                                     $.toast({heading: 'Machinery Subategory List', text: 'Machinery Subategory Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Machinery Subategory List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Machinery Subategory List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
         <?php if (isset($_COOKIE['update'])) { ?>
                                         var success =<?php echo $_COOKIE['update']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Machinery Subategory List', text: 'Machinery Subategory Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Machinery Subategory List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Machinery Subategory List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
    function delete_subcategory(key) {
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
               url: '<?php echo base_url(); ?>Master/delete_subcategory',
               data: {
                   id: key,
               },
               success: function (data) {
				   //alert(data);
                   if (data == 1) {
                       swal({title: 'Done!',
                        text: 'It was succesfully Deleted!!',
                        type: 'success'},function() {
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