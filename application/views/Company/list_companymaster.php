<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->				   
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">List Company</h5>
            </div>
            <!-- Breadcrumb -->					      
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Company</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->		   
        </div>
        <!-- /Title -->	
		
			<div class="row heading-bg">
				<div class="col-sm-12">
					<div class="pull-right btn btn-success" onclick="window.location.href='<?php echo base_url();?>/Company/export'">Export Company</div>
				</div>
            </div>		
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
                                                <th>Company Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>GST</th>
                                                <th>PAN No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>GST</th>
                                                <th>PAN No</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($companies as $company) { ?>                              
                                                <tr>
                                                    <td><?php echo $company->company_name; ?></td>
                                                    <td><?php echo $company->company_phone; ?></td>
                                                    <td><?php echo $company->company_mail; ?></td>
                                                    <td><?php echo $company->company_gst; ?></td>
                                                    <td><?php echo $company->company_pan_no; ?></td>
                                                    <td class="text-nowrap">              
                                                        <button onclick="window.location.href = '<?php echo base_url(); ?>Company/editcompany/<?php echo $company->company_rand ?>'"                                                                class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>  
                                                                <button data-toggle="tooltip" data-original-title="Deactivate" class="btn btn-danger btn-icon-anim btn-circle" onclick="deletecompany('<?php echo $company->company_rand ?>')"> <i class="fa fa-ban "></i> </button> 		
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
                                                     $.toast({heading: 'Company List', text: 'Customer Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Company List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Company List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
         <?php if (isset($_COOKIE['update'])) { ?>
                                         var success =<?php echo $_COOKIE['update']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Company List', text: 'Company Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Company List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Company List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
    </script>
    <script>
    function deletecompany(key) {
       swal({
           title: "Are you sure?",
           text: "Are you sure to confirm to inactive customer",
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
               url: '<?php echo base_url(); ?>Company/delete_company',
               data: {
                   id: key,
               },
               success: function (data) {
                   if (data == 1) {
                       swal({title: 'Done!',
                        text: 'It was succesfully Inactivated!!',
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