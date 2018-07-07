<body>
            <div class="right-sidebar-backdrop"></div>
            <!-- /Right Sidebar Backdrop -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">Send SMS</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                                <li class="active"><span>Send SMS</span></li>
                            </ol>
                        </div>
                        <!-- /Breadcrumb -->
                    </div>
                    <!-- /Title -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel card-view">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="form-wrap">
                                            <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Contact/sms" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label mb-10" for="exampleInputuname_2">Name</label>&nbsp;&nbsp;&nbsp;<input type="checkbox" id="checkbox" >Select All</h5>
                                                        <div class="input-group">
                                                            <select class="form-control" id="name" name="name" data-validation="required" data-validation-error-msg="Please Select contact" multiple>
                                                                <?php foreach($contact as $data){ ?>
                                                                <option value="<?php echo $data->contact_email ?>"><?php echo $data->contact_name ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label mb-10" for="Mobile Number">Message</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="message" id="message" data-validation="required" data-validation-error-msg="Please enter Some text"></textarea>
                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                    <div class="row">
                                                    <div class="form-group mb-0 col-md-12">
                                                        <button type="submit" class="btn btn-success btn-anim pull-right" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
                                                    </div>
                                                       </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script>
    $("#name").select2({
              placeholder: "Select a Contact",
    allowClear: true});
     $("#name").change(function () {

    $(this).valid()
    });
     $("#checkbox").click(function(){
    if($("#checkbox").is(':checked') ){
        $("#name > option").prop("selected","selected");
        $("#name").trigger("change");
    }else{
        $("#name > option").removeAttr("selected");
         $("#name").trigger("change");
     }
});
</script>