
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">LIST Dropped ENQUIRY</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Dropped Enquiry</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view"  style="padding:0px">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover display  pb-30" >
                                        <thead>
                                            <tr>
                                                <th>Enquiry No</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Customer Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Enquiry No</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Customer Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php 
                                           // print_r($enquiry);
                                            foreach ($enquiry as $data) { ?>
                                                <tr>
                                                    <td><?php echo $data->enquiry_no; ?></td>
                                                    <td><?php echo $data->enquiry_cus_name; ?></td>
                                                    <td><?php echo $data->enquiry_cus_mobileno; ?></td>
                                                    <td><?php echo $data->enquiry_cus_email; ?></td>
                                                    <td class="text-nowrap">
                                                      <?php /*  <button onclick="window.location.href = '<?php echo base_url(); ?>Enquiry/edit_newenquiry/<?php echo $data->enquiry_no ?>'" class="btn btn-info btn-icon-anim btn-circle" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil"></i> </button>*/ ?>
                                                       <button data-toggle="tooltip" data-original-title="Delete" class="btn btn-danger btn-icon-anim btn-circle" onclick="deletedrop('<?php echo $data->enquiry_no ?>')"> <i class="fa fa-trash"></i> </button> 
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                   <!-- <button  class="btn btn-sm btn-warning btn-anim pull-right" onclick="history.go(-1);" style="margin-right: 20px;margin-top: 10px;"><i class="fa fa-arrow-left" > Back</i> <span class="btn-text">Back</span></button>-->
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
        
    function deletedrop(id) {
       swal({
           title: "Are you sure?",
           text: "You won't be able to Delete this Enquiry!",
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
               url: '<?php echo base_url(); ?>Enquiry/delete_enquiry',
               data: {
                   id: id,
               },
               success: function (data) {
                  // alert(data);
                   if (data == 1) {
                       swal({title: 'Done!',
                        text: 'It was succesfully Deactivated!!',
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