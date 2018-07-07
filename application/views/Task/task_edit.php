<?php //print_r($customergroup);exit();  ?>
<body>
    <div class="right-sidebar-backdrop"></div>
    <!-- /Right Sidebar Backdrop -->
    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">SCHEDULE EDIT</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url(); ?>Task/">Task List</a></li>
                        <li class="active"><span>Task Edit</span></li>
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
                                    <form data-toggle="validator" role="form" id="emp_form" action="<?php echo base_url(); ?>Task/updatedetails" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <?php  //print_r($fecth_schedule);
                                            foreach($fetch_task as $schedule_data);?>
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Task Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder=" Task Name" data-validation="required" data-validation-error-msg="Please Enter Task Name" value="<?php echo $schedule_data->schedule_title ?>">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                    <input type="hidden" name="key" value="<?php echo $schedule_data->schedule_id; ?>">
                                                </div>
                                            </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Task Description</label>
                                                    <div class="input-group">
                                                       <textarea class="form-control" rows="2" id="schedule_des" name="schedule_des" placeholder="Task Description" data-validation="required" data-validation-error-msg="Please enter Task Description"><?php echo $schedule_data->schedule_description  ?></textarea>
                                                        <div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
                                                    </div>
                                                </div>
                                               

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label mb-10" for="exampleInputuname_2">Task Assigned to</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" disabled id="name" name="name" placeholder="Name" data-validation="required" data-validation-error-msg="Please Enter Task Name" value="<?php echo $schedule_data->employee_name ?>">
                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                </div>
                                            </div>
                                             <div class="form-group col-md-6">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Task Note</label>
                                                    <div class="input-group">
                                                       <input type="text" readonly class="form-control" id="note" name="note" placeholder="note" data-validation="required" data-validation-error-msg="Please Enter Task Note" value="<?php echo $schedule_data->schedule_note ?>">
                                                        <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                                    </div>
                                                </div>
                                        </div>
 <div class="row">
  <div class="form-group col-md-6">
                                                    <label class="control-label mb-10" for="exampleInputEmail_4">Task Status</label>
                                                    <div class="input-group">
                                                       <select class="form-control" id="status" name="status"  data-validation="required" data-validation-error-msg="Please Select Status">
                                                           <option value="">Please Select Status</option>
                                                            <option value="1">Completed</option>
                                                            <option value="0"> Not Completed</option>
                                                            
                                                           
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                </div>



                                        <div class="row">
                                            <div class="form-group mb-0 col-md-12">
                                                <button type="submit" class="btn btn-success btn-anim" id="but"><i class="fa fa-cloud-upload"> Submit</i> <span class="btn-text">Submit</span></button>
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
        //SCHEDULE page select2
        $("#created_by").select2({
             placeholder: "Select a created by",
             allowClear: true});
        </script>