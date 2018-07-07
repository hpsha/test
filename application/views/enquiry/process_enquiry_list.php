
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">LIST PROCESSING ENQUIRY</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                    <li class="active"><span>List Processing Enquiry</span></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        <div class="row">
             <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Select Employee</label>

                                        <select class="form-control" name="employee" id="employees" data-validation="required" data-validation-error-msg="Please Select status">
                                            <option value="all">All</option>
                                            <?php foreach ($get_datas as $getdata) { ?>
                                                <option value="<?php echo $getdata->employee_id; ?>"><?php echo $getdata->employee_name; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="form-group mb-0 col-md-4" style="margin-top:30px">
                                        <button type="button" class="btn btn-success btn-anim" id="but" onclick="funcal()"><i class="fa fa-cloud-upload">Submit</i> <span class="btn-text">Submit</span></button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-12">
                <div class="panel panel-default card-view"  style="padding:0px">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="attend" class="table table-hover display  pb-30" >
                                        <thead>
                                           <tr>
                                                <th>Enquiry No</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Customer Email</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Enquiry No</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Customer Email</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                       <tbody id="tbdy">
                                            
                                           
                                        </tbody>
                                    </table>
                                    <button  class="btn btn-sm btn-warning btn-anim pull-right" onclick="history.go(-1);" style="margin-right: 20px;margin-top: 10px;"><i class="fa fa-arrow-left" > Back</i> <span class="btn-text">Back</span></button>
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
                        $.toast({heading: 'Processing Enquiry List', text: 'Another Quotation Updated Successfully', position: 'top-right', loaderBg: '#f8b32d', icon: 'success', hideAfter: 3500, stack: 6});
                    });
                } else if (success == 2) {
                    window.setTimeout(function () {
                        $.toast({heading: 'Processing Enquiry List', text: 'Error Occured', position: 'top-right', loaderBg: '#f33923', icon: 'error', hideAfter: 3500, stack: 6});
                    });
                } else {
                    window.setTimeout(function () {
                        $.toast({heading: 'Processing Enquiry List', text: 'Already Exist', position: 'top-right', loaderBg: '#f8b32d', icon: 'warning', hideAfter: 3500, stack: 6});
                    });
                }
            });
<?php } ?>

  
         $(document).ready(function () {
        funcal();
});
</script>
<script type="text/javascript">

        function funcal(){
    var emp=$('#employees').val();
    $.ajax({
    type: 'POST',
    url: '<?php echo base_url(); ?>Enquiry/process',
    data: {
    employee: emp,
    },
    success: function (b) {
  $("#attend").dataTable().fnClearTable(); //clear the table
  $('#attend').dataTable().fnDestroy(); //destroy the datatable
  $('#tbdy').html(b);  //add your new data
  $('#attend').DataTable({  //redraw with new data
    dom: 'Bfrtip',
        buttons: [

            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
 }
    });
         }
$("#employees").select2({
allowClear: true});
    </script>