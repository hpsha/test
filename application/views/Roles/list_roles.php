<div class="page-wrapper">
<div class="container-fluid">
  <!-- Title -->				
  <div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h5 class="txt-dark">LIST ROLES</h5>
    </div>
    <!-- Breadcrumb -->					
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
        <li class="active"><span>List  Roles</span></li>
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
                      <th>Role Name</th>
                      <th>permissions</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Role Name</th>
                      <th>permissions</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php
				  $i=1;
				  foreach($roles_val as $data){ ?>  

                    <tr>
                      <td><?php  echo $i++; ?></td>
                      <td><?php echo $data->admin_role_name; ?></td>
                      <td>
					  <?php
						$permissions = $data->admin_role_permission;
						$splittedstring=explode(",",$permissions);
						foreach ($splittedstring as $key => $value) {
							if($value==1){
								echo "Company";echo "<br>";
							}
							if($value==2){
								echo "Customer";echo "<br>";
							}
							if($value==3){
								echo "Quotation";echo "<br>";
							}
							if($value==4){
								echo "Employee";echo "<br>";
							}
							if($value==5){
								echo "Product";echo "<br>";
							}
							if($value==6){
								echo "DA";echo "<br>";
							}
							if($value==7){
								echo "Agent";echo "<br>";
							}
							if($value==8){
								echo "Enquiry";echo "<br>";
							}
						}
					   ?></td>
                      <td class="text-nowrap">		
						<button onclick="window.location.href = '<?php echo base_url(); ?>Roles/edit_role/<?php echo $data->admin_role_rand; ?>'" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>
						<button data-toggle="tooltip" data-original-title="Deactivate" class="btn btn-danger btn-icon-anim btn-circle" onclick="deleterole('<?php echo $data->admin_role_rand ?>')"> <i class="fa fa-ban "></i> </button> 
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
<?php 
if (isset($_COOKIE['role_success'])) { ?>
        var role_success =<?php echo $_COOKIE['role_success']; ?>;
        $(window).load(function () {
         if (role_success == 1) {
            window.setTimeout(function () {
            $.toast({heading: 'Role List', text: 'Role Added Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
           });
        } else if (role_success == 2) {
            window.setTimeout(function () {
        $.toast({heading: 'Role List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
           });
        } else {
        window.setTimeout(function () {
        $.toast({heading: 'Role List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
        });
        }
    });
    <?php } ?>
<?php 
if (isset($_COOKIE['role_update_success'])) { ?>
        var edit_role_success =<?php echo $_COOKIE['role_update_success']; ?>;
        $(window).load(function () {
         if (edit_role_success == 1) {
            window.setTimeout(function () {
            $.toast({heading: 'Role List', text: 'Role update Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
           });
        } else if (edit_role_success == 2) {
            window.setTimeout(function () {
        $.toast({heading: 'Role List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
           });
        } else {
        window.setTimeout(function () {
        $.toast({heading: 'Role List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
        });
        }
    });
    <?php } ?>
	</script>
	    <script>
    function deleterole(key) {
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
               url: '<?php echo base_url(); ?>Roles/delete_role',
               data: {
                   id: key,
               },
               success: function (data) {
				  // alert(data);
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