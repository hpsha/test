<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->				   
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">List Terms</h5>
            </div>
            <!-- Breadcrumb -->					      
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Terms</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->		   
        </div>
        <!-- /Title -->								<!-- Row -->				   
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
                                                <th>Terms</th>
                                              
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Terms</th>
                                               
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($companies as $company) { ?>                              
                                                <tr>
                                                    <td><?php echo $company->company_name; ?></td>
                                                    <td><?php echo $company->term_condition_data; ?></td>
                                                 
                                                    <td class="text-nowrap">              
                                                        <button onclick="window.location.href = '<?php echo base_url(); ?>Terms/editterms/<?php echo $company->term_condition_rand ?>'"                                                                class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>  
                                                        <button data-toggle="tooltip" data-original-title="Activate" class="btn btn-success btn-icon-anim btn-circle" onclick="activateterms('<?php echo $company->term_condition_rand ?>')"> <i class="fa fa-check "></i> </button> 		
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
    <?php if (isset($_COOKIE['success_terms'])) { ?>
                                         var success =<?php echo $_COOKIE['success_terms']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Terms List', text: 'Terms Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Terms List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Terms List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
         <?php if (isset($_COOKIE['update_terms'])) { ?>
                                         var success =<?php echo $_COOKIE['update_terms']; ?>;
                                         $(window).load(function () {
                                             if (success == 1) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Terms List', text: 'Terms Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                                                 });
                                             } else if (success == 2) {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Terms List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                                                 });
                                             } else {
                                                 window.setTimeout(function () {
                                                     $.toast({heading: 'Terms List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                                                 });
                                             }
                                         });
    <?php } ?>
    </script>
    <script>
    function deleteterms(key) {
       swal({
           title: "Are you sure?",
           text: "Are you sure to confirm to inactive terms",
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
               url: '<?php echo base_url(); ?>Terms/delete_terms',
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
 <script>
    function activateterms(key) {
       swal({
           title: "Are you sure?",
           text: "Are you sure to confirm to activate terms",
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
               url: '<?php echo base_url(); ?>Terms/activate_terms',
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